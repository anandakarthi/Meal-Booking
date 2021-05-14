<!DOCTYPE html>
{{-- @extends('layouts.app') --}}
<html>

<style>
    .clock {
        position: absolute;
        top: 25%;
        left: 60%;
        transform: translateX(-50%) translateY(-50%);
        color: red;
        font-size: 25px;
        font-family: Orbitron;
        /* letter-spacing: 3px; */



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

    img {
        border-radius: 50%;
    }

    body,
    html {
        overflow-x: hidden;
    }

</style>
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

<body style="background-color:#ecf0f5;">

    <div class="wrapper" class="table-wrapper-scroll-y my-custom-scrollbar">

        <!-- Main Header -->
        {{-- @include('layouts.header') --}}
        <!-- Sidebar -->

        {{-- @include('layouts.sidebar') --}}

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Meal Booking

            </h1><br>
            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
            <br>
            <ol class="breadcrumb">
                <li><a href="{{ route('logout') }}"><i></i> Logout</a></li>
                {{-- <li class="active">Logout</li> --}}
            </ol>
        </section>

        <!-- Main content -->

        <div class="col-md-4">

            <div class="box">
                <div class="box-body">
                    <div>
                        <center>
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:100px">
                        </center>
                    </div>
                    <br>


                    <div class="col-sm-12">
                        <b>
                            <center>
                                <p class="m-b-10 f-w-600">Emp Code
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->username }}
                                </p>
                                <p class="m-b-10 f-w-600">Name
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123547
                                </p>
                                <p class="m-b-10 f-w-600">Department
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123547
                                </p>
                                <p class="m-b-10 f-w-600">Section
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123547
                                </p>
                                <p class="m-b-10 f-w-600">Mobile No&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123547
                                </p>
                                <p class="m-b-10 f-w-600">Email id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123547
                                </p>
                            </center>
                        </b>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="box">

                <div class="box-body">

                    <p><b
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
                            class="btn btn-primary btn-sm" href="#">Book</a><b>&nbsp;&nbsp;&nbsp;Booking
                            Confirmation</b></p>
                    <p><b
                            style='padding:5px;background:red;color:#fff;display: center;text-align: center;justify-content: center;border-radius:5px;font-size: 15px;font-weight: bold;line-height: 1;'>
                            Dinner
                        </b>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm"
                            href="#">Book</a><b>&nbsp;&nbsp;&nbsp;Booking
                            Confirmation</b></p>



                </div>
            </div>
            <!-- /.col -->

        </div>
        <div class="col-md-4">

            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Meal</th>
                            <th>
                                <center>Current Month
                                    <table>


                                        <td>Count &nbsp;|&nbsp;</td>
                                        <td>Amount</td>

                                    </table>
                                </center>
                            </th>
                            <th>
                                <center>Previous Month
                                    <table>

                                        <td>Count &nbsp;|&nbsp;</td>
                                        <td>Amount</td>
                                    </table>
                                </center>
                            </th>

                        </tr>
                        <tr>
                            <td>Breakfast</td>

                            <td>
                                <center>
                                    <table>


                                        <td>5 &nbsp;|&nbsp;</td>
                                        <td>100</td>

                                    </table>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <table>


                                        <td>1 &nbsp;|&nbsp;</td>
                                        <td>20</td>

                                    </table>
                                </center>
                            </td>

                        </tr>
                        <tr>
                            <td>Lunch </td>

                            <td>
                                <center>
                                    <table>


                                        <td>5 &nbsp;|&nbsp;</td>
                                        <td>150</td>

                                    </table>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <table>


                                        <td>5 &nbsp;|&nbsp;</td>
                                        <td>50</td>

                                    </table>
                                </center>
                            </td>


                        </tr>
                        <tr>
                            <td>Dinner </td>
                            <td>
                                <center>
                                    <table>


                                        <td>6 &nbsp;|&nbsp;</td>
                                        <td>120</td>

                                    </table>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <table>


                                        <td>12 &nbsp;|&nbsp;</td>
                                        <td>600</td>

                                    </table>
                                </center>
                            </td>

                        </tr>
                        <tr>
                            <b>

                                <td colspan="1">
                                    <b>Total Amount</b>
                                </td>

                                <td>
                                    <center><b>50</b></center>

                                </td>
                                <td>
                                    <center><b>50</b></center>
                                </td>


                            </b>
                        </tr>
                    </table>
                    <br>


                </div>
            </div>
        </div>

        <!-- /.content -->

        <!-- /.content-wrapper -->

        <!-- Footer -->
        {{-- @include('layouts.footer') --}}

        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.3 -->
        <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">
        </script>

        <!-- AdminLTE App -->
        <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
        <script>
            function showTime() {
                var date = new Date();
                var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var session = "AM";

                if (h == 0) {
                    h = 12;
                }

                if (h > 12) {
                    h = h - 12;
                    session = "PM";
                }

                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;

                var time = h + ":" + m + ":" + s + " " + session;
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent = time;

                setTimeout(showTime, 1000);

            }

            showTime();

        </script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>

</html>
