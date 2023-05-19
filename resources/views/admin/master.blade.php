<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="#" type="image/gif" sizes="16x16">
  <title>Arabian Shelf </title>

  <!-- Font Awesome Icons -->
 <!-- <link rel="stylesheet" href="{{ URL::asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <!--<link rel="stylesheet" href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css')}}">-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">-->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/toastr/toastr.min.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <style>

  .note-editable {
    color: black !important;
    height: 150px !important;
  }
  </style>
  <style>
    .text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color:#000000!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Event</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Information</a>
      </li>
    </ul>

    {{-- <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <li class="nav-item">
        <form  action="{{ route('logout') }}" method="POST" >
            @csrf

            <button type="submit" class="btn btn-info btn-sm">{{ __('Logout') }}</button>
        </form>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-angry"></i></a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Arabian Shelf</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{route('super.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>

          </li>





          <li class="nav-header" >All Pages</li>

          <!-- <li class="nav-item has-treeview" style="padding-bottom: 20px">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book "></i>
              <p>
                About Us
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p></p>
                </a>
              </li>

            </ul>
          </li> -->



          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.menu')}}" class="nav-link">
              <i class="nav-icon fas fa-portrait"></i>
              <p>MENU & SUB MENU</p>
            </a>
          </li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.coupon')}}" class="nav-link">
              <i class="nav-icon fas fa-tag"></i> <i class=""></i>
              <p>COUPONS</p>
            </a>
          </li>
          <li class="nav-header">Product Related Item</li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.brand')}}" class="nav-link">
              <i class="nav-icon fab fa-blogger"></i> <i class=""></i>
              <p>BRAND</p>
            </a>
          </li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.tag')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i> <i class=""></i>
              <p>TAGS</p>
            </a>
          </li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.volume')}}" class="nav-link">
              <i class="nav-icon fas fa-flask"></i> <i class=""></i>
              <p>VOLUME</p>
            </a>
          </li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.product')}}" class="nav-link">
              <i class="nav-icon fas fa-tshirt"></i> <i class=""></i>
              <p>PRODUCT</p>
            </a>
          </li>












          <li class="nav-header">Order Processing Section</li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.order')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>ORDER</p>
            </a>
          </li>

          <li class="nav-header">User Section</li>
          <li class="nav-item" style="padding-bottom: 10px">
            <a href="{{route('super.user')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>USER</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <!-- <marquee behavior="scroll" scrolldelay="300" direction="left"> <h6 style="color: rgba(3, 3, 3, 0.986)"> Welcome To CIDCH Admin Panel </h6></marquee> -->
        <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Starter Page</h1> --}}
            {{-- <marquee behavior="scroll" scrolldelay="700" direction="up">Welcome to Stop N Shop Admin Panel</marquee> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li> --}}

            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content Arabian Shelf</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://nxgit.com/" target="blank">NXGIT</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ URL::asset('public/assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('public/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- select2 -->
<script src="{{ URL::asset('public/assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('public/assets/backend/dist/js/adminlte.min.js')}}"></script>
<!-- Axios -->
<script type="text/javascript" src="{{ URL::asset('public/assets/backend/plugins/axios/axios.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script> --}}
<script src="{{ URL::asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('public/assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "Processing": true,
        "ServerSide": true,
        });
      $('#example2').DataTable({
        // "paging": true,
        // "lengthChange": true,
        // "searching": true,
        // "ordering": true,
        // "info": true,
        // "Processing": true,
        // "ServerSide": true,
        // "autoWidth": true,
        "responsive": true,
        "autoWidth": false,
        "Processing": true,
        "ServerSide": true,

      });
    });

  </script>

<script>
  $('.textarea').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['forecolor']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link']],
    ['height', ['height']]
  ]
});
  $(function () {
    // Summernote
    $('.textarea').summernote();
    // $('.textarea').summernote('foreColor', 'blue');
  })
</script>
<!-- <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    // $('.select2').select2()
  });
</script> -->
<script>
    $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            // //Initialize Select2 Elements
            // $('.select2bs4').select2({
            // theme: 'bootstrap4'
            // })
        })
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });
  </script>
