<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        // Check if the item already exists in the cart
        $cartItem = Cart::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            return response()->json(['message' => 'Product already in cart'], 400);
        }

        // Create a new cart item
        Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }

    public function getCartItems($userId)
    {
        // Retrieve cart items for a specific user
        // $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        // return response()->json($cartItems);

        $cartItems = Cart::with('product:id,name,price,size,image,stock') // Select only the necessary fields
        ->where('user_id', $userId)
        ->get();

       return response()->json($cartItems);

    }

    public function removeFromCart($userId, $itemId)
{
    // Find the cart item by user ID and item ID
    $cartItem = Cart::where('user_id', $userId)->where('product_id', $itemId)->first();

    if ($cartItem) {
        $cartItem->delete();
        return response()->json(['message' => 'Item removed from cart'], 200);
    }

    return response()->json(['message' => 'Item not found'], 404);
}
public function updateItemQuantity(Request $request, $userId, $itemId)
{
    $request->validate(['quantity' => 'required|integer|min:1']);

    $cartItem = Cart::where('user_id', $userId)->where('product_id', $itemId)->first();

    if ($cartItem) {
        $product = Product::find($itemId);

        if ($request->quantity > $product->stock) {
            return response()->json(['error' => 'Insufficient stock available.'], 400);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['message' => 'Quantity updated successfully.']);
    }

    return response()->json(['error' => 'Cart item not found.'], 404);
}


}
