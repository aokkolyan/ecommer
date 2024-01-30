<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
