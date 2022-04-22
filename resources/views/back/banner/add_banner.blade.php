@extends('back.layout.master')

@section('title','Add Banner')

@section('content')
	<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Banner</h1>
                  <small>Add Banner List</small>
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
                              <a class="btn btn-add " href="{{ url('admin/view_banner') }}"> 
                              <i class="fa fa-eye"></i>  View Banners </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{ url('admin/add_banner') }}" method="post" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Enter Banner Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Text Style</label>
                                 <input type="text" name="text_style" class="form-control" placeholder="Enter Banner text style" required>
                              </div>
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea class="form-control" name="content" id="editor1" rows="3" required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Image</label>
                                 <input type="file" name="image">
                              </div>
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" name="link" class="form-control" placeholder="Enter link" id="product_price" required>
                              </div>
                              <div class="form-group">
                              	<label for="product_quantity">Sort Order</label>
                              	<input type="number" name="sort_order" placeholder="Enter sort order" class="form-control" id="product_quantity">
                              </div>
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Add Banner">
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