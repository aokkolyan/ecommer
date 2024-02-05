<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function viewCategory ()
    {
        $category = Category::all();
       return view('category.index',compact('category'))->with('i');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'category_name' => 'required',
        ]);
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('success','Category create successfully');;
    }
    public function edit()
    {
    //    return "hjh";
        $category = Category::all();
        return view ('category.edit',compact('category'));
    }
    public function update(Request $request , $id)
    {
       
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->back()->with('sucess',"Category has been update");
       
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Categroy delete success');
        
    }
        //  Product 
    public function viewproduct()
    {
        $product = Product::all();
       return view ('product.index',compact('product'))->with('i');
    }
    public function create(Request $request)
    {
        $category = Category::all();
       return view('product.add',compact('category'));
    }
    public function storeproduct(Request $request)
    {
      
        $input = $request->all();
        if($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($originalName , PATHINFO_FILENAME);
            $extenstion = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '' . time() . '.' . $extenstion;
            // $request->file('image')->move(public_path('images') , $fileName); //If we're want to store image in folder publice path//
            $path=$request->file('image')->store('images','public');
            $url = asset('images/'.$fileName);
            $input['image']=$path;
         }
      
        Product::create($input);
       return redirect()->back()->with('success',"Product create success");
     
    }
    public function product_delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()
        ->with('success','Product deleted successfully');

    }
    public function product_edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
       return view('product.edit',compact('product','category'));
    }
    public function product_update(Request $request , $id)
    {
        $product = Product::find($id);
        $input   = $request->all();
        if($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($originalName , PATHINFO_FILENAME);
            $extenstion = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '' . time() . '.' . $extenstion;
            // $request->file('image')->move(public_path('images') , $fileName); //If we're want to store image in folder publice path//
            $path=$request->file('image')->store('images','public');
            $url = asset('images/'.$fileName);
            $input['image']=$path;
         } else {
            unset($input['image']);
         }
        //  dd($product);

         $product->update($input);
         return redirect()->back()
         ->with('success','Product update successfully');

    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('product.product_detail',compact('product'));
    }
}
