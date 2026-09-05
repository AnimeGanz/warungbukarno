<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index(Request $request)
    {
        $promos = Promo::when($request->search, function ($query, $search) {
                $query->where('code', 'like', "%{$search}%")
                      ->orWhere('title', 'like', "%{$search}%");
            })
            ->when($request->status === 'active', function ($query) {
                $query->where('is_active', true);
            })
            ->when($request->status === 'inactive', function ($query) {
                $query->where('is_active', false);
            })
            ->latest()
            ->paginate(10);

        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:promos,code',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'badge' => 'required|string|max:50',
            'type' => 'required|in:percent,fixed_amount,free_shipping',
            'discount_value' => 'required|numeric|min:0',
            'min_order_amount' => 'required|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
            'new_user_only' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['code'] = strtoupper(trim($validated['code']));
        $validated['new_user_only'] = $request->boolean('new_user_only');
        $validated['is_active'] = $request->boolean('is_active');

        Promo::create($validated);

        return redirect()->route('admin.promos.index')->with('success', 'Promo baru berhasil ditambahkan.');
    }

    public function edit(Promo $promo)
    {
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:promos,code,' . $promo->id,
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'badge' => 'required|string|max:50',
            'type' => 'required|in:percent,fixed_amount,free_shipping',
            'discount_value' => 'required|numeric|min:0',
            'min_order_amount' => 'required|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'usage_limit' => 'nullable|integer|min:1',
            'new_user_only' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['code'] = strtoupper(trim($validated['code']));
        $validated['new_user_only'] = $request->boolean('new_user_only');
        $validated['is_active'] = $request->boolean('is_active');

        $promo->update($validated);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil diperbarui.');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil dihapus.');
    }

    public function toggle(Promo $promo)
    {
        $promo->update(['is_active' => !$promo->is_active]);

        return back()->with('success', 'Status promo ' . $promo->code . ' berhasil diubah.');
    }
}
