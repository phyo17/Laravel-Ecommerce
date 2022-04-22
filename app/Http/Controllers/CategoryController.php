<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		$category = new Category($data);
    		$category->save();

    		return redirect('admin/add_category')->with('success_message','Category Added Successfully.');
    	}

    	$parent = Category::where(['parent_id'=>0])->get();
    	return view('back.category.add_category',compact('parent'));
    }

    public function edit_category($id)
    {
    	$parent = Category::where('parent_id',0)->get();
    	$edit_data = Category::find($id);

    	return view('back.category.edit_category',compact('parent','edit_data'));
    }

   	public function update_category(Request $request, $id)
   	{
   		Category::findOrFail($id)->update($request->all());
   		return redirect('admin/view_category')->with('success_message','Category Updated Successfully');
   	}

    public function view_category()
    {
    	$category = Category::orderby('id','desc')->get();
    	return view('back.category.view_category',compact('category'));
    }

    public function category_status($id)
    {
    	$category=Category::find($id);
    	if($category->status===1)
    	{
    		$category->status=0;
    	}else{
    		$category->status=1;
    	}
    	$category->save();
    	return redirect('admin/view_category')->with('success_message','Status change Successfully.');
    }

    public function delete_category($id)
    {
    	$category=Category::find($id);

    	$category->delete();
    	return redirect()->back()->with('success_message','Category Deleted Successfully');
    }
}
