<!--@extends('layouts.app')-->

<style>
    /*    #sider {
            position: fixed;
            background-color : #00FF00;
            height: 300%;
            width: 500px;
            overflow: hidden;
        }*/
</style>

@include('layouts.tittle')
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php

use App\Http\Controllers\HomeController; ?>
<?php // echo HomeController::check_meal_bookig_status();   ?>
<style>
    #table {
        display: block;
        overflow: scroll;
    }
    .title{
        color: green;
        font-size: 20px;
        font-family: Orbitron; 
    }
    .clock {
        /*position: absolute;*/
        top: 50%;
        left: 63%;
        /*transform: translateX(-50%) translateY(-50%);*/
        color: green;
        font-size: 20px;
        font-family: Orbitron;
        /*letter-spacing: 3px;*/ 



    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }

    .img {
        border-radius: 50%;
    }

    /* body,
    html {
        overflow-x: hidden;
    } */

</style>

@section('content')
<!DOCTYPE html>

<html>



    <body style="background-color:#ecf0f5;">

        <div class="wrapper" class="table-wrapper-scroll-y my-custom-scrollbar">

            <!-- Main Header -->
            {{-- @include('layouts.header') --}}
            <!-- Sidebar -->

            {{-- @include('layouts.sidebar') --}}

            <!-- Content Wrapper. Contains page content -->

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
            </section>

            <!-- Main content -->





            <!-- left column -->

            <?php if (Auth::user()->role == 3) { ?>
                <form method="POST" action="{{ url('empolyee_details') }}">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3" id="pasding">
                                <div class="form-group">
                                    <label><span style="color:red">*</span><?php
                                        echo
                                        __('Select Employee');
                                        ?> :</label>
                                    <input type="text"  name="emplyee_seach"
                                           class="form-control" id ="GrnVendorCode" value="{{$users->emp_code}}">
                                    <input type="hidden"  name="emplyee_id"
                                           class="form-control" id="emplyee_id" value="{{$users->id}}">

                                </div>
                            </div>
                            <div class="col-md-4" id="pasding">
                                <div class="form-group">

                                    <input type="submit" value="Search" class="btn btn-info">
                                </div>
                            </div>



                        </div>
                    </div>
                </form>
            <?php } ?>
            <div class="row">



                <!-- left column -->
                <div class="col-md-4" id="sider">

                    <div class="box">
                        <div class="box-body">


                            <div class="col-sm-12">
                                <b>

                                    <table class="table table-condensed">
                                        <tr>
                                            <td><b>Emp Code :</b></td>
                                            <td>{{ $users->emp_code }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Name :</b></td>
                                            <td>{{ $users->firstname }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Department:</b></td>
                                            <td>{{ $users->department }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Section :</b></td>
                                            <td>{{ $users->unit }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mobile No :</b></td>
                                            <td>{{ $users->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email id :</b></td>
                                            <td>{{ $users->email }}</td>
                                        </tr>


                                    </table>
                                </b>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">

                    <div class="box">

                        <div class="box-body">

<!--                        <p><b
                                style='padding:5px;background:green;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 15px;font-weight: bold;line-height: 1;'>
                                Breakfast
                            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="#">Book</a>
                            <b>&nbsp;&nbsp;Booking Confirmation</b>
                        </p>
                        <p><b
                                style='padding:5px;background:blue;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 15px;font-weight: bold;line-height: 1;'>
                                Lunch
                            </b>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                class="btn btn-primary btn-sm" href="">Book</a><b>&nbsp;&nbsp;&nbsp;Booking
                                Confirmation</b></p>
                        <p><b
                                style='padding:5px;background:red;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 15px;font-weight: bold;line-height: 1;'>
                                Dinner
                            </b>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm"
                                                                                           href="#">Book</a><b>&nbsp;&nbsp;&nbsp;Booking
                                Confirmation</b></p>
                            -->
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th><center><?php echo __('Meal Name'); ?></center></th>
                                <th><center><?php echo __('Status'); ?></center></th>
                                <th><center><?php echo __('Message'); ?></center></th>

                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($meal_name as $meal_names)
                                    <?php
                                    $status = HomeController::check_meal_bookig_status($meal_names->id, $users->id);
                                    $available = HomeController::checktimeing_meal($meal_names->id, $users->unit);
                                    $checkmsg_time = HomeController::checkmsg_time($meal_names->id, $users->unit);
                                    $print_date = HomeController::print_date($meal_names->id, $users->unit);
                                    ?>
                                    <tr>
                                        <td><b>{{ $meal_names->menu_name}}<small> {{$print_date}}</small> </b></td>
                                        <td> <center><?php
                                    if ($available == true) {
                                        if ($status == false) {
                                            ?><a class="btn btn-primary btn-sm" href="{{ url('meal_booking/'.$meal_names->id.'/'.$users->id) }}">Book</a><?php } else { ?> <a class="btn btn-danger btn-sm" href="{{ url('meal_booking_delete/' .$meal_names->id.'/'.$users->id) }}">Cancel</a> <?php } ?><?php } ?></center></td>
                                <td><center><?php
                                    if ($checkmsg_time == true) {
                                        if ($status == true) {
                                            ?>Booking Confirmed <?php
                                        }
                                    }
                                    ?></center></td>

                                </tr>

                                @endforeach

                                </tbody>

                            </table>


                        </div>
                    </div>
                    <!-- /.col -->

                </div>
                <div class="col-md-4">

                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered" style="width:100%" id="table">


                                <tr>
                                    <th rowspan="2"><center>Meal</center></th>
                                <th colspan="2"><center>Current Month</center></th>
                                <th colspan="2"><center>Previous Month</center></th>

                                </tr>
                                <tr>

                                    <td><center><b>count</b></center></td>
                                <td><center><b>Amount</b></center></td>
                                <td><center><b>count</b></center></td>
                                <td><center><b>Amount</b></center></td>



                                </tr>
                                <?php
                                $current_month_total_amount = '0';
                                $previous_month_total_amount = '0';
                                ?>
                                @foreach ($meal_name as $meal_namess)
                                <?php
                                $current_month = HomeController::current_month($meal_namess['id'], $users->id);
                                $previous_month = HomeController::previous_month($meal_namess['id'], $users->id);
                                ?>
                                <tr>
                                    <td><center><b>{{$meal_namess['menu_name']}}</b></center></td>
                                <td><center>{{$current_month['count']}}</center></td>
                                <td><center>{{$current_month['amount']}}</center></td>
                                <td><center>{{$previous_month['count']}}</center></td>
                                <td><center>{{$previous_month['amount']}}</center></td>

                                </tr>
                                <?php
                                if (is_numeric($current_month['amount']) && is_numeric($previous_month['amount'])) {
                                    $current_month_total_amount += $current_month['amount'];
                                    $previous_month_total_amount += $previous_month['amount'];
                                }
                                ?>
                                @endforeach
                                <tr>
                                    <th><center>Total Amount</center></th>
                                <th colspan="2"><center>{{$current_month_total_amount}}</center></th>
                                <th colspan="2"><center>{{$previous_month_total_amount}}</center></th>

                                </tr>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <!-- jQuery UI -->
            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

            <script>
$(document).ready(function () {

    var GrnVendorCode = $('#GrnVendorCode');
    GrnVendorCode.autocomplete({
        minLength: 1,
        source: 'autocomplete',
        select: function (event, ui) {
            $('#GrnVendorCode').val(ui.item.value);
            $('#emplyee_id').val(ui.item.info);
        }
    });
});</script>                                            
                </script>                                            <script>
                function showTime() { var date = new Date(); var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var d=date.getDate();
                var m=date.getMonth()+1;
                 var y=date.getFullYear();
                var session = "AM"; if (h == 0) { h = 12; } if (h > 12) { h = h - 12; session = "PM"; } h = (h < 10) ? "0" + h : h; m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;
        var time =  d+"-"+m+"-"+y+" "+h + ":" + m + ":" + s + " " + session;<!--document.getElementById("MyClockDisplay").innerText = time;-->
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent =time;
        
        setTimeout(showTime                , 1000);

       }                

                showTime();

                setTimeout(function () {
                                                                                                                                                                   $(".alert-success").fadeOut("slow")
                                                                                                                                                               }, 5000);


                                                </script>
        <!-- /.content -->

        <!-- /.content-wrapper -->

        <!-- Footer -->
        {{-- @        include('layouts.footer') --}}

        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.3 -->
                         <!--            <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
                          
                                                              Bootstrap 3.3.2 JS 
                                  <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">
                  </script>
          
                  AdminLTE App 
<script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>-->


        <!-- Script -->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
                                                                                                                                                                Both of these plugins are recommended to enhance the
                                                                                                                                                                user experience. Slimscroll is required when using the
                                                                                                                                                                fixed layout. -->
</body>

</html>

@endsection
