@extends('admin.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-2" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary" style="padding:10px;"><i class="fas fa-plus-circle"></i><a href="{{route('super.product.create')}}" style="text-decoration:none;color:white;padding: 2px;">Create New Product</a></button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-secondary" style="padding:10px;"><i class="fas fa-plus-circle"></i><a href="{{route('super.tag')}}" style="text-decoration:none;color:white;padding: 2px;">Create New Tag</a></button>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-2" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-success" style="padding:10px;"  ><i class="fas fa-plus-circle"></i><a href="{{route('super.volume')}}" style="text-decoration:none;color:white;padding: 2px;">Create Volume</a></button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="card card-danger" >
                        <div class="card-header card-danger">
                            <h3 class="card-title">All PRODUCT</h3>
                            <div class="card-tools ">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body " ">
                            <table id="example2" class="table table-sm table-responsive-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>Picture</th>
                                        <th>Price</th>
                                        <th>Old Price</th>
                                        <th>Size/volume</th>
                                        <th>Menu & Submenu</th>
                                        <th>Brand</th>
                                        <th>Total product</th>
                                        <th>Active</th>

                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($product as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>


                                           <td style="width: 15%">
                                           <img class="rounded" src="{{asset('public/productImage/'.$item->image1)}}" alt="" style="width:15% ;">
                                           <img class="rounded" src="{{asset('public/productImage/'.$item->image2)}}" alt="" style="width:15% ;"><br>
                                           <img class="rounded" src="{{asset('public/productImage/'.$item->image3)}}" alt="" style="width:15% ;">
                                           <img class="rounded" src="{{asset('public/productImage/'.$item->image4)}}" alt="" style="width:15% ;">

                                           </td>

                                            <td>{{$item->main_price}}</td>
                                            <td>{{$item->old_price}}</td>
                                            <td>S : {{$item->size}} | V :{{$item->volume}} <br>
                                            @if($item->size == "yes")
                                                <b> S: {{$item->s}},M: {{$item->m}},L: {{$item->l}} ,XL: {{$item->xl}},XXL: {{$item->xxl}}</b>
                                            @endif

                                            </td>
                                            <td>Menu:{{$item->menu->name}} <br>
                                            @if($item->submenu_id)
                                            S.menu:{{$item->submenu->name}}
                                            @endif
                                            </td>
                                            <td>{{$item->brand->name}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>{{$item->active}}




                                            </td>
                                            <td>
                                                @if($item->active == 'yes')
                                                <a class="btn btn-xs btn-danger" href="{{route('super.product.deactivate',$item->id)}}" style="text-decoration:none;">Deactivate</a>
                                                @else
                                                <a class="btn btn-xs btn-warning" href="{{route('super.product.active',$item->id)}}" style="text-decoration:none;">Active</a>
                                                @endif
                                                <a href="{{route('super.product.update',$item->id)}}" class=""   title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a>
                                                <form onclick="return confirm('Are you sure?')" action="{{route('super.product.delete',$item->id)}}" method="post" style="display: inline;">
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
