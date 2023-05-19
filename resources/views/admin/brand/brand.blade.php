@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">



            <div class="col-xs-12 col-sm-12 col-md-6">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Add Brand </h3>
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
                    <form class="card-body box-body bg-dark"  @if (!$errors->has('brand_name')) style="display: none;" @endif  role="form" method="POST" action="{{route('super.brand.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class=" ">
                            <div class="row justify-content-center">

                                <div class="col-md-10">
                                    <div class="form-group">

                                        <label>Brand Name*</label>
                                        <input type="text" class="form-control" name="brand_name" placeholder="Enter ...">
                                        @if ($errors->has('brand_name'))
                                            <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">

                                        <label>Brand Image</label>
                                        <input type="file"  accept="image/*" class="form-control-file" name="brand_image">
                                    </div>
                                    <!-- /.form-group -->

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Active</label>
                                        <select id="brand_active" class="form-control" name="brand_active">

                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="textarea" name="brand_description" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
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
                        <h3 class="card-title">All Brand</h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <table id="example2" class="table table-sm  table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>Brand Image</th>
                                    <th>Active</th>
                                    <th> Brand Action</th>
                                    <th>Brand  Edit</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach($brands as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>

                                        <td style="width: 20%">
                                        <img class="rounded" src="{{asset('public/brandImage/'.$item->image)}}" alt="" style="width:25% ;">
                                        </td>
                                        <td>{{$item->active}}</td>
                                        <td>
                                            @if($item->active == 'yes')
                                            <a class="btn btn-xs btn-danger" href="{{route('super.brand.deactivate',$item->id)}}" style="text-decoration:none;">Deactivate</a>
                                            @else
                                            <a class="btn btn-xs btn-warning" href="{{route('super.brand.active',$item->id)}}" style="text-decoration:none;">Active</a>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{route('super.brand.update',$item->id)}}" class=""   title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
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
