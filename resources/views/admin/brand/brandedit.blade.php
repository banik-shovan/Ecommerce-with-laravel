@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">



                <div class="col-xs-12 col-sm-12 col-md-7">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Brand: <b>{{$brand->name}} </b> </h3>
                            <div class="card-tools">
                                <a class="btn btn-xs bt-primary" href="{{ URL::previous() }}">Go Back</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>

                        </div>

                        <!-- /.card-header -->
                        <form class="card-body  bg-dark"    role="form" method="POST" action="{{route('super.brand.updatesave',$brand->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class=" ">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <label>Brand Name*</label>
                                            <input type="text" class="form-control" name="brand_name" value="{{$brand->name}}">

                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">

                                            <label>Existing Brand Image</label><br>
                                            <img class="rounded" src="{{asset('public/brandImage/'.$brand->image)}}" alt="" style="width:25% ;">
                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                    <div class="col-md-5">
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

                                                <option {{
                                                    $brand->active=="yes" ? 'selected':''
                                                }}  value="yes">Yes</option>
                                                <option {{
                                                    $brand->active=="no" ? 'selected':''
                                                }} value="no">No</option>

                                            </select>


                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="textarea" name="brand_description"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$brand->description}}</textarea>
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


            </div>
        </div>
    </section>

@endsection
