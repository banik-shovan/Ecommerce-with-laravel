@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-xs-12 col-sm-12 col-md-12">


                <div class="card card-danger" >
                    <div class="card-header card-danger">
                        <h3 class="card-title">All PRODUCT</h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body box-body" style="display:none">
                        <table id="example2" class="table table-sm table-responsive-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Order Id</th>
                                <th>Payment Type</th>
                                <th>Card Type</th>
                                <th>Bank Transaction Id</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Action</th>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item->order_unique_id}}</td>
                                        <td>{{$item->payment_type}}</td>
                                        @if($item->payment_type =="digital_pay")
                                        <td>{{$item->order->card_type}}</td>
                                        <td>{{$item->order->bank_tran_id}}</td>
                                        @else
                                        <td>--</td>
                                        <td>--</td>
                                        @endif
                                        <td>
                                        <form  action="{{route('super.order.order_status_change',$item->id)}}" method="post">
                                            @csrf


                                            <select name="changestatus" >
                                                <option {{$item->status == "pending"?'selected':''}} value="pending">Pending</option>
                                                <option  {{$item->status == "processing"?'selected':''}} value="processing">Processing</option>
                                                <option {{$item->status == "completed"?'selected':''}} value="completed">Completed</option>
                                                <option {{$item->status == "cancelled"?'selected':''}} value="cancelled">Canceled</option>
                                            </select>
                                            @if($item->status !="cancelled" && $item->status !="completed" )
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-xs btn-warning" type="submit">update</button>
                                            <!-- <a class="btn btn-xs btn-warning" type="submit" style="text-decoration:none;">Active</a> -->
                                            @endif
                                        </form>
                                        </td>
                                        <td>{{ $item->created_at->diffForhumans()}}</td>
                                        <!-- <td>{{ Carbon\Carbon::now()}}</td> -->
                                        <td>
                                        <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                                            View
                                        </button>
                                        <a  data-toggle="modal" data-target="#exampleModalCenteremail{{$item->id}}"><i class="far fa-comment-dots"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                ID: {{$item->order_unique_id}}
                                                            </small>
                                                        </h5>

                                                        <div class="page-tools">
                                                            <div class="action-buttons">
                                                                <form target="blank" action=" {{route('super.order.pdf',$item->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn bg-white btn-light mx-1px text-95"   data-title="Print" type="submit" >

                                                                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                                                        Print
                                                                    </button>
                                                                </form>
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

                                                                            <span class="text-600 text-110 text-blue align-middle">Name:
                                                                            @if($item->user_id == Null)
                                                                                Guest
                                                                            @else
                                                                            {{$item->user->name}}
                                                                            @endif
                                                                            </span>
                                                                        </div>
                                                                        <div class="text-grey-m2">
                                                                            <span class="text-sm text-grey-m2 align-middle">Shipping Address:</span>
                                                                            <div class="my-1">
                                                                                {{$item->shipping_address}}
                                                                            </div>
                                                                            <div class="my-1">
                                                                                {{$item->country}}, {{$item->city}}
                                                                            </div>
                                                                            <div class="my-1">
                                                                            <span class="text-sm text-grey-m2 align-middle"> zip Code:{{$item->zip}}</span>
                                                                            </div>
                                                                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$item->phone}}</b></div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->

                                                                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                                        <hr class="d-sm-none" />
                                                                        <div class="text-grey-m2">
                                                                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                                                Invoice
                                                                            </div>

                                                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> {{$item->order_unique_id}}</div>

                                                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$item->created_at->format('d -m -Y ')}}</div>

                                                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{$item->status}}</span></div>
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
                                                                        @foreach($item->orderitems as $orderitem)
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
                                                                                    <span class="text-120 text-secondary-d1">&#2547;{{$item->total_amount_before_cupon_point}}</span>
                                                                                </div>
                                                                            </div>
                                                                            @if($item->coupon != "null")
                                                                            <div class="row my-2">
                                                                                <div class="col-7 text-right">
                                                                                    Coupon:{{$item->coupon}}
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span class="text-110 text-secondary-d1">&#2547;{{$item->coupon_price}}</span>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if($item->digital_pay_charge != "no")
                                                                                <div class="row my-2">
                                                                                    <div class="col-7 text-right">
                                                                                        Transaction charge:
                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <span class="text-110 text-secondary-d1">&#2547;{{$item->digital_pay_charge_amount}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if($item->point != "not_apply")
                                                                            <div class="row my-2">
                                                                                <div class="col-7 text-right">
                                                                                    Congratulation! For Point (15%) Reduce
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span class="text-110 text-secondary-d1">&#2547;{{$item->total_amount}}</span>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <div class="row my-2">
                                                                                <div class="col-7 text-right">
                                                                                    Delivery charge:
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span class="text-110 text-secondary-d1">&#2547;{{$item->delivery_charge}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                                                <div class="col-7 text-right">
                                                                                    Total Amount(VAT Inc.)
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <span class="text-150 text-success-d3 opacity-2">&#2547;{{$item->total_amount}}</span>
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
                                    <!-- Modal for email section -->
                                    <div class="modal fade" id="exampleModalCenteremail{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Send Email</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="email_form">
                                                    <div class="form-group">
                                                        <label for="email_subject">Email Subject</label>
                                                        <input type="text" class="form-control" id="email_subject{{$item->id}}" >
                                                    </div>
                                                    <input type="hidden" id="order_id_for_email_sent{{$item->id}}" value="{{$item->id}}">
                                                    <div class="form-group">
                                                        <label for="email_body">Email Body</label>
                                                        <textarea class="form-control" id="email_body{{$item->id}}" rows="10"></textarea>
                                                    </div>
                                                    <button onclick="SendData(this)" value="{{$item->id}}" type="button" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
