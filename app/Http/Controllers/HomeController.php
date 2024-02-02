<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    
}
