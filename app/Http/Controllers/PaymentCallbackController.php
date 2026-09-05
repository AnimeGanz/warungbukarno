<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentCallbackController extends Controller
{
    public function receive(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        
        try {
            $notification = new Notification();
            
            $status = $notification->transaction_status;
            $type = $notification->payment_type;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;

            $order = Order::where('order_number', $orderId)->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            if ($status == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraudStatus == 'challenge') {
                        $order->update(['status' => 'menunggu']); // Still pending manual review
                    } else {
                        $order->update(['status' => 'diproses']);
                    }
                }
            } else if ($status == 'settlement') {
                $order->update(['status' => 'diproses']);
            } else if ($status == 'pending') {
                $order->update(['status' => 'menunggu']);
            } else if ($status == 'deny' || $status == 'expire' || $status == 'cancel') {
                $order->update(['status' => 'dibatalkan']);
            }

            return response()->json(['message' => 'Success']);
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
