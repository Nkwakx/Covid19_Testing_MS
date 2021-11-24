<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Nurse;
use App\Models\Suburb;
use App\Models\TimeSlot;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Mail\ResponseMail;
use App\Models\RequestLog;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $id = '';
        return view(
            'nurse.index',
            [
                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name')
                    ->get(),

                'dependS' => Dependent::where('main_member_id', $user_id)
                    ->join('suburbs', 'dependents.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name', 'dependents.name', 'dependents.surname', 'dependents.addressLine1', 'dependents.addressLine2')
                    ->get(),

                'staffs' => User::whereHas('roles', function ($query) {
                    $query->where('roles.name', 'Nurse')
                        ->join('nurses', 'users.id', '=', 'nurses.nurse_id')
                        ->select('nurses.name');
                })->get(),

                'pendingRequests' => TestRequest::where('status', 'New')->count(),

                'count_acceptedR' => RequestLog::where('nurse_id', $user_id)
                    ->where('status', 'Scheduled')->count(),

                'count_todayApt' => RequestLog::where('nurse_id', $user_id)
                    ->where('status', 'Scheduled')
                    ->whereDate('log_date', today())->count(),

                'test_logs' => RequestLog::where('nurse_id', $user_id)
                    ->where('request_logs.status', 'Scheduled')
                    ->select('request_logs.*')
                    ->get(),

                'test_logsTodays' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', today())
                    ->select('request_logs.*')
                    ->orderBy('log_date', 'DESC')
                    ->get(),

                'test_logsTomorrow' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', Carbon::tomorrow())
                    ->select('request_logs.*')
                    ->orderBy('log_date', 'asc')
                    ->get(),

                'totalKit' => RequestLog::where('request_logs.nurse_id', $user_id)
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', today())
                    ->join('test_requests', 'request_logs.request_id', '=', 'test_requests.id')
                    ->sum('number_of_patient'),

                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'favourites' => Favourite::all(),
                'requests' => TestRequest::where('status', 'New')->paginate(6),
                'request_log' => TestRequest::find($id),

                'mytime' => Carbon::now(),
                'upcomingAp' => Carbon::tomorrow()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        return view(
            'nurse.nurses.create',
            [
                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name',)
                    ->get(),

                'dependents' => Dependent::all(),

                'staffs' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),

                'test_logs' => RequestLog::where('request_logs.nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->join('test_requests', 'request_logs.request_id', '=', 'test_requests.id')
                    ->join('dependents', 'test_requests.test_Subject_Id', '=', 'dependents.id')
                    ->select('request_logs.*', 'dependents.name', 'dependents.surname')
                    ->get(),

                'suburbs' => Suburb::all(),
                'favourites' => Favourite::all(),

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
                    ->orderBy('log_time')
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'log_date' => ['required', 'after_or_equal:' . now()->format('d-m-Y'), 'before_or_equal:tomorrow'],
            'log_time' => 'required',
            'status' => 'required',
            'nurse_id' => 'required',
            'request_id' => 'required',
        ]);

        RequestLog::create($validateData);
        $data = ['scheduled' => $request->input('log_date') . ' ' . $request->input('log_time')];
        Mail::to($request->email)->send(new ResponseMail($data));

        $request->session()->flash('success', 'Test Request Confirmed');
        return redirect(route('indexes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'roles']));

        //$request->session()->flash('success', 'Your profile was updated successfully!');

        return redirect(route('nurse.nurses.edit', $user));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        return view(
            'request.edit',
            [
                'request_log' => TestRequest::find($id),
                'timeSlots' => TimeSlot::all(),
                'requests' => TestRequest::all(),

                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name',)
                    ->get(),

                'staffs' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),

                'test_logsTodays' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', today())
                    ->select('request_logs.*')
                    ->orderBy('log_time')
                    ->get(),

                'test_logsTomorrow' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', Carbon::tomorrow())
                    ->select('request_logs.*')
                    ->orderBy('log_date', 'asc')
                    ->get(),

                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'favourites' => Favourite::all(),

                'mytime' => Carbon::now(),
                'upcomingAp' => Carbon::tomorrow()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = TestRequest::find($id);
        $testR->update($request->all());

        return view(
            'request.edit',
            [
                'request_log' => TestRequest::find($id),
                'timeSlots' => TimeSlot::all(),
                'requests' => TestRequest::all(),

                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name',)
                    ->get(),

                'staffs' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),

                'test_logsTodays' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', today())
                    ->select('request_logs.*')
                    ->orderBy('log_time')
                    ->get(),

                'test_logsTomorrow' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
                    ->where('request_logs.status', 'Scheduled')
                    ->whereDate('log_date', Carbon::tomorrow())
                    ->select('request_logs.*')
                    ->orderBy('log_date', 'asc')
                    ->get(),

                'cities' => City::all(),
                'suburbs' => Suburb::all(),
                'favourites' => Favourite::all(),
                'name' => Nurse::where('nurse_id', $user_id)->pluck('name')->first(),
                'surname' => Nurse::where('nurse_id', $user_id)->pluck('surname')->first(),

                'mytime' => Carbon::now(),
                'upcomingAp' => Carbon::tomorrow()

            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function user_profile()
    // {
    //     $user_id = Auth::user()->id;
    //     return view(
    //         'admin.users.user_profile',
    //         [
    //             'cities' => City::all(),
    //             'suburbs' => Suburb::all(),
    //             'pricePlan' => MedicalAidPlan::all(),
    //             'medAidSchemes' => MedicalAidScheme::all(),
    //             'dependents' => Dependent::where('main_member_id', $user_id)->get(),

    //             'favouriteSub' => Favourite::where('nurse_id', $user_id)
    //                 ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
    //                 ->select('suburbs.suburb_name',)
    //                 ->get(),

    //             'staffs' => User::whereHas('roles', function ($query) {
    //                 $query->where('name', 'Nurse');
    //             })->get(),

    //             'test_logs' => RequestLog::where('nurse_id', $user_id)
    //                 ->join('users', 'request_logs.nurse_id', '=', 'users.id')
    //                 ->select('request_logs.*')
    //                 ->groupBy('log_date')
    //                 ->get(),

    //                 'test_logsTodays' => RequestLog::where('nurse_id', $user_id)
    //                 ->join('users', 'request_logs.nurse_id', '=', 'users.id')
    //                 ->whereDate('log_date', today())
    //                 ->select('request_logs.*')
    //                 ->orderBy('log_time')
    //                 ->get(),

    //             'name'              => Nurse::where('nurse_id', $user_id)->pluck('name')->first(),
    //             'surname'           => Nurse::where('nurse_id', $user_id)->pluck('surname')->first(),
    //             'gender'            => Nurse::where('nurse_id', $user_id)->pluck('gender')->first(),
    //             'addressLine1'      => Nurse::where('nurse_id', $user_id)->pluck('addressLine1')->first(),
    //             'addressLine2'      => Nurse::where('nurse_id', $user_id)->pluck('addressLine2')->first(),
    //             'phone'             => Nurse::where('nurse_id', $user_id)->pluck('phone')->first(),
    //             'email'             => Nurse::where('nurse_id', $user_id)->pluck('email')->first(),
    //             'idNo'              => Nurse::where('nurse_id', $user_id)->pluck('idNo')->first(),
    //         ]
    //     );
    // }
}
