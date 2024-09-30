<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
 

  
  
class AuthenticationController extends Controller
{

   public function viewuser()
   {
       $users = User::all();
       return view('customer',['data' => $users]);
   } 


    public function register(Request $request)
    {
        $formData = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
            'confirmpassword' => $request->confirmpassword
        ];
       
        $formData['password'] = bcrypt($request->password);
  
        $user = User::create($formData);        
        
        return response()->json([ 
            'user' => $user, 
            'token' => $user->createToken('passportToken')->accessToken
        ], 200);
          
    }
  
    public function login(Request $request)
    {
        // $credentials = [
        //     'email'    => $request->email,
        //     'password' => $request->password
        // ];

        $credentials = $request->only('email', 'password');
  
        if (Auth::attempt($credentials)) 
        {
            $token = Auth::user()->createToken('passportToken')->accessToken;
             
            return response()->json([
                'user' => Auth::user(), 
                'token' => $token,
                'message'=>'success'
            ], 200);
        }
  
        return response()->json([
            'error' => 'Unauthorised'
        ], 401);
  
    }

    public function getServices()
    {
        // Fetch all services from the database
        $services = Product::all();       
        return response()->json($services);
    }

    public function services($id)
    {
        $services = Product::find($id);
        return response()->json($services);
    }

    public function getRunning()
    {
        $products = Product::where('category', 'running')->get();
        return response()->json($products);
    }
    public function getFootball()
    {
        $products = Product::where('category', 'football')->get();
        return response()->json($products);
    }

    public function contact(Request $request)
    {
         $formData = [
            'fname' => $request->fname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
         ]; 

         $customer = Contact::create($formData);
         return response()->json([ 
            'message'=>'success'
        ], 200);
    }


    public function getCartProducts($userId)
    {
        
        $cartProductIds = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id') // Corrected join
            ->where('orders.user_id', '=', $userId)
            ->select('order_items.product_id') // Select product IDs
            ->pluck('product_id'); // Use pluck to get a simple array
    
        // Fetch products based on the retrieved product IDs
        $products = Product::whereIn('id', $cartProductIds)->get();
    
        // Calculate total quantity of items in the user's cart
        $totalQuantity = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id') // Corrected join
            ->where('orders.user_id', '=', $userId)
            ->sum('order_items.quantity'); // Sum up the quantities
    
        return response()->json([
            'products' => $products,
            'total_quantity' => $totalQuantity // Return total quantity as an integer
        ], 200); // HTTP status code 200 for success
    }
    

    // public function Order(Request $request)
    // {
        
    //     $user = auth()->user();
    //     if (!$user) {
    //         return response()->json([
    //             'message' => 'User not authenticated'
    //         ], 401);
    //     }
    
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'total_price' => 'required|numeric',
    //         'shipping_fee' => 'required|numeric',
    //     ]);
    
    //     // Create the order using the authenticated user's ID
    //     $order = Order::create([
    //         'user_id' => $user->id, // Get the authenticated user's ID
    //         'total_price' => $validatedData['total_price'],
    //         'shipping_fee' => $validatedData['shipping_fee'],
    //     ]);
    
    //     // Return a success response
    //     return response()->json([
    //         'message' => 'Order placed successfully!',
    //         'order_id' => $order->id,
    //     ], 201);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'items' => 'required|array',
    //         'items.*.id' => 'required|exists:products,id',
    //         'items.*.amount' => 'required|integer|min:1',
    //         'items.*.price' => 'required|numeric|min:0',
    //         'total_price' => 'required|numeric',
    //         'shipping_fee' => 'required|numeric',
    //     ]);

    //     // Get the authenticated user (Assuming you use Passport)
    //     $user = auth()->user();
    //     dd($user);

    //     // Create the order
    //     $order = Order::create([
    //         'user_id' => $user->id,
    //         'total_price' => $validatedData['total_price'],
    //         'shipping_fee' => $validatedData['shipping_fee'],
    //         'status' => 'pending',
    //     ]);

    //     // Create the order items
    //     foreach ($validatedData['items'] as $item) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['id'],
    //             'quantity' => $item['amount'],
    //             'price' => $item['price'],
    //         ]);
    //     }

    //     return response()->json([
    //         'message' => 'Order placed successfully!',
    //         'order_id' => $order->id,
    //     ], 201);
    // }

    
}
    


