<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{

    
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total_price' => $request->total_price,
            'shipping_fee' => $request->shipping_fee,
            'status' => 'pending'
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['amount'],
                'price' => $item['price']
            ]);
        }

        return response()->json(['message' => 'Order placed successfully!'], 201);
    }
    public function delete($id)
    {
        $products = Order::where('id','=',$id)->delete();
        return response()->json(['message' => 'item deleted sucess successfully!'], 201);
    }
}
