@extends('back.layout.master')

@section('title','Add Product')

@section('content')
	<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product</h1>
                  <small>Add Product List</small>
               </div>
            </section>

            @if($message = Session::get('success_message'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{ url('admin/view_product') }}"> 
                              <i class="fa fa-eye"></i>  View Products </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{ url('admin/add_product') }}" method="post" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Category</label>
                                 <select name="category_id" class="form-control" id="">
                                    @foreach($category as $data)
                                       <option value="{{ $data['id'] }}">{{ $data['cat_title'] }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" name="product_code" class="form-control" placeholder="Enter Product Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" name="product_color" class="form-control" placeholder="Enter Product Color" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Desctiption</label>
                                 <textarea class="form-control" name="product_description" id="editor1" rows="3" required></textarea>
                              </div>
                              <div class="form-group">
                                 <label> Product Image</label>
                                 <input type="file" name="product_image">
                              </div>
                              <div class="form-group">
                                 <label> Product Price</label>
                                 <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price" id="product_price" required>
                              </div>
                              <div class="form-group">
                              	<label for="product_quantity">Product Quantity</label>
                              	<input type="number" name="product_quantity" class="form-control" id="product_quantity">
                              </div>
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Add Product">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection