@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">





            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="card card-danger" >
                    <div class="card-header card-danger">
                        <h3 class="card-title">ALL USER</h3>
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
                                    <th> ID</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th>Total Num. Of Order</th>
                                    <th> Total Order Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as  $user)


                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>

                                        <td>{{$user->email}}</td>
                                        <td>{{$user->userprofile->phone}}</td>

                                        <td>{{$user->orderinternals->count()}}</td>
                                        <td>
                                            &#2547;{{$user->orderinternals->sum('total_amount')}}

                                            {{-- <a href="" class=""  data-toggle="modal" data-target="#exampleModal" title="edit" style="color:#2196F3"> <i class="fa fa-edit" style="padding: 10px"></i></a> --}}
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
