@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
           
           
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Add Menu </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form class=" card-body box-body bg-dark"  @if (!($errors->has('menu_name') || $errors->has('menu_description')) ) style="display: none;" @endif role="form" method="POST" action="{{route('super.menu.store')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class=" ">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            
                                            <label>Menu Name*</label>
                                            <input type="text" class="form-control" name="menu_name" placeholder="Enter ..."  value="{{old('menu_name')}}">
                                            @if ($errors->has('menu_name'))
                                                <span class="text-danger">{{ $errors->first('menu_name') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                        
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Menu Description</label>
                                            <textarea class="textarea" name="menu_description" placeholder="Place some text here" 
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('menu_description')}}</textarea>
                                            @if ($errors->has('menu_description'))
                                                <span class="text-danger">{{ $errors->first('menu_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                   
                                </div>
                                <!-- /.row -->
                    
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center bg-dark">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                        </form>
                        {{-- <div>
                            <h3>herllonkj</h3>
                        </div> --}}
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Add Sub Menu </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                            
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <form class="card-body box-body bg-dark"  @if (!($errors->has('sub_menu_name') || $errors->has('sub_menu_description') || $errors->has('menu_id')) ) style="display: none;" @endif role="form" method="POST" action="{{route('super.sub_menu.store')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class=" ">
                                <div class="row justify-content-center">

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            
                                            <label>Sub Menu Name*</label>
                                            <input type="text" class="form-control" name="sub_menu_name" placeholder="Enter ...">
                                            @if ($errors->has('sub_menu_name'))
                                                <span class="text-danger">{{ $errors->first('sub_menu_name') }}</span>
                                            @endif
                                        
                                        </div>
                                        <!-- /.form-group -->
                                        
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Select Parent Menu*</label>
                                            <select class="form-control select2" name="menu_id" style="width: 100%;" >
                                                 <option>Choose one...</option> 
                                                 @foreach ($menu as $item)
                                                  <option  value="{{$item->id}}">{{$item->name}}</option>
                                               @endforeach
                                                
                                               
                                            </select>
                                            @if ($errors->has('menu_id'))
                                                <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                            @endif
                                        </div>
                                        
                                        <!-- /.form-group -->
                                        
                                    </div>

                                    <!-- /.col -->
                                   
                                    
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Sub Menu Description</label>
                                            <textarea class="textarea" name="sub_menu_description" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @if ($errors->has('sub_menu_description'))
                                                <span class="text-danger">{{ $errors->first('sub_menu_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                    
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center bg-dark">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                        </form>
                        {{-- <div>
                            <h3>herllonkj</h3>
                        </div> --}}
                    </div>
                    <!-- /.card -->
                    
                  <!-- new  -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="card card-danger" >
                        <div class="card-header card-primary">
                            <h3 class="card-title">All Menu</h3>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body box-body" style="display:none">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Menu Name</th>
                                        <th>Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                @foreach ($menu as $menuitem)
                                       
                                       <tr>
                                           <td>{{$menuitem->name}}</td>
                                           
                                          
                                           
                                           <td>
                                               <a href="" class="" title="edit" data-toggle="modal" data-target="#exampleModal{{$menuitem->id}}" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
                                               <form onclick="return confirm('Are you sure?')" action="{{route('super.menu.delete',$menuitem->id)}}" method="post" style="display: inline;">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button type="submit" title="Delete" style="border: none;
                                                       padding-left: 5px;
                                                       background: none;
                                                       cursor:pointer;">
                                                       <i class="fa fa-trash" style="color:#2196F3; padding:2px;"> </i>
                                                   </button>
                                               </form>
                                               {{-- <a href="" class="" title="delete" style="color:#2196F3"> <i class="fa fa-trash" style="padding: 10px"></i></a> --}}
                                           </td>
                                           
                                       </tr>
                                       <div class="modal fade" id="exampleModal{{$menuitem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <!-- <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5> -->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        
                                                        <form class="card-body"  role="form" method="POST" action="{{route('super.menu.updatesave',$menuitem->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class=" ">
                                                                <div class="row justify-content-center">

                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            
                                                                            <label>Menu Name*</label>
                                                                            <input type="text" class="form-control" name="menu_name" placeholder="Enter ..." value="{{$menuitem->name}}">
                                                                            
                                                                        
                                                                        </div>
                                                                        <!-- /.form-group -->
                                                                        
                                                                    </div>
                                                                   
                                                                    <!-- /.col -->
                                                                
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Menu Description</label>
                                                                            <textarea class="textarea" name="menu_description" placeholder="Place some text here"
                                                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$menuitem->description}}</textarea>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                                <!-- /.row -->
                                                    
                                                            
                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer text-center">
                                                                <button type="submit" class="btn btn-primary">save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                   @endforeach 
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th>Action</th>
                                        <th>hh</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                      <!-- /.card-body -->
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="card card-danger" >
                        <div class="card-header card-danger">
                            <h3 class="card-title">All Sub Menu</h3>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body box-body" style="display:none">
                            <table id="example2" class="table table-responsive table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sub Menu Name</th>
                                        <th>Parent Menu Name</th>
                                     
                                        <th>Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                @foreach ($submenu as $item)
                                        <tr>
                                        <td>{{$item->name}}</td>
                                           
                                           <td>{{$item->menu->name}}</td>
                                            
                                            
                                            
                                            <td>
                                                <a href="" class=""  data-toggle="modal" data-target="#exampleModal1{{$item->id}}" title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
                                                <form onclick="return confirm('Are you sure?')" action="{{route('super.sub_menu.delete',$item->id)}}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete" style="border: none;
                                                        padding-left: 5px;
                                                        background: none;
                                                        cursor:pointer;">
                                                        <i class="fa fa-trash" style="color:#2196F3; padding:2px;"> </i>
                                                    </button>
                                                </form>
                                                {{-- <a href="" class="" title="delete" style="color:#2196F3"> <i class="fa fa-trash" style="padding: 10px"></i></a> --}}
                                            </td>
                                            
                                        </tr>
                                        <!-- @if (count($errors) > 0)
                                            <script type="text/javascript">
                                                $( document ).ready(function() {
                                                    $('#exampleModal{{$item->id}}').modal('show');
                                                });
                                            </script>
                                        @endif -->
                                       
                                        <div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        
                                                        <form class="card-body"  role="form" method="POST" action="{{route('super.sub_menu.updatesave',$item->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class=" ">
                                                                <div class="row justify-content-center">

                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            
                                                                            <label>Sub Menu Name*</label>
                                                                            <input type="text" class="form-control" name="sub_menu_name" placeholder="Enter ..." value="{{$item->name}}">
                                                                            
                                                                        
                                                                        </div>
                                                                        <!-- /.form-group -->
                                                                        
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Select Parent Menu*</label>
                                                                            <select class="form-control select2" name="menu_id" style="width: 100%;" >
                                                                                <option>Choose one...</option> 
                                                                                @foreach ($menu as $item1)
                                                                                    <option 
                                                                                    {{
                                                                                        $item->menu_id==$item1->id ? 'selected':''
                                                                                    }} 
                                                                                     value="{{$item1->id}}">{{$item1->name}}</option>
                                                                                @endforeach
                                                                                
                                                                            
                                                                            </select>
                                                                           
                                                                        </div>
                                                                        
                                                                        <!-- /.form-group -->
                                                                        
                                                                    </div>

                                                                    <!-- /.col -->
                                                                
                                                                    
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Sub Menu Description</label>
                                                                            <textarea class="textarea" name="sub_menu_description" placeholder="Place some text here"
                                                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$item->description}}</textarea>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                                <!-- /.row -->
                                                    
                                                            
                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer text-center">
                                                                <button type="submit" class="btn btn-primary">save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach  
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th>Action</th>
                                        <th>hh</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                      <!-- /.card-body -->
                    </div>

                </div>
            </div> 
        </div>
    </section>
    
@endsection