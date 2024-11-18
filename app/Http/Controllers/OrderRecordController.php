<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRecordRequest;
use App\Http\Requests\UpdateOrderRecordRequest;
use App\Models\Order;
use App\Models\OrderRecord;
use Auth;
use Gate;

class OrderRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        Gate::authorize('viewAny', OrderRecord::class);
        $order = Order::where('user_id', $user->id)->first();
        return OrderRecord::where('order_id', $order->id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRecordRequest $request)
    {
        $request->validated();
        $orderIsValid = Order::where(['user_id' => $request->user()->id, 'status' => 'unapproved', 'id' => $request->order_id])->exists();
        if (!$orderIsValid) {
        }
        return OrderRecord::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderRecord $orderRecord)
    {
        Gate::authorize('view', $orderRecord);
        return $orderRecord;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRecordRequest $request, OrderRecord $orderRecord)
    {
        Gate::authorize('update', $orderRecord);
        $request->validated();
        $orderRecord->update($request->all());
        return $orderRecord;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderRecord $orderRecord)
    {
        Gate::authorize('delete', $orderRecord);
        $orderRecord->delete();
    }
}
