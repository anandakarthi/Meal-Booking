<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\DateTime;
use DateTime;
use App\MealName;
use App\MealConfig;
use App\MealBooking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function logout() {
//        echo "test";exit;
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
//        exit;
        $id = auth()->user()->id;
        $get_users_details = User::where([
                    'id' => $id
                ])->first();
        $meal_name = MealName::where([
                    'plant_id' => auth()->user()->unit,
                ])->get();
        ;
        return view('home', ['meal_name' => $meal_name, 'users' => $get_users_details]);
    }

    public function meal_booking($id, $atuh_id) {
        $meal_id = $id;
        $users = User::where([
                    'id' => $atuh_id
                ])->first();
        $plant_id = $users->unit;
//echo $meal_id;exit;
        if (!empty($id) && !empty($plant_id)) {
            $meal_configs = MealConfig::where([
                        'plant_id' => $plant_id,
                        'meal_id' => $meal_id,
                    ])->first();
            $meal_config_id = $meal_configs->id;
            if (isset($meal_config_id) && !empty($meal_config_id)) {
                $meal_config = new MealBooking;
                $meal_config->employee_id = $users->id;
                $meal_config->meal_config_id = $meal_config_id;
                if ($meal_configs['previous_day'] == '1') {
                    $stop_date = date('Y-m-d');
                    $responce = date('Y-m-d', strtotime($stop_date . ' +1 day'));
                } else {
                    $responce = date('Y-m-d');
                }
                $meal_config->meal_booking_date = $responce;
                $meal_config->created = date('Y-m-d');
                $meal_config->meal_id = $meal_id;
//                echo"<pre>";print_r($meal_config);exit;
                $meal_config->save();
                return redirect('home')->with('message', 'Meal has been Booked');
            }
        }
    }

    public function meal_booking_delete($id, $atuh_id) {
        $meal_id = $id;
        $users = User::where([
                    'id' => $atuh_id
                ])->first();
        $plant_id = $users->unit;
//        $plant_id = $users->unit;
        if (!empty($id) && !empty($plant_id)) {
            $meal_config = MealConfig::where([
                        'plant_id' => $plant_id,
                        'meal_id' => $meal_id,
                    ])->first();
            $meal_config_id = $meal_config->id;
            if (isset($meal_config_id) && !empty($meal_config_id)) {
                MealBooking::where([
                    'meal_config_id' => $meal_config_id,
                    'employee_id' => $users->id,
                    'created' => date("Y-m-d"),
                    'meal_id' => $meal_id
                ])->delete();
                return redirect('home')->with('message', 'Meal has been Cancelled');
            }
        }
    }

    public static function check_meal_bookig_status($id, $emp_id) {
        $status = 1;
//        $time_in_24_hour_format  = date("H:i", strtotime("1:30 PM"));
//        echo $time_in_24_hour_format;exit;
        $meal_id = $id;
        $meal_booking_status = MealBooking::where([
                    'employee_id' => $emp_id,
                    'created' => date("Y-m-d"),
                    'meal_id' => $meal_id
                ])->first();
//        echo"<pre>";print_r($meal_booking_status->id);exit;
        if (isset($meal_booking_status['id']) && !empty($meal_booking_status['id'])) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }

    public static function checkmsg_time($id, $unit) {
        $meal_id = $id;
        $meal_config = MealConfig::where([
                    'plant_id' => $unit,
                    'meal_id' => $meal_id
                ])->first();
//        echo ltrim(date("h:i A"),0);exit;

        $from_time = date("H:i", strtotime($meal_config['to_time']));
        $to_time = date("H:i", strtotime($meal_config['availing_time']));
        $current_time = date("H:i", strtotime(ltrim(date("h:i A"), 0)));
        if (($to_time >= $current_time)) {

            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    public static function checktimeing_meal($id, $unit) {
        $meal_id = $id;
        $meal_config = MealConfig::where([
                    'plant_id' => $unit,
                    'meal_id' => $meal_id
                ])->first();
//        echo ltrim(date("h:i A"),0);exit;

        $from_time = date("H:i", strtotime($meal_config['from_time']));
        $to_time = date("H:i", strtotime($meal_config['to_time']));
        $current_time = date("H:i", strtotime(ltrim(date("h:i A"), 0)));
//        echo"<pre>";print_r($from_time);
//        echo"<pre>";print_r($to_time);
//        echo"<pre>";print_r($current_time);exit;
        if (($from_time <= $current_time) && ($to_time >= $current_time)) {

            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    public static function print_date($id, $unit) {
        $meal_id = $id;
        $meal_config = MealConfig::where([
                    'plant_id' => $unit,
                    'meal_id' => $meal_id
                ])->first();
//        echo ltrim(date("h:i A"),0);exit;

        if ($meal_config['previous_day'] == '1') {
            $stop_date = date('Y-m-d');
            $responce = '(' . date('d-m-Y', strtotime($stop_date . ' +1 day')) . ')';
        } else {
            $responce = '(' . date('d-m-Y') . ')';
        }

        return $responce;
    }

    public function autocomplete(Request $request) {
        $search = $request['term'];
        $users = DB::table('users')
                ->orWhere("emp_code", "LIKE", "%{$search}%")
                ->orWhere("firstname", "LIKE", "%{$search}%")
                ->orWhere("lastname", "LIKE", "%{$search}%")
                ->orWhere("phone", "LIKE", "%{$search}%")
                ->get();

        $i = 1;
        $response[0]['value'] = '';
        $response[0]['info'] = '';
        $response[0]['label'] = "Employee  Code / Name / Phone Number";
        foreach ($users as $userss) {
//            echo"<pre>";print_r($userss->id);
            $response[$i]['value'] = $userss->emp_code;
            $response[$i]['info'] = $userss->id;
            $response[$i]['label'] = "" . $userss->emp_code . ' / ' . $userss->firstname . ' ' . $userss->lastname . ' / ' . $userss->phone . "";
            $i++;
        }
        echo json_encode($response);
        exit;
    }

    public function empolyee_details(Request $request) {
        $id = $request['emplyee_id'];
        $get_users_details = User::where([
                    'id' => $id
                ])->first();
        $meal_name = MealName::where([
                    'plant_id' => $get_users_details['unit'],
                ])->get();
//        echo"<pre>";print_r($get_users_details);exit;
        return view('new_home', ['meal_name' => $meal_name, 'users' => $get_users_details]);
    }

    public static function current_month($meal_id, $emp_id) {
        $from = date("Y-m-01");
        $to = date("Y-m-d");
        $mealbooking = MealBooking::whereBetween('meal_booking_date', [$from, $to])
                ->where('meal_id', $meal_id)
                ->where('employee_id', $emp_id)
                ->get();

        $current_month_count = count($mealbooking);

        $id = $emp_id;
        $get_users_details = User::where([
                    'id' => $id
                ])->first();
        $mealconfig = MealConfig::where('plant_id', $get_users_details['unit'])
                ->where('meal_id', '<=', $meal_id)
                ->first();

        if ($get_users_details['staff_status'] == "staff") {
            $feild = "staff_cost";
        } else {
            $feild = "workforce_cost";
        }
        $reponce = array(
            'count' => $current_month_count,
            'amount' => $current_month_count * $mealconfig[$feild]
        );
        return $reponce;
    }

    public static function previous_month($meal_id, $emp_id) {
        $month_ini = new DateTime("first day of last month");
        $month_end = new DateTime("last day of last month");
        $from = $month_ini->format('Y-m-d');
        $to = $month_end->format('Y-m-d');
        $mealbooking = MealBooking::whereBetween('meal_booking_date', [$from, $to])
                ->where('meal_id', $meal_id)
                ->where('employee_id', $emp_id)
                ->get();

        $current_month_count = count($mealbooking);

        $id = $emp_id;
        $get_users_details = User::where([
                    'id' => $id
                ])->first();
        $mealconfig = MealConfig::where('plant_id', $get_users_details['unit'])
                ->where('meal_id', '<=', $meal_id)
                ->first();

        if ($get_users_details['staff_status'] == "staff") {
            $feild = "staff_cost";
        } else {
            $feild = "workforce_cost";
        }
        $reponce = array(
            'count' => $current_month_count,
            'amount' => $current_month_count * $mealconfig[$feild]
        );
        return $reponce;
    }

//        
}
