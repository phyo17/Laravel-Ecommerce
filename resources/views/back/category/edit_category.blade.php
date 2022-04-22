@extends('back.layout.master')

@section('title','Edit Category')

@section('content')
	<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Category</h1>
                  <small>Edit Category List</small>
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
                              <a class="btn btn-add " href="{{ url('admin/view_category') }}"> 
                              <i class="fa fa-eye"></i>  View Categories </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{ url('admin/update_category/'.$edit_data->id) }}" method="post" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" value="{{ $edit_data->cat_title }}" name="cat_title" class="form-control" placeholder="Enter Title" required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select name="parent_id" id="" class="form-control">
                                    <option value="0">Parent Category</option>
                                    @foreach($parent as $val)
                                       <option value="{{ $val->id }}" @if($val->id==$edit_data->parent_id) selected="" @endif>{{ $val->cat_title }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="text" value="{{ $edit_data->url }}" name="url" class="form-control" placeholder="Enter Url" required>
                              </div>
                              <div class="form-group">
                                 <label>Desctiption</label>
                                 <textarea class="form-control" name="description" id="editor2" rows="10" required>{{ $edit_data->description }}</textarea>
                              </div>
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Update Category">
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