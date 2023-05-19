@extends('layouts.master')

@section('content')

    <!-- user deshboard Begin-->
    <div class="container  spad ordertable">
        <div class="row profile">
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profiles-userpic">
                        <img src="{{asset('public/userImage/'. Auth::user()->userprofile->imagePath)}}" onerror="this.src='{{asset('public/userImage/profile.png')}}'" class="img-responsive rounded-circle">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                        {{ Auth::user()->name }} <br>
                        <b> User Point:{{Auth::user()->userprofile->user_point}}</b>
                        </div>

                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                            <form  action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf


                                <button type="submit" class="btn badge-dark btn-sm">Logout</button>
                            </form>

                        <!-- <button type="button" class="btn btn-link btn-sm">Message</button> -->
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">

                        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">USER PROFILE</a>
                            <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-editprofile"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">Edit PROFILE</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false">Order</a>
                            <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->

                        </div>

                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-10">


                <div class="tab-content " id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="titlebox">
                            <h2 class="titleprofile">User Profile </h2>
                        </div>

                        <div class="profile-content">

                            <div class="teacher-des">

                                <div class="content">

                                    <ul style="list-style-type:none;">
                                        <li><b>EMAIL &nbsp; &nbsp; &nbsp; &nbsp;:</b> &nbsp;
                                            &nbsp;{{ Auth::user()->email }}</li><br>
                                        <li><b>ADDRESS&nbsp;:</b> &nbsp; &nbsp;{{ Auth::user()->userprofile->address1 }}
                                        </li>
                                        <br>
                                        <li><b>COUNTRY&nbsp;:</b> &nbsp; &nbsp;{{ Auth::user()->userprofile->country }}</li>
                                        <br>
                                        <li><b>CITY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:</b>
                                            &nbsp; &nbsp;{{ Auth::user()->userprofile->city }}</li><br>
                                        <li><b>ZIP CODE &nbsp;:</b> &nbsp; &nbsp;{{ Auth::user()->userprofile->zip }}</li>
                                        <li><b></b></li>

                                    </ul>
                                    <!-- <div style="padding-top:20px;">
                                        <a class="btn btn-secondary btn-sm" href="#" role="button"><Span>Edit
                                                Profile</Span></a>
                                    </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade show " id="v-pills-editprofile" role="tabpanel"
                        aria-labelledby="v-pills-editprofile-tab">
                        <div class="titlebox">
                            <h2 class="titleprofile">Edit User Profile </h2>
                        </div>

                        <form class="pt-5" method="POST" action="{{route('profile.updatesave')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 ">

                                    <label for="image">Image</label>
                                     <input type="file" accept="image/*" class="form-control-file" name="imagePath" id="image">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option selected>Choose...</option>
                                        <option {{Auth::user()->userprofile->gender=="male" ?'selected':''}} value="male">Male</option>
                                        <option {{Auth::user()->userprofile->gender=="female" ?'selected':''}} value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control"  name="phone" id="phone" value="{{ Auth::user()->userprofile->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="1234 Main St" value="{{ Auth::user()->userprofile->address1 }}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2"> Shipping Address</label>
                                <input type="text" class="form-control" id="inputAddress2" name="shipping_address" placeholder="Apartment, studio, or floor" value="{{ Auth::user()->userprofile->shipping_address }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="form-control">
                                        <option >Choose...</option>
                                        <option selected value="bangladesh">Bangladesh</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" value="{{ Auth::user()->userprofile->city }}">
                                </div>

                                <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="inputZip" value="{{ Auth::user()->userprofile->zip }}">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="titlebox">
                            <h2 class="titleprofile"> All Order </h2>
                        </div>
                        <!-- card start -->
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Payment Type</th>
                                            <th>Transaction Id</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Order Date</th>
                                            <th>VIew</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_unique_id}}</td>
                                            <td>{{$order->payment_type}}</td>
                                            <td>{{$order->transaction_id}}</td>
                                            <td>{{$order->status}}</td>
                                            @if($order->payment_type == "digital_pay")
                                                @if($order->order->status == "processing")
                                                    <td>completed</td>
                                                @else
                                                    <td>{{$order->order->status}}</td>
                                                @endif
                                            @else
                                                @if($order->status == "completed")
                                                <td>{{$order->status}}</td>
                                                @else
                                                <td>---</td>
                                                @endif
                                            @endif
                                            <td>{{ $order->created_at->diffForhumans()}}</td>
                                            <!-- <td>{{ Carbon\Carbon::now()}}</td> -->
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#exampleModalCenter{{$order->id}}">
                                                View
                                            </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- invoice  -->
                                                    <div class="page-content container">
                                                        <div class="page-header text-blue-d2">
                                                            <h5 class="page-title text-secondary-d1">
                                                                Invoice
                                                                <small class="page-info">
                                                                    <i class="fa fa-angle-double-right text-80"></i>
                                                                    ID: {{$order->order_unique_id}}
                                                                </small>
                                                            </h5>

                                                            <div class="page-tools">
                                                                <div class="action-buttons">
                                                                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                                                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                                                        Print
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="container px-0">
                                                            <div class="row mt-4">
                                                                <div class="col-12 col-lg-10 offset-lg-1">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="text-center text-150">
                                                                                <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
                                                                                <img src="{{ URL::asset('public/assets/frontend/img/logo1.png')}}" alt="" style="height: 80px; width:70px">
                                                                                <!-- <span class="text-default-d3">Arabianshelf</span> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- .row -->

                                                                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div>

                                                                                <span class="text-600 text-110 text-blue align-middle">{{$order->user->name}}</span>
                                                                            </div>
                                                                            <div class="text-grey-m2">
                                                                                <span class="text-sm text-grey-m2 align-middle">Shipping Address:</span>
                                                                                <div class="my-1">
                                                                                    {{$order->shipping_address}}
                                                                                </div>
                                                                                <div class="my-1">
                                                                                    {{$order->country}}, {{$order->city}}
                                                                                </div>
                                                                                <div class="my-1">
                                                                                <span class="text-sm text-grey-m2 align-middle"> zip Code:{{$order->zip}}</span>
                                                                                </div>
                                                                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$order->phone}}</b></div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.col -->

                                                                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                                            <hr class="d-sm-none" />
                                                                            <div class="text-grey-m2">
                                                                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                                                    Invoice
                                                                                </div>

                                                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> {{$order->order_unique_id}}</div>

                                                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$order->created_at->format('d -m -Y ')}}</div>

                                                                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{$order->status}}</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>

                                                                    <div class="mt-4">
                                                                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                                                                            <div class="d-none d-sm-block col-1">#</div>
                                                                            <div class="col-9 col-sm-5">Name</div>
                                                                            <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                                                            <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                                                                            <div class="col-2">Amount</div>
                                                                        </div>

                                                                        <div class="text-95 text-secondary-d3">
                                                                            @php
                                                                            $i=0
                                                                            @endphp
                                                                            @foreach($order->orderitems as $orderitem)
                                                                            @php $i=$i+1 @endphp
                                                                            <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                                                                <div class="d-none d-sm-block col-1">{{$i}}</div>
                                                                                <div class="col-9 col-sm-5">{{$orderitem->name}}</div>
                                                                                <div class="d-none d-sm-block col-2">{{$orderitem->qty}}</div>
                                                                                <div class="d-none d-sm-block col-2 text-95">&#2547;{{$orderitem->price}}</div>
                                                                                <div class="col-2 text-secondary-d2">&#2547;{{$orderitem->totalprice}}</div>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>


                                                                        <div class="row border-b-2 brc-default-l2"></div>

                                                                        <!-- or use a table instead -->
                                                                        <!--
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                                                                <thead class="bg-none bgc-default-tp1">
                                                                                    <tr class="text-white">
                                                                                        <th class="opacity-2">#</th>
                                                                                        <th>Description</th>
                                                                                        <th>Qty</th>
                                                                                        <th>Unit Price</th>
                                                                                        <th width="140">Amount</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody class="text-95 text-secondary-d3">
                                                                                    <tr></tr>
                                                                                    <tr>
                                                                                        <td>1</td>
                                                                                        <td>Domain registration</td>
                                                                                        <td>2</td>
                                                                                        <td class="text-95">$10</td>
                                                                                        <td class="text-secondary-d2">$20</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        -->

                                                                        <div class="row mt-3">
                                                                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">

                                                                            </div>

                                                                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        SubTotal
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-120 text-secondary-d1">&#2547;{{$order->total_amount_before_cupon_point}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if($order->coupon != "null")
                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Coupon:{{$order->coupon}}
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-110 text-secondary-d1">&#2547;{{$order->coupon_price}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @endif



                                                                                @if($order->point != "not_apply")
                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Congratulation! For Point (15%) Reduce
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-110 text-secondary-d1">&#2547;{{$order->total_amount}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @endif

                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Delivery charge:
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-110 text-secondary-d1">&#2547;{{$order->delivery_charge}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if($order->digital_pay_charge != "no")
                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Transaction charge:
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-110 text-secondary-d1">&#2547;{{$order->digital_pay_charge_amount}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Total Amount(VAT Inc.)
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-150 text-success-d3 opacity-2">&#2547;{{$order->total_amount}}</span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <hr />

                                                                        <div>
                                                                            <span class="text-secondary-d1 text-105">Note: By purchasing this product,you agreed to the Terms And Conditions,Privacy policy and Return Refund policy of arabianshelf.com</span>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- invoice end  -->
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>




                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">fbdb</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">fbdfb</div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- user deshboard end -->

@endsection
