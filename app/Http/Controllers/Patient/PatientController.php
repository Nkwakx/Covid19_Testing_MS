<?php

namespace App\Http\Controllers\Patient;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Suburb;
use App\Models\Payment;
use App\Models\Dependent;
use App\Models\MainMember;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Models\MedicalAidPlan;
use App\Models\MedicalAidScheme;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{

    public function user_profile()
    {
        $user_id = Auth::user()->id;

        return view(
            'user.user_profile',
            [
                'cities' => City::all(),
                'suburbs' => Suburb::all()->orderBy('suburb_name'),
                'pricePlan' => MedicalAidPlan::all()->orderBy('name'),
                'medAidSchemes' => MedicalAidScheme::all()->orderBy('name'),
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),

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
                'user' => User::find(Auth::user()->id)
            ]
        );
    }

    public function payment()
    {
        $user_id = Auth::user()->id;
        return view(
            'patient.payment',
            [
                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'pricePlan' => MedicalAidPlan::all(),
                'medAidSchemes' => MedicalAidScheme::all(),
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),
            ]
        );
    }
    public function status()
    {
        $user_id = Auth::user()->id;
        return view(
            'patient.status',
            [
                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                'status_request' => TestRequest::where('Requestor_id', $user_id)->get(),
                'pricePlan' => MedicalAidPlan::all(),
            ]
        );
    }
    public function appointment()
    {
        $user_id = Auth::user()->id;
        return view(
            'patient.appointment',
            [
                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                'pricePlan' => MedicalAidPlan::all(),

                'appointments' => TestRequest::where('requestor_id', $user_id)
                    ->join('users', 'test_request.requestor_id', '=', 'users.id')
                    ->join('request_logs', 'test_requests.request_id', '=', 'request_logs.id')
                    ->join('request_logs', 'users.nurse_id', '=', 'request_logs.id')
                    ->select('users.*', 'request_logs.*')
                    ->get(),
            ]
        );
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        return view(
            'patient.index',
            [
                'pricePlan' => MedicalAidPlan::all(),
                'medAidSchemes' => MedicalAidScheme::all(),
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                'count_dependents' => Dependent::where('main_member_id', $user_id)->count(),
                'count_request' => TestRequest::where('Requestor_id', $user_id)->count(),
                'cities' => City::all(),
                'suburbs' => Suburb::all(),

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
                'user' => User::find(Auth::user()->id)
            ]
        );
    }

    public function addDependent()
    {
        $user_id = Auth::user()->id;
        return view('patient.addDependent');
    }

    public function makeRequest(Request $request)
    {
        $user_id = Auth::user()->id;
        $phone = MainMember::where('main_member_id', $user_id)->pluck('phone')->first();
        if ($phone == '') {
            $request->session()->flash('error', 'Please complete/update your profile before making test request');
            return redirect(route('index'));
        } else {
            return view(
                'patient.makeRequest',
                [
                    'dependS' => Dependent::where('main_member_id', $user_id)
                        ->join('suburbs', 'dependents.suburb_id', '=', 'suburbs.id')
                        ->select('suburbs.suburb_name', 'dependents.name', 'dependents.surname', 'dependents.addressLine1', 'dependents.addressLine2')
                        ->get(),

                    'dependents' => Dependent::where('main_member_id', $user_id)->get(),
                    'cities' => City::all(),
                    'suburbs' => Suburb::all(),

                    'name' => MainMember::where('main_member_id', $user_id)->pluck('name')->first(),
                    'surname' => MainMember::where('main_member_id', $user_id)->pluck('surname')->first(),
                    'addressLine1' => MainMember::where('main_member_id', $user_id)->pluck('addressLine1')->first(),
                    'addressLine2' => MainMember::where('main_member_id', $user_id)->pluck('addressLine2')->first(),
                ]
            );
        }
    }
    public function testRequest(Request $request)
    {
        $request->validate([
            'requestor_id'      => 'required',
            'suburb_id'      => 'required',
            'addressLine1'      => 'required',
        ]);

        foreach ($request->input('subjectTest') as $subjectTestId) {
            DB::table('test_requests')->InsertGetId([

                'addressLine1'      => request('addressLine1'),
                'addressLine2'      => request('addressLine2'),
                'suburb_id'         => request('suburb_id'),
                'requestor_id'      => request('requestor_id'),
                'number_of_patient' => request('number_of_patient'),
                'status'            => request('status'),
                'test_Subject_Id'   => $subjectTestId,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }

        // $testRequest->dependents()->sync($request->dependents);

        $request->session()->flash('success', 'Your test request was requested successfully');
        return redirect(route('index'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'idNo' => '',
            'phone' => 'required|max:255',
            'email_address' => 'email|max:255',
            'addressLine1' => '',
            'addressLine2' => '',
            'suburb_id' => 'string|max:6',
            'gender' => 'required|max:255',
            'same_address' => 'string|max:255',
            'med_aid_YN' => 'required',
            'med_aid_plan_id' => 'string|max:6',
            'main_member_id' => 'string|max:6',
        ]);

        Dependent::create($validateData);
        $request->session()->flash('success', 'You have added new member or beneficial on you');
        return redirect(route('index'));
    }
}
