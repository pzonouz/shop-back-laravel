<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreOrderRequest $request)
    {
        if ($request->user()->is_admin) {
            return Order::orderBy('created_at', 'desc')->get();
        }
        return Order::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $existingOrder = Order::where(['user_id' => $request->user()->id, 'status' => 'unapproved'])->first();
        if ($existingOrder) {
            return $existingOrder;
        }
        $request->merge(['user_id' => $request->user()->id]);
        return Order::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        Gate::authorize('view', $order);
        return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateOrderRequest $request, Order $order)
    // {
    //     $order->update($request->all());
    //     return $order;
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Gate::authorize('delete', $order);
        $order->delete();
        return response(null, 204);
    }
}
