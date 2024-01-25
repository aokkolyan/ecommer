<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        // dd($usertype);
        if($usertype =='1') {
            return view('admin.home');
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
