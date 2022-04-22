<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function add_product(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$file=$request->file('product_image');
    		$filename=uniqid().'_'.$file->getClientOriginalName();
    		$file->move(public_path().'/upload/product_image/',$filename);

    		$arr = $request->all();
    		unset($arr['product_image']);
    		$arr['product_image']=$filename;

    		Product::create($arr);

    		return redirect('admin/add_product')->with('success_message','Product Added Successfully');
    	}

        $category = Category::all();
    	return view('back.product.add_product',compact('category'));
    }

    public function view_product()
    {
    	$product = Product::orderBy('id','desc')->get();
    	return view('back.product.view_product',compact('product'));
    }

    public function edit_product($id)
    {
        $category=Category::all();
    	$edit = Product::find($id);
    	return view('back.product.edit_product',compact('edit','category'));
    }

    public function update_product(Request $request, $id)
    {
    	$product = Product::find($id);

    	if($request->file('product_image'))
    	{
    		unlink(public_path('upload/product_image/'.$product->product_image));

    		$file=$request->file('product_image');
    		$filename=uniqid().'_'.$file->getClientOriginalName();
    		$file->move(public_path().'/upload/product_image/',$filename);
    		$product->product_image=$filename;
    	}

        $product->category_id = $request->category_id;
    	$product->product_name = $request->product_name;
    	$product->product_code = $request->product_code;
    	$product->product_color = $request->product_color;
    	$product->product_quantity = $request->product_quantity;
    	$product->product_price = $request->product_price;
    	$product->product_description = $request->product_description;
    	$product->save();

    	return redirect('admin/view_product')->with('success_message','Update Successfully');

    }

    public function delete_product($id)
    {
    	$product=Product::find($id);
    	$img_path=public_path()."/upload/product_image/".$product->product_image;

    	if(file_exists($img_path))
    	{
    		unlink($img_path);
    	}

    	$product->delete();
    	return redirect('admin/view_product')->with('success_message','Delete Successfully');
    }

    public function product_status($id)
    {
    	$product=Product::find($id);
    	if($product->status===1)
    	{
    		$product->status=0;
    	}else{
    		$product->status=1;
    	}
    	$product->save();
    	return redirect('admin/view_product')->with('success_message','Status change Successfully.');
    }
}
