<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Suburb;
use App\Models\TimeSlot;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Models\MainMember;
use App\Models\RequestLog;
use App\Models\TestResult;
use App\Models\TestRequest;
use App\Models\MedicalAidPlan;
use App\Models\MedicalAidScheme;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $countReq = DB::select(DB::raw("select count(Requestor_id) as requestor, test_requests.status from test_requests
        LEFT JOIN users ON users.id = test_requests.Requestor_id GROUP BY test_requests.status"));
        $data = "";

        if (is_array($countReq) || is_object($countReq)) {

            foreach ($countReq as $val) {
                $data .= "['" . $val->status . "',  " . $val->requestor . "],";
            }
        }
        $id = '';

        if (Gate::allows('is-admin')) {
            return view(
                'admin.users.index',
                [
                    'users' => User::all(),
                    'pendingRequests' => TestRequest::where('status', 'New')->count(),
                    'count_acceptedR' => RequestLog::where('request_logs.status', 'Scheduled')->count(),
                    'count_todayApt' => RequestLog::where('status', 'Scheduled')
                        ->whereDate('log_date', today())->count(),

                    'requests' => TestRequest::where('status', 'New')->paginate(8),

                    'chartData' => $data,

                    'test_captured' => TestResult::all()->count()
                ]
            );
        } else if (Gate::allows('is-nurse')) {

            // $favouriteSub = Favourite::where('user_id', $user_id)
            // ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            // ->join('test_requests', 'test_requests.id', '=', 'suburbs.id')
            // ->select('test_requests.*')
            // ->get();
            // dd($favouriteSub);

            return view(
                'nurse.index',
                [
                    'favouriteSub' => Favourite::where('nurse_id', $user_id)
                        ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                        ->select('suburbs.suburb_name',)
                        ->get(),

                    'dependS' => Dependent::where('main_member_id', $user_id)
                        ->join('suburbs', 'dependents.suburb_id', '=', 'suburbs.id')
                        ->select('suburbs.suburb_name', 'dependents.name', 'dependents.surname', 'dependents.addressLine1', 'dependents.addressLine2')
                        ->get(),

                    'staffs' => User::whereHas('roles', function ($query) {
                        $query->where('name', 'Nurse');
                    })->get(),

                    'pendingRequests' => TestRequest::where('test_requests.status', 'New')->count(),
                    'count_acceptedR' => RequestLog::where('nurse_id', $user_id)
                        ->where('request_logs.status', 'Scheduled')->count(),

                    'count_todayApt' => RequestLog::where('nurse_id', $user_id)
                        ->where('request_logs.status', 'Scheduled')
                        ->whereDate('log_date', today())->count(),

                    'test_logs' => RequestLog::where('nurse_id', $user_id)
                        ->where('request_logs.status', 'Scheduled')
                        ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                        ->select('request_logs.*')
                        ->get(),

                    'cities' => City::all(),
                    'suburbs' => Suburb::all(),
                    'timeSlots' => TimeSlot::all(),
                    'favourites' => Favourite::all(),
                    'requests' => TestRequest::where('test_requests.status', 'New')->paginate(6),
                    'request_log' => TestRequest::find($id),

                    'totalKit' => RequestLog::where('request_logs.nurse_id', $user_id)
                        ->where('request_logs.status', 'Scheduled')
                        ->whereDate('log_date', today())
                        ->join('test_requests', 'request_logs.request_id', '=', 'test_requests.id')
                        ->sum('number_of_patient'),

                    'test_logsTodays' => RequestLog::where('nurse_id', $user_id)
                        ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                        ->where('request_logs.status', 'Scheduled')
                        ->whereDate('log_date', today())
                        ->select('request_logs.*')
                        ->orderBy('log_date', 'asc')
                        ->get(),

                    'test_logsTomorrow' => RequestLog::where('nurse_id', $user_id)
                        ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                        ->where('request_logs.status', 'Scheduled')
                        ->whereDate('log_date', Carbon::tomorrow())
                        ->select('request_logs.*')
                        ->orderBy('log_date', 'asc')
                        ->get(),

                        'mytime' => Carbon::now(),
                        'upcomingAp' => Carbon::tomorrow()

                ]
            );
        } else if (Gate::allows('is-labUser')) {

            return view('lab.index');
        } else if (Gate::allows('is-patient')) {

            return view(
                'patient.index',
                [
                    'suburbs' => Suburb::all(),
                    'pricePlan' => MedicalAidPlan::all(),
                    'medAidSchemes' => MedicalAidScheme::all(),
                    'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                    'count_dependents' => Dependent::where('main_member_id', $user_id)->count(),
                    'count_request' => TestRequest::where('Requestor_id', $user_id)->count(),

                    'name' => MainMember::where('main_member_id', $user_id)->pluck('name')->first(),
                    'surname' => MainMember::where('main_member_id', $user_id)->pluck('surname')->first(),
                    'gender' => MainMember::where('main_member_id', $user_id)->pluck('gender')->first(),
                    'addressLine1' => MainMember::where('main_member_id', $user_id)->pluck('addressLine1')->first(),
                    'addressLine2' => MainMember::where('main_member_id', $user_id)->pluck('addressLine2')->first(),
                    'phone' => MainMember::where('main_member_id', $user_id)->pluck('phone')->first(),
                    'med_aid_number' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_number')->first(),
                    'med_aid_YN' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_YN')->first(),
                    'med_aid_plan_id' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_plan_id')->first(),
                    'email' => MainMember::where('main_member_id', $user_id)->pluck('email')->first(),
                    'idNo' => MainMember::where('main_member_id', $user_id)->pluck('idNo')->first(),

                    'user' => User::find(Auth::user()->id),

                    'suburb_name' => MainMember::where('main_member_id', $user_id)
                    ->join('suburbs', 'main_members.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name')->pluck('suburb_name')->first(),

                    'medical_plan' => MainMember::where('main_member_id', $user_id)
                    ->join('medical_aid_plans', 'main_members.med_aid_plan_id', '=', 'medical_aid_plans.id')
                    ->select('medical_aid_plans.name')->pluck('name')->first(),

                    'medical_scheme' => MainMember::where('main_member_id', $user_id)
                    ->join('medical_aid_plans', 'main_members.med_aid_plan_id', '=', 'medical_aid_plans.id')
                    ->join('medical_aid_schemes', 'medical_aid_plans.medical_aid_scheme_id', '=', 'medical_aid_plans.id')
                    ->select('medical_aid_schemes.name')
                    ->pluck('name')->first(),
                ]
            );
        } else {

            return view(
                'patient.index',
                [
                    'cities' => City::all(),
                    'suburbs' => Suburb::all(),
                    'pricePlan' => MedicalAidPlan::all(),
                    'medAidSchemes' => MedicalAidScheme::all(),
                    'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                    'count_dependents' => Dependent::where('main_member_id', $user_id)->count(),
                    'count_request' => TestRequest::where('Requestor_id', $user_id)->count(),

                    'name' => MainMember::where('main_member_id', $user_id)->pluck('name')->first(),
                    'surname' => MainMember::where('main_member_id', $user_id)->pluck('surname')->first(),
                    'gender' => MainMember::where('main_member_id', $user_id)->pluck('gender')->first(),
                    'addressLine1' => MainMember::where('main_member_id', $user_id)->pluck('addressLine1')->first(),
                    'addressLine2' => MainMember::where('main_member_id', $user_id)->pluck('addressLine2')->first(),
                    'phone' => MainMember::where('main_member_id', $user_id)->pluck('phone')->first(),
                    'med_aid_number' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_number')->first(),
                    'med_aid_YN' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_YN')->first(),
                    'med_aid_plan_id' => MainMember::where('main_member_id', $user_id)->pluck('med_aid_plan_id')->first(),
                    'email' => MainMember::where('main_member_id', $user_id)->pluck('email')->first(),
                    'idNo' => MainMember::where('main_member_id', $user_id)->pluck('idNo')->first()
                ]
            );
        }
    }
    public function service()
    {
        return view('home.services');
    }
    public function about()
    {
        return view('home.about-us');
    }
    public function contact()
    {
        return view('home.contact-us');
    }
    public function edit($id)
    {
        dd($id);
        return view('request.edit', [
            'request_log' => TestRequest::find($id),
        ]);
    }
}
