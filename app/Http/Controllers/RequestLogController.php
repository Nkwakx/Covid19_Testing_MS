<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Suburb;
use App\Helpers\Helper;
use App\Models\TimeSlot;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Mail\ResponseMail;
use App\Models\RequestLog;
use App\Models\TestResult;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'temperature' => 'required|numeric',
            'blood_pressure' => 'required',
            'oxygen_levels' => 'required',
            'request_id' => '',
            'nurse_id' => '',
        ]);

        $barcode = Helper::IDGenerator(new TestResult, 'barcode', 5, 'RST_');
        $test_result = $request->test_result;
        $temperature = $request->temperature;
        $blood_pressure = $request->blood_pressure;
        $oxygen_levels = $request->oxygen_levels;
        $request_id = $request->request_id;
        $nurse_id = $request->nurse_id;
        //$patient_id = $request->patient_id;

        $results = new TestResult;
        $results->barcode = $barcode;
        $results->temperature = $temperature;
        $results->blood_pressure = $blood_pressure;
        $results->oxygen_levels = $oxygen_levels;
        $results->request_id = $request_id;
        $results->nurse_id = $nurse_id;
        //$results->patient_id = $patient_id;

        $results->save();

        $request->session()->flash('success', 'Patient details captured successfully');
        return redirect(route('indexes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestLog  $requestLog
     * @return \Illuminate\Http\Response
     */
    public function show(RequestLog $requestLog, $id)
    {
        $user_id = Auth::user()->id;
        $testR = RequestLog::find($id);

        return view(
            'nurse.testlog.create',
            [
                'log' => RequestLog::find($id),
                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name',)
                    ->get(),

                    'dependents' => Dependent::all(),
                    'users' => User::all(),

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
                    ->whereDate('log_date', Carbon::tomorrow())
                    ->select('request_logs.*')
                    ->orderBy('log_date', 'asc')
                    ->get(),

                'test_logsTomorrow' => RequestLog::where('nurse_id', $user_id)
                    ->join('users', 'request_logs.nurse_id', '=', 'users.id')
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestLog  $requestLog
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestLog $requestLog)
    {
        $testRequests = TestRequest::all();
        $mytime = Carbon::now();
        $upcomingAp = Carbon::tomorrow();


        return view('nurse.testlog.create', compact('requestLog', 'testRequests', 'mytime', 'upcomingAp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestLog  $requestLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = RequestLog::find($id);
        $testR->update($request->all());

        return view(
            'nurse.testlog.create',
            [
                'log' => RequestLog::find($id),
                // 'findDep' => Dependent::find($id),

                'favouriteSub' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.suburb_name',)
                    ->get(),

                'dependents' => Dependent::all(),
                'users' => User::all(),

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
                    ->whereDate('log_date', Carbon::tomorrow())
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestLog  $requestLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestLog $requestLog)
    {
        //
    }
}
