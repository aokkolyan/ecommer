<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function viewCategory()
    {
        $category = Category::all();
        return view('category.index', compact('category'))->with('i');
    }
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
        ]);
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('success', 'Category create successfully');;
    }
    public function edit()
    {
        //    return "hjh";
        $category = Category::all();
        return view('category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->back()->with('sucess', "Category has been update");
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Categroy delete success');
    }
    //  Product 
    public function viewproduct()
    {
        $product = Product::all();
        return view('product.index', compact('product'))->with('i');
    }
    public function create(Request $request)
    {
        $category = Category::all();
        return view('product.add', compact('category'));
    }
    public function storeproduct(Request $request)
    {

        $input = $request->all();
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extenstion = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '' . time() . '.' . $extenstion;
            // $request->file('image')->move(public_path('images') , $fileName); //If we're want to store image in folder publice path//
            $path = $request->file('image')->store('images', 'public');
            $url = asset('images/' . $fileName);
            $input['image'] = $path;
        }

        Product::create($input);
        return redirect()->back()->with('success', "Product create success");
    }
    public function product_delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()
            ->with('success', 'Product deleted successfully');
    }
    public function product_edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }
    public function product_update(Request $request, $id)
    {
        $product = Product::find($id);
        $input   = $request->all();
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extenstion = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '' . time() . '.' . $extenstion;
            // $request->file('image')->move(public_path('images') , $fileName); //If we're want to store image in folder publice path//
            $path = $request->file('image')->store('images', 'public');
            $url = asset('images/' . $fileName);
            $input['image'] = $path;
        } else {
            unset($input['image']);
        }
        //  dd($product);

        $product->update($input);
        return redirect()->back()
            ->with('success', 'Product update successfully');
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('product.product_detail', compact('product'));
    }
    public function cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view("cart.cart", compact('cart'));
        } else {
            return redirect('login');
        }
    }
    public function addtocart(Request $request, $id)
    {
        if (Auth::id()) {
            $user    = Auth::user();
            $product = Product::find($id);
            $cart    = new Cart();
            $cart->name  = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price  * $request->quantity;
            }
            $cart->quantity = $request->quantity;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->image = $product->image;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function removecart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }
    //////////////////////////////////Order Product////////////////////////////
    public function cashorder()
    {
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

            $order->payment_status = "Cash on delivery";
            $order->delivery_status = "Process delivery";

          
            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
           
        }

        return redirect()->back()->with('success','We Received your order. We will contact with you soon Thanks you');
    }
    public function order()
    {
        $order = Order::all();
        return view("order.index",compact('order'))->with('i');
    }
    public function updateDelivery(Request $request , $id)
    {
       $order = Order::find($id);
       $order->delivery_status = "delivered";
    
       $order->save();

       return redirect()->back();
      
    }

}
