<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('layouts.tittle')
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<style>
    .accordion_Breakfast,
    .accordion_Lunch,
    .accordion_Dinner {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .panel_Breakfast,
    .panel_Lunch,
    .panel_Dinner {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }

    /*
        .*{ margin: 0;
            padding: 0;

        }*/
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 160px;
        /*max-width: 160px;*/
        margin: auto;
        text-align: center;
        font-family: arial;
        display: block;
        float: left;
    }

    /*    .title {
            color: grey;
            font-size: 18px;
        }*/

    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 20px;
    }

    a {
        text-decoration: none;
        font-size: 15px;
        /* color: black; */
    }

    /*    button:hover, a:hover {
            opacity: 0.7;
        }*/

</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        @include('layouts.header')
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Meal Booking
                </h1>
                <ol class="breadcrumb">
                    <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
                    <li class="">Meal Booking</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <a class="btn btn-primary btn-sm pull-right" href="{{ route('menus.order') }}">Create
                                    Order</a>
                            </h3>

                        </div>
                        <div class="box-body">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Total quanity</th>
                                        <th>Total Amount</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>05-05-2021</td>
                                        <td>10</td>
                                        <td>250</td>
                                        <td><b
                                                style='padding:5px;background:red;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 12px;font-weight: bold;line-height: 1;'>Order
                                                Pending
                                            </b></td>
                                        <td> <a data-toggle="modal" data-target="#booking_view-model" href="#"
                                                data-backdrop="static" id="link"
                                                title="<?php echo __('Order Details'); ?>"><i
                                                    class="fa fa-search-plus"></i></a>

                                            <a href="#" onclick="return confirm('Are you sure?')" class="sepV_a"
                                                title="<?php echo __('Order Withdraw'); ?>">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>04-05-2021</td>
                                        <td>12</td>
                                        <td>100</td>
                                        <td><b
                                                style='padding:5px;background:green;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 12px;font-weight: bold;line-height: 1;'>Order
                                                Approved
                                            </b></td>
                                        <td> <a data-toggle="modal" data-target="#booking_view-model" href="#"
                                                data-backdrop="static" id="link"
                                                title="<?php echo __('Order Details'); ?>"><i
                                                    class="fa fa-search-plus"></i></a>

                                            <a href="#" onclick="return confirm('Are you sure?')" class="sepV_a"
                                                title="<?php echo __('Order Withdraw'); ?>">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>03-05-2021</td>
                                        <td>5</td>
                                        <td>50</td>
                                        <td><b
                                                style='padding:5px;background:Black;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 12px;font-weight: bold;line-height: 1;'>Order
                                                Withdrawn
                                            </b></td>
                                        <td> <a data-toggle="modal" data-target="#booking_view-model" href="#"
                                                data-backdrop="static" id="link"
                                                title="<?php echo __('Order Details'); ?>"><i
                                                    class="fa fa-search-plus"></i></a>


                                            <a href="#" onclick="return confirm('Are you sure?')" class="sepV_a"
                                                title="<?php echo __('Order Withdraw'); ?>">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->

                </div>

            </section>
            <!-- /.content -->
        </div>
        <div class="modal fade" id="booking_view-model">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">
                            <div class="alert alert-success" role="alert">
                                <center> Order Details</center>
                            </div>

                        </h4>
                    </div>

                    <div class="modal-body">

                        <button class="accordion_Breakfast">
                            <b>Breakfast</b>
                        </button>
                        {{-- <center> Breakfast </center> --}}

                        <div class="panel_Breakfast">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Menu Name</th>
                                    <th>Quantity</th>
                                    <th>unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                                <tr>
                                    <td>Coffe</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Tea</td>
                                    <td>10</td>
                                    <td>94</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <b>
                                        <td colspan="3">
                                            <center><b>Total Amount</b></center>
                                        </td>

                                        <td><b>50</b></td>
                                    </b>
                                </tr>


                            </table>
                        </div>
                        <br>
                        {{-- <h5 class="modal-title">
                            <center> Lunch </center>
                        </h5> --}}
                        <button class="accordion_Lunch">
                            <b>Lunch</b>
                        </button>

                        <div class="panel_Lunch">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Menu Name</th>
                                    <th>Quantity</th>
                                    <th>unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                                <tr>
                                    <td>Coffe</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Tea</td>
                                    <td>10</td>
                                    <td>94</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <b>
                                        <td colspan="3">
                                            <center><b>Total Amount</b></center>
                                        </td>

                                        <td><b>50</b></td>
                                    </b>
                                </tr>


                            </table>
                        </div>
                        <br>
                        {{-- <h5 class="modal-title">
                            <center> Dinner </center>
                        </h5> --}}
                        <button class="accordion_Dinner">
                            <b>Dinner</b>
                        </button>
                        {{-- <center> Breakfast </center> --}}

                        <div class="panel_Dinner">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Menu Name</th>
                                    <th>Quantity</th>
                                    <th>unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                                <tr>
                                    <td>Coffe</td>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Tea</td>
                                    <td>10</td>
                                    <td>94</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <b>
                                        <td colspan="3">
                                            <center><b>Total Amount</b></center>
                                        </td>

                                        <td><b>50</b></td>
                                    </b>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion_Breakfast");
            var i;

            for (i = 0; i < acc.length; i++) {

                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
            var acc = document.getElementsByClassName("accordion_Lunch");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
            var acc = document.getElementsByClassName("accordion_Dinner");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }

        </script>
        @include('layouts.footer')

        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.3 -->
        <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">
        </script>

        <!-- AdminLTE App -->
        <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
        {{-- <script type="text/javascript" charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> --}}
        <!-- /.content-wrapper -->

        <!-- Footer -->

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });

        </script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>

</html>
