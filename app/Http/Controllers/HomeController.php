<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Stripe;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product = Product::all();
        return view('home.index',compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $product = Product::all();
        if($usertype =='1') {
            return view('admin.home',compact('product'));
        } else {
           return view ('home.index'); 
        }
    }
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/login') ;
    }


    public function stripe($total)
    { 
        return view('payment.stripe',compact('total'));
    }

    public function stripePost(Request $request , $total)
    {
      
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where('user_id','=',$user_id)->get();
        
        foreach ($data as $data)
        {
            $order = new Order();

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->quantity = $data->quantity;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = "Paid";
            $order->delivery_status = "Process delivery";
          
            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
           
        }
        Session::flash('success', 'Payment successful!');
        return back();

    }

    
}
