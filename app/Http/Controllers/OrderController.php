<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Midtrans\Config;
use Midtrans\Transaction;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Auto-check status from Midtrans to support Localhost testing without Webhooks
        if ($order->status === 'menunggu' && $order->snap_token && in_array($order->payment_method, ['bank_transfer', 'ewallet'])) {
            try {
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                
                if (Config::$serverKey) {
                    $statusResponse = Transaction::status($order->order_number);
                    $status = $statusResponse->transaction_status;
                    
                    if ($status == 'capture') {
                        if ($statusResponse->fraud_status == 'challenge') {
                            // Do nothing, still waiting manual review
                        } else {
                            $order->update(['status' => 'diproses']);
                        }
                    } else if ($status == 'settlement') {
                        $order->update(['status' => 'diproses']);
                    } else if ($status == 'deny' || $status == 'expire' || $status == 'cancel') {
                        $order->update(['status' => 'dibatalkan']);
                    }
                }
            } catch (\Exception $e) {
                // Ignore error (e.g. 404 transaction not found yet)
            }
        }

        $order->load('items');

        return view('orders.show', compact('order'));
    }
}