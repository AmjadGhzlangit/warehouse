<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product');
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load('orderItems.product');
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'order_status' => 'required|string',
            'order_items' => 'required|array',
            'order_items.*.id' => 'required|integer|exists:order_items,id',
            'order_items.*.quantity_item' => 'required|integer|min:1',
            'order_items.*.price_item' => 'required|numeric|min:0',
        ]);

        $order->update([
            'order_status' => $validatedData['order_status'],
        ]);

        foreach ($validatedData['order_items'] as $itemData) {
            $orderItem = $order->orderItems()->find($itemData['id']);
            $orderItem->update([
                'quantity_item' => $itemData['quantity_item'],
                'price_item' => $itemData['price_item'],
            ]);
        }

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
