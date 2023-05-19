@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">



                <div class="col-xs-12 col-sm-12 col-md-6">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Add Coupon </h3>
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
                        <form class="card-body box-body bg-dark"  @if (!$errors->has('coupon_name')) style="display: none;" @endif  role="form" method="POST" action="{{route('super.coupon.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class=" ">
                                <div class="row justify-content-center">

                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <label>Coupon Name*</label>
                                            <input type="text" class="form-control" name="coupon_name" placeholder="Enter ...">
                                            @if ($errors->has('coupon_name'))
                                                <span class="text-danger">{{ $errors->first('coupon_name') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <label>Coupon price*</label>
                                            <input type="number" class="form-control" name="coupon_price" placeholder="Enter ..." min="10">
                                            @if ($errors->has('coupon_price'))
                                                <span class="text-danger">{{ $errors->first('coupon_price') }}</span>
                                             @endif
                                        </div>
                                        <!-- /.form-group -->

                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Active or Deactivate</label>
                                            <select id="" class="form-control" name="active_or_deactive" required >
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">

                                            <div class="form-group">
                                                <label for="example-date-input" class=" col-form-label">Expired Date*</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="date" name="date" id="example-date-input">
                                                    @if ($errors->has('date'))
                                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                                    @endif
                                                </div>
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
                            <h3 class="card-title">All Coupon</h3>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body" >
                            <table id="example2" class="table  table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                       <th>Coupon Price</th>
                                        <th>Coupon Last date </th>
                                        <th>Coupon Activeness</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($coupon as $item)
                                        <tr>
                                            <td>{{$item->coupon_name}}</td>
                                           <td>{{$item->coupon_price}}</td>
                                           <td>{{$item->expired_date}}</td>
                                           <td>{{$item->active_or_deactivate}}</td>




                                            <td>
                                                @if($item->active_or_deactivate == 'yes')
                                                <a class="btn btn-xs btn-danger" href="{{route('super.coupon.deactivate',$item->id)}}" style="text-decoration:none;">Deactivate</a>
                                                @else
                                                <a class="btn btn-xs btn-warning" href="{{route('super.coupon.active',$item->id)}}" style="text-decoration:none;">Active</a>
                                                @endif
                                                <a href="{{route('super.coupon.update',$item->id)}}" class=""   title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
                                                <form onclick="return confirm('Are you sure?')" action="{{route('super.coupon.delete',$item->id)}}" method="post" style="display: inline;">
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
