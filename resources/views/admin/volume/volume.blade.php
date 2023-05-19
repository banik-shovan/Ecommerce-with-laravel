@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
           
           
                
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Add Volume </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                            
                        </div>
                       
                        <!-- /.card-header -->
                        <form class="card-body box-body bg-dark"   style="display: none;"  role="form" method="POST" action="{{route('super.volume.store')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class=" ">
                                <div class="row justify-content-center">

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            
                                            <label>Volume Name*</label>
                                            <input type="text" class="form-control" name="volume_name" placeholder="Enter ...">
                                        </div>
                                        <!-- /.form-group -->
                                        
                                    </div>
                                </div>
                                <!-- /.row -->
                    
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center bg-dark">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    
                  <!-- new  -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="card card-danger" >
                        <div class="card-header card-danger">
                            <h3 class="card-title">All Volume</h3>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body " >
                            <table id="example2" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Volume Name</th>
                                       
                                     
                                        <th>Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach($volume as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                           
                                          
                                            
                                            
                                            
                                            <td>
                                                <a href="" class=""  data-toggle="modal" data-target="#exampleModal{{$item->id}}" title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
                                                <!-- <form onclick="return confirm('Are you sure?')" action="" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete" style="border: none;
                                                        padding-left: 5px;
                                                        background: none;
                                                        cursor:pointer;">
                                                        <i class="fa fa-trash" style="color:#2196F3; padding:2px;"> </i>
                                                    </button>
                                                </form> -->
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
                                       
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        
                                                        <form class="card-body"  role="form" method="POST" action="{{route('super.volume.updatesave',$item->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class=" ">
                                                                <div class="row justify-content-center">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        
                                                                        <label>Volume Name*</label>
                                                                        <input type="text" class="form-control" name="volume_name" placeholder="Enter ..."  value="{{$item->name}}">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    
                                                                </div>
                                                                    
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