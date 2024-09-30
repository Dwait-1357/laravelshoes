<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderController extends Controller
{
   
    // public function countOrder()
    // {
    //     $orderCount = Order::count();
    //     return view('welcome',compact('orderCount'));
        
    // }

    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
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

    public function saveCart(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'items' => 'required|array',
            'items.*.id' => 'required|integer',
            'items.*.amount' => 'required|integer|min:1',
        ]);
    
        $userId = $request->user_id;
        $cartItems = $request->items;
    
        foreach ($cartItems as $item) {
            Cart::updateOrCreate(
                ['user_id' => $userId, 'product_id' => $item['id']],
                ['quantity' => $item['amount']]
            );
        }
    
        return response()->json(['message' => 'Cart saved successfully!'], 200);
    }

    public function getCart($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        return response()->json(['products' => $cartItems], 200);
    }

    


} 
