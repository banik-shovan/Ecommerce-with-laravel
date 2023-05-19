@extends('admin.master')

@section('content')

<section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-11">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Edit</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
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
                        <form class=" card-body  bg-dark" name="myForm"  role="form" method="POST" action="{{route('super.product.updatesave',$product->id)}}" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf

                            <div class=" ">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <label>Product Name*</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="Enter ..."  value="{{$product->name}}" required>
                                            @if ($errors->has('product_name'))
                                                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Active</label>
                                            <select id="product_active" class="form-control" name="product_active">

                                                <option
                                                {{
                                                    $product->active=="yes" ? 'selected':''
                                                }} value="yes">Yes</option>
                                                <option {{
                                                    $product->active=="no" ? 'selected':''
                                                }} value="no">No</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <select id="brsndList" class="form-control" name="brand_id">
                                                <option value="">choose your option</option>
                                                @foreach ($brands as $item)
                                                    <option
                                                    {{
                                                    $product->brand_id==$item->id ? 'selected':''
                                                }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Short Description</label>
                                            <textarea class="textarea" name="short_description" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->short_description}}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="textarea" name="product_description" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->description}}</textarea>

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Menu <span>*</span></label>
                                            <select id="categoryList" class="form-control" name="menu_id" required>
                                                <option value="">choose your option</option>
                                                @foreach ($menu as $category)

                                                    <option {{
                                                    $product->menu_id==$category->id ? 'selected':''
                                                }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">


                                            <label>Sub Menu</label>
                                            <select id="subcategoryList" class="form-control" name="submenu_id" >
                                            <option value=""></option>
                                                @foreach ($submenu as $subcategory)
                                                    <option {{
                                                    $product->submenu_id==$subcategory->id ? 'selected':''
                                                }}
                                                    value="{{ $subcategory->id }}" class='parent-{{ $subcategory->menu_id }} subcategory'>{{ $subcategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Product Size(Y/N)*</label>
                                                    <select id="seeAnotherField" class="form-control" name="product_size" required>
                                                        <option @if($product->size == "no") {{'selected'}} @endif value="no">No</option>
                                                        <option @if($product->size == "yes") {{'selected'}} @endif value="yes">Yes</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                    <label>Product Volume(Y/N)*</label>
                                                    <select id="seeAnotherFieldVolume" class="form-control" name="product_volume" required>
                                                        <option @if($product->volume == "no") {{'selected'}} @endif
                                                            value="no">No
                                                        </option>
                                                        <option
                                                            @if($product->volume == "yes") {{'selected'}} @endif value="yes">Yes
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Exclusive(Y/N)*</label>
                                                    <select id="" class="form-control" name="exclusive" required >
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" id="otherFieldDiv6">
                                                    <label>TOTAL PRODUCT</label>
                                                    <input type="number" class="form-control" name="total_product" placeholder="Enter ..."  value="{{$product->total}}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- volume  -->

                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row" id="otherFieldVolume">

                                            @foreach($volumes as $item)
                                                <div class="col-sm-6">
                                                    <!-- checkbox -->

                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input

                                                             type="checkbox"  data-id="{{$item->id}}" class="volume-enableedit">
                                                            <label for="checkboxPrimary" style="color:orange">
                                                            {{$item->name}}
                                                            </label>
                                                            <label for="pin">Qty:</label>
                                                            <input @foreach($product->volumes as $vitem)
                                                                @if( $vitem->id==$item->id)
                                                                    value="{{$vitem->pivot->qty}}"





                                                                @endif


                                                            @endforeach
                                                            {{ $item->value ? null : 'disabled' }}
                                                             type="number"  class="volume_qty" data-id="{{$item->id}}" name="qty[{{$item->id}}]" min="0" >
                                                            <label for="pin">Price:</label>
                                                            <input
                                                            @foreach($product->volumes as $vitem)
                                                                @if( $vitem->id==$item->id)
                                                                    value="{{ $vitem->pivot->price }}"

                                                                @endif

                                                            @endforeach
                                                            {{ $item->value ? null : 'disabled' }}

                                                              type="number" class="volume_price" data-id="{{$item->id}}" name="price[{{$item->id}}]" min="0" >
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <!-- size  -->

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group"  id="otherFieldDiv1">
                                                    <label>Product Size (S)</label>
                                                    <input type="number" class="form-control" name="size_s" placeholder="Enter ..."  value="{{$product->s}}" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group"  id="otherFieldDiv2">
                                                    <label>Product Size (M)</label>
                                                    <input type="number" class="form-control" name="size_m" placeholder="Enter ..."  value="{{$product->m}}" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"  id="otherFieldDiv3">
                                                    <label>Product Size (L)</label>
                                                    <input type="number" class="form-control" name="size_l" placeholder="Enter ..."  value="{{$product->l}}" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"  id="otherFieldDiv4">
                                                    <label>Product Size (XL)</label>
                                                    <input type="number" class="form-control" name="size_xl" placeholder="Enter ..."  value="{{$product->xl}}" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"  id="otherFieldDiv5">
                                                    <label>Product Size (XXL)</label>
                                                    <input type="number" class="form-control" name="size_xxl" placeholder="Enter ..."  value="{{$product->xxl}}" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- image  -->
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="exampleInputFile">Image(1) <span>*</span> </label>
                                                        <img class="rounded" src="{{asset('public/productImage/'.$product->image1)}}" alt="" style="width:10% ;height:5%;">
                                                        <div class="input-group">
                                                            <p><input type="file"  accept="image/*" class="form-control-file" name="image1"   onchange="loadFile1(event)" ></p>

                                                            <p><img id="output1" width="100" /></p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="exampleInputFile">Image(2)</label>
                                                        <img class="rounded" src="{{asset('public/productImage/'.$product->image2)}}" alt="" style="width:10%;height:5%;">
                                                        <div class="input-group">
                                                            <p><input type="file"  accept="image/*" class="form-control-file" name="image2" onchange="loadFile2(event)"></p>
                                                            <p><img id="output2" width="100" /></p>

                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="exampleInputFile">Image(3)</label>
                                                        <img class="rounded" src="{{asset('public/productImage/'.$product->image3)}}" alt="" style="width:10%;height:5%;">
                                                        <div class="input-group">
                                                        <p> <input type="file" accept="image/*" class="form-control-file" name="image3" id="exampleFormControlFile1" onchange="loadFile3(event)"></p>
                                                        <p><img id="output3" width="100" /></p>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="exampleInputFile">Image(4)</label>
                                                        <img class="rounded" src="{{asset('public/productImage/'.$product->image4)}}" alt="" style="width:10%;height:5%;">
                                                        <div class="input-group">
                                                            <p><input type="file" accept="image/*" class="form-control-file" name="image4" id="exampleFormControlFile1" onchange="loadFile4(event)"></p>
                                                            <p><img id="output4" width="100" /></p>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" id="otherFieldVolume1">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="main_price" placeholder="Enter ..."  value="{{$product->main_price}}">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" id="otherFieldVolume2">
                                            <label>Old Price</label>
                                            <input type="text" class="form-control" name="old_price" placeholder="Enter ..."  value="{{$product->old_price}}">

                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Tag select Multiple <span>*</span></label>
                                            <div class="select2-purple">
                                                <select class="select2"  name ="tag_id[]" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple"  style="width: 100%;">

                                                    <!-- <option>Washington</option> -->
                                                    @foreach ($tags as $item)
                                                        <option
                                                        @foreach($product->tags as $ptag)
                                                        {{
                                                            $ptag->id==$item->id ? 'selected':''
                                                        }}
                                                        @endforeach
                                                         value="{{ $item->id }}" >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
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
                        {{-- <div>
                            <h3>herllonkj</h3>
                        </div> --}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</section>

@endsection
