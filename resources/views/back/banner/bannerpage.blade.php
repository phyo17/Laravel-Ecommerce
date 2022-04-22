@extends('back.layout.master')

@section('title','View Banner')

@section('content')
	         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Banner</h1>
                  <small>Banner List</small>
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
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Banner</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{ url('admin/add_category') }}"> <i class="fa fa-plus"></i> Add Banner
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="myTable" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>No.</th>
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Sort Order</th>
                                       <th>Content</th>
                                       <th>Link</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($banner as $i=>$value)
                                    <tr>
                                       <td>{{ ++$i }}</td>
                                       <td><img src="{{ asset('upload/banner/'.$value['image']) }}" class="img_circle" alt="User Image" width="70" height="70"></td>
                                       <td>{{ $value['name'] }}</td>
                                       <td>{{ $value['sort_order'] }}</td>
                                       <td>{!! $value['content'] !!}</td>
                                       <td>{{ $value['link'] }}</td>
                                       <td>
                                          @if($value['status']===0)
                                             <a href="{{ url('admin/banner_status/'.$value['id']) }}" class="btn btn-black btn-sm"><i class="fa fa-eye-slash"></i></a>
                                          @else
                                            <a href="{{ url('admin/banner_status/'.$value['id']) }}" class="btn btn-black btn-sm" title="Edit Product"><i class="fa fa-eye"></i></a>
                                          @endif
                                       </td>
                                       <td>
                                           <a class="btn btn-add btn-sm " href="{{url('admin/edit_banner/'.$value['id']) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                                           <a class="btn btn-sm btn-danger" href="{{url('admin/delete_banner/'.$value['id']) }}" onclick="return confirm('Are you sure to delete this item?')" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection