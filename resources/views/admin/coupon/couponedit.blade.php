@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
           
           
                
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Coupon: <b>{{$coupon->coupon_name}} </b> </h3>
                            <div class="card-tools">
                                <a class="btn btn-xs bt-primary" href="{{ URL::previous() }}">Go Back</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                            
                        </div>
                        
                        <!-- /.card-header -->
                        <form class="card-body  bg-dark"    role="form" method="POST" action="{{route('super.coupon.updatesave',$coupon->id)}}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class=" ">
                                <div class="row justify-content-center">

                                    
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            
                                            <label>Coupon price*</label>
                                            <input type="number" class="form-control" name="coupon_price" placeholder="Enter ..." min="10" value="{{$coupon->coupon_price}}">
                                        </div>
                                        <!-- /.form-group -->
                                        
                                    </div>
                                   
                                    <div class="col-md-10"> 
                                        <div class="form-group">
                                            <label>Active or Deactivate</label>
                                            <select id="" class="form-control" name="active_or_deactive" required >
                                                <option {{
                                                    $coupon->active_or_deactivate=="yes" ? 'selected':''
                                                }}  value="yes">Yes</option>
                                                <option {{$coupon->active_or_deactivate=="no" ? 'selected':''
                                                }}  value="no">No</option>
                                                
    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10"> 
                                       
                                            <div class="form-group">
                                                <label for="example-date-input" >Expired Date</label>
                                                
                                                <input class="form-control" type="date" name="date" id="example-date-input" value="{{$coupon->expired_date}}">
                                                
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