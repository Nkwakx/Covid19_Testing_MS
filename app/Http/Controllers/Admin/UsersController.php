<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Nurse;
use App\Models\TimeSlot;
use App\Models\Favourite;
use App\Mail\ResponseMail;
use App\Models\MainMember;
use App\Models\RequestLog;
use App\Models\SuperAdmin;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Models\SecurityQuestions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.users.index', [
            'users' => User::all(),
            'chartData' => $data,

            'pendingRequests' => TestRequest::where('status', 'New')->count(),
            'count_acceptedR' => RequestLog::where('request_logs.status', 'Scheduled')->count(),
            'count_todayApt' => RequestLog::where('status', 'Scheduled')
                ->whereDate('log_date', today())->count(),

            'requests' => TestRequest::where('status', 'New')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.users.create',
            [
                'roles' => Role::all(),
                'securityQuestions' => SecurityQuestions::all(),
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:6|max:16',
        ]);

        $user = User::create($validatedData);
        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You have added the user');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        return view(
            'admin.users.edit',
            [
                'roles' => Role::all(),
                'user' => User::find($id),

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
        $user = User::find($id);

        if (!$user) {
            $request->session()->flash('error', 'You cannot edit this user');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'You have updated the user');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'You have deleted the user');
        return redirect(route('admin.users.index'));
    }

    public function patients()
    {
        $user_id = Auth::user()->id;
        return view(
            'admin.users.patient',
            [
                'patients' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Patient');
                })->get(),
            ]
        );
    }
    public function nurses()
    {
        $user_id = Auth::user()->id;
        return view(
            'admin.users.nurse',
            [
                'nurses' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),
            ]
        );
    }
    public function allusers()
    {
        $user_id = Auth::user()->id;
        return view(
            'admin.users.allusers',
            [
                'users' => User::all(),
            ]
        );
    }
    public function nurseSuburb()
    {
        $user_id = Auth::user()->id;
        $name = SuperAdmin::where('super_admin_id', $user_id)->pluck('name')->first();
        $surname = SuperAdmin::where('super_admin_id', $user_id)->pluck('surname')->first();

        $fav_suburbs = DB::table('favourites')
            ->join('users', 'users.id', '=', 'favourites.nurse_id')
            ->join('suburbs', 'suburbs.id', '=', 'favourites.suburb_id')
            ->select('favourites.*', 'users.name', 'users.surname', 'suburbs.suburb_name')
            ->get();

        return view('admin.users.favSuburb', compact('fav_suburbs', 'surname', 'name'));
    }
    public function patientRequest()
    {
        $user_id = Auth::user()->id;
        return view(
            'admin.users.patientRequest',
            [
                'timeSlots' => TimeSlot::all(),
                'requests' => TestRequest::where('status', 'New')->paginate(8),
                'staffs' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),

                'nurses' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),
            ]
        );
    }
    public function nurseSchedule()
    {
        $user_id = Auth::user()->id;
        $requesLogs = DB::table('request_logs')
            ->where('request_logs.status', 'Performed')
            ->join('users', 'users.id', '=', 'request_logs.nurse_id')
            ->join('test_requests', 'request_logs.request_id', '=', 'test_requests.id')
            ->select('request_logs.*', 'users.name', 'users.surname', 'test_requests.addressLine1', 'test_requests.addressLine2')
            ->get();
        return view('admin.users.nurseSchedule', compact('requesLogs'));
    }

    public function records(Request $request)
    {
        $request->validate([
            'fromDate' => 'required',
            'toDate' => 'required',
            'other' => 'required'
        ]);

        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');
        $other    = $request->input('other');

        $requesLogs  = DB::table('request_logs')
            ->join('users', 'users.id', '=', 'request_logs.nurse_id')
            ->join('test_requests', 'request_logs.request_id', '=', 'test_requests.id')
            ->where('request_logs.status', 'Performed')
            ->where('log_date', '>=', $fromDate)
            ->where('log_date', '<=', $toDate)
            ->where('users.name', 'LIKE', '%' . $other . '%')
            ->orWhere('users.surname', 'LIKE', '%' . $other . '%')
            ->orWhere('request_logs.status', 'LIKE', '%' . $other . '%')
            ->select('request_logs.*', 'users.name', 'users.surname', 'test_requests.addressLine1', 'test_requests.addressLine2')
            ->get();

        return view('admin.users.nurseSchedule', compact('requesLogs'));
    }

    public function AcceptRequest(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = TestRequest::find($id);
        $testR->update($request->all());

        return view('nurse.testlog.assignNurse', [
            'request_log' => TestRequest::find($id),
            'timeSlots' => TimeSlot::all(),
            'requests' => TestRequest::all(),
            'nurses' => User::whereHas('roles', function ($query) {
                $query->where('name', 'Nurse');
            })->get(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignNurse(Request $request)
    {
        $validateData = $request->validate([
            'log_date' => 'required',
            'log_time' => 'required',
            'status' => 'required',
            'nurse_id' => 'required',
            'request_id' => 'required',
        ]);

        RequestLog::create($validateData);
        $data = ['scheduled' => $request->input('log_date') . ' ' . $request->input('log_time')];
        Mail::to($request->email)->send(new ResponseMail($data));


        $request->session()->flash('success', 'Test Request Assigned Successfully');
        return redirect(route('admin.patient_request'));
    }
}