<script>
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.nav-sidebar a').filter(function() {
      return this.href == url;
  }).addClass('active');

  // for treeview
  $('ul.nav-treeview a').filter(function() {
      return this.href == url;
  }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open') .prev('a').addClass('active');
</script>
  {{-- toastr --}}
   {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
   <script src="{{ URL::asset('public/assets/backend/plugins/toastr/toastr.min.js')}}"></script>
   {!! Toastr::message() !!}

   <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>

   <script>
      $('#categoryList').on('change', function () {
      $("#subcategoryList").attr('disabled', false); //enable subcategory select
      $("#subcategoryList").val("");
      $(".subcategory").attr('disabled', true); //disable all category option
      $(".subcategory").hide(); //hide all subcategory option
      $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
      $(".parent-" + $(this).val()).show();
      });
   </script>
   <script>
    $("#seeAnotherField").change(function() {
    if ($(this).val() == "yes") {
        $('#otherFieldDiv1').show();
        $('#otherFieldDiv2').show();
        $('#otherFieldDiv3').show();
        $('#otherFieldDiv4').show();
        $('#otherFieldDiv5').show();
        $('#otherFieldDiv6').hide();
        // $('#otherField').attr('required', '');
        // $('#otherField').attr('data-error', 'This field is required.');
    } else {
        $('#otherFieldDiv1').hide();
        $('#otherFieldDiv2').hide();
        $('#otherFieldDiv3').hide();
        $('#otherFieldDiv4').hide();
        $('#otherFieldDiv5').hide();
        $('#otherFieldDiv6').show();
        // $('#otherField').removeAttr('required');
        // $('#otherField').removeAttr('data-error');
    }
    });
    $("#seeAnotherField").trigger("change");
  </script>
  <script>
    $("#seeAnotherFieldVolume").change(function() {
    if ($(this).val() == "yes") {
        $('#otherFieldVolume').show();
        $('#otherFieldVolume1').hide();
        $('#otherFieldVolume2').hide();
        $('#otherFieldDiv6').hide();


    } else {
        $('#otherFieldVolume').hide();
        $('#otherFieldVolume1').show();
        $('#otherFieldVolume2').show();
        $('#otherFieldDiv6').show();

    }
    });
    $("#seeAnotherFieldVolume").trigger("change");
  </script>
<script>
  function validateForm() {
  var x = document.forms["myForm"]["size_s"].value;
  if (x < 0) {
    alert("product size must  be greater then zero");
    return false;
  }
}
</script>
<!-- image show in product add page   -->
<script>
var loadFile1 = function(event) {
	var image = document.getElementById('output1');
	image.src = URL.createObjectURL(event.target.files[0]);


};
var loadFile2= function(event) {


  var image2 = document.getElementById('output2');
	image2.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile3= function(event) {


  var image3 = document.getElementById('output3');
	image3.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile4= function(event) {


  var image4 = document.getElementById('output4');
	image4.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<script>
  // $('document').ready(function(){
  //   $('volume_enable').on('click',function(){
  //     let id=$(this).attr('data-id')
  //     let enabled = $(this).is(":checked")
  //     $('.volume_qty[data-id="' + id + '"]').attr('disabled', !enabled)
  //     $('.volume_qty[data-id="' + id + '"]').val(null)
  //   })
  // });

  $('document').ready(function () {
            $('.volume-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")

                $('.volume_qty[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.volume_qty[data-id="' + id + '"]').val(null)

                $('.volume_price[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.volume_price[data-id="' + id + '"]').val(null)
            })
        });
</script>
<script>
  // $('document').ready(function(){
  //   $('volume_enable').on('click',function(){
  //     let id=$(this).attr('data-id')
  //     let enabled = $(this).is(":checked")
  //     $('.volume_qty[data-id="' + id + '"]').attr('disabled', !enabled)
  //     $('.volume_qty[data-id="' + id + '"]').val(null)
  //   })
  // });

  $('document').ready(function () {
            $('.volume-enableedit').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                console.log(enabled);
                $('.volume_qty[data-id="' + id + '"]').attr('disabled', !enabled)



                $('.volume_price[data-id="' + id + '"]').attr('disabled', !enabled)


            })

        });
</script>
<script type="text/javascript">
    function SendData(Button){
        var id= Button.value;
       var email_subject =document.getElementById('email_subject'+id).value;
       var email_body =document.getElementById('email_body'+id).value;
       var order_id_for_email_sent =document.getElementById('order_id_for_email_sent'+id).value;
        //alert(id+email_subject + email_body + order_id_for_email_sent);

        var url="{{route('super.order.email.sent')}}";
        var data={email_subject:email_subject,email_body:email_body,order_id_for_email_sent:order_id_for_email_sent}
        // alert(url);
        axios.post(url,data)
        .then(function (response){
            document.getElementById('email_subject'+id).value = '';
            document.getElementById('email_body'+id).value= '';
            document.getElementById('order_id_for_email_sent'+id).value= '';
            $('#exampleModalCenteremail'+id).modal('hide');
            alert(response.data)
        })
        .catch(function(error){
            alert("Error");
        });

    }
</script>
</body>
</html>
