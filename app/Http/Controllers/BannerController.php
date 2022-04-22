<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function banner()
    {
    	$banner = Banner::orderBy('id','desc')->get();
    	return view('back.banner.bannerpage',compact('banner'));
    }

    public function add_banner(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$file = $request->file('image');
    		$filename = uniqid().'_'.$file->getClientOriginalName();
    		$file->move(public_path().'/upload/banner/',$filename);

    		$arr = $request->all();
    		unset($arr['image']);
    		$arr['image']=$filename;

    		$banner = new Banner($arr);
    		$banner->save();
    		return redirect('admin/add_banner')->with('success_message','Banner Added Successfully');
    	}

    	return view('back.banner.add_banner');
    }

    public function edit_banner(Request $request,$id)
    {

    	if($request->isMethod('post'))
    	{
    		$banner = Banner::find($id);

    		if($request->file('image'))
    		{
    			unlink(public_path()."/upload/banner/".$banner->image);

    			$file = $request->file('image');
    			$filename = uniqid().'_'.$file->getClientOriginalName();
    			$file->move(public_path().'/upload/banner/',$filename);
    			$banner->image=$filename;
    		}

    		$banner->name = $request->name;
    		$banner->text_style = $request->text_style;
    		$banner->sort_order = $request->sort_order;
    		$banner->content = $request->content;
    		$banner->link = $request->link;
    		$banner->save();

    		return redirect('admin/banner')->with('success_message','Banner Updated Successfully');
    	}

    	$edit = Banner::find($id);
    	return view('back.banner.edit_banner',compact('edit'));
    }

    public function delete_banner($id)
    {
    	$banner=Banner::find($id);
    	$img_path=public_path()."/upload/product_image/".$banner->image;

    	if(file_exists($img_path))
    	{
    		unlink($img_path);
    	}

    	$product->delete();
    	return redirect('admin/banner')->with('success_message','Delete Successfully');
    }

    public function banner_status($id)
    {
    	$banner=Banner::find($id);
    	if($banner->status===1)
    	{
    		$banner->status=0;
    	}else{
    		$banner->status=1;
    	}
    	$banner->save();
    	return redirect('admin/banner')->with('success_message','Status change Successfully.');
    }
}
