<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Arabian Shelf">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arabian Shelf</title>
    <link rel="icon" href="{{ URL::asset('public/assets/frontend/img/logo1.png')}}" type="image/gif" sizes="16x16">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function () {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });


        }); // jquery end
    </script>

    <style type="text/css">
        @media all and (min-width: 992px) {
            .navbar {
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar .has-megamenu {
                position: static !important;
            }

            .navbar .megamenu {
                left: 0;
                right: 0;
                width: 80%;
                padding: 20px;
            }

            .navbar .nav-link {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }
    </style>
    <style>
        .nav-pills .nav-link.active {
            background-color: #000000 !important;
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
.whatsapp_float{
    position: fixed;
    bottom: 40px;
    right: 20px;

}
    </style>
</head>
<body>
    @include('inc.header')
        @yield('content')

     @include('inc.footer')
     <div class="whatsapp_float">
         <a href="https://wa.me/8801515681601" target="_blank">
             <img src="{{ URL::asset('public/assets/frontend/img/whatsapp.png')}}" width="30px" alt="">
         </a>
     </div>

        <!-- Js Plugins -->
    <script src="{{ URL::asset('public/assets/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.dd.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('public/assets/frontend/js/main.js')}}"></script>
    <script src="{{ URL::asset('public/assets/backend/plugins/toastr/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}
        <!-- DataTables -->
<script src="{{ URL::asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script> --}}
<script src="{{ URL::asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    @stack('scripts')

    <script type="text/javascript">

        function validateFormpayment() {
        var x = document.forms["myFormpayment"]["payment_option"].value;
        var y = document.forms["myFormpayment"]["region"].value;
        var name=document.forms["myFormpayment"]["name"].value;
        var zipcode=document.forms["myFormpayment"]["zip"].value;
        var email=document.forms["myFormpayment"]["email"].value;
        var shipping_address=document.forms["myFormpayment"]["shipping_address"].value;
        var phone =document.forms["myFormpayment"]["phone"].value;
        var couponcode =document.forms["myFormpayment"]["couponcode"].value;
        var userguest =document.forms["myFormpayment"]["user_guest"].value;
        // var terms_policy =document.forms["myFormpayment"]["terms_policy"].checked;



        // window.onload=function()
        // {
        //     console.log("hello");
        // }

        if (name =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Name field is required!');
            // toastr.options.progressBar = true;
            return false;
        }
        if (shipping_address =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Shipping address field is required!');
            // toastr.options.progressBar = true;
            return false;
        }
        if (zipcode =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Zipcode  field is required!');
            // toastr.options.progressBar = true;
            return false;
        }

        if (email =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Email field is required!');
            // toastr.options.progressBar = true;
            return false;
        }
        if (phone =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Phone  field is required!');
            // toastr.options.progressBar = true;
            return false;
        }
        if (y =="") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Please select region!');
            // toastr.options.progressBar = true;
            return false;
        }
        if ( y != "Barishal" && y != "Barishal" && y != "Chattogram" && y != "Dhaka" && y != "Khulna" && y != "Mymensingh" && y != "Rajshahi" && y != "Rangpur" && y != "Rajshahi" && y != "Sylhet") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Please do not change the region value!');
            // toastr.options.progressBar = true;
            return false;
        }

        if(couponcode != coupontemp ){
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Please do not change your coupon! Reload this page.');
            // toastr.options.progressBar = true;
            return false;
        }
        if(userguest != userguesttemp ){
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Do not be smart! Reload this page.');
            // toastr.options.progressBar = true;
            return false;
        }

        if (x != "cash_on" && x != "digital_pay") {
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Please select payment option!');
            // toastr.options.progressBar = true;
            return false;
        }
        if(!document.forms["myFormpayment"]["terms_policy"].checked ){
            toastr.options.progressBar = true;
            toastr.options.closeDuration = 5000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.options.showEasing = 'easeOutBounce';
            toastr.options.showMethod = 'slideDown';
            toastr.info('Please select terms & policy option!');
            // toastr.options.progressBar = true;
            return false;
        }

        }
    </script>
    <script>
        $(function () {
            // $("#example1").DataTable();
            $('#example3').DataTable({
            "paging": true,
            "lengthChange":true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,

            });
        });
    </script>
    <script type="text/javascript">
        function setAction(form) {
            // alert("hello");
            // confirm("Do you want to proceed as a Guest?")

            // var temp=$('#exampleModalCenterguest').modal('toggle').value;
            if(confirm("Do you want to proceed as a Guest?")){
                form.action = "{{route('proceed.checkoutGuest')}}";
            }else{
                form.action = "{{route('proceed.checkoutUser')}}";

            }
                // ConfirmDialog('Are you sure');


            };
        // function Confirmguest(message) {
        //     event.preventDefault();
        //     var confirmguestornot = $('<div></div>').appendTo('body')
        //     .html('<h6>' + message + '?</h6>')
        //     .dialog({
        //         modal: true,
        //         title: 'Delete message',
        //         zIndex: 10000,
        //         autoOpen: false,
        //         width: 'auto',
        //         resizable: false,
        //         buttons: {
        //             Yes: function() {


        //             $(this).dialog("close");

        //             return true;
        //             },
        //             No: function() {


        //             $(this).dialog("close");
        //             return false;
        //             }
        //         },
        //         close: function(event, ui) {
        //             $(this).remove();

        //         }
        //     });
        //     return confirmguestornot.dialog("open");
        // };
            //  function setguest(){
            //     document.checkmyform.action ="{{route('proceed.checkoutGuest')}}";
            //  }
    </script>
</body>
</html>
