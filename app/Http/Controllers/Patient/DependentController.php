<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\TimeSlot;
use App\Models\Dependent;
use App\Mail\ResponseMail;
use App\Models\RequestLog;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'log_date' => 'required',
            'log_time' => 'required',
            'status' => 'required',
            'nurse_id' => 'required',
            'request_id' => 'required',
        ]);
        //dd($validateData);
        RequestLog::create($validateData);
        Mail::to('test@test.com')->send(new ResponseMail($validateData));

        $request->session()->flash('success', 'Test Request Confirmed');
        return redirect(route('admin.patient_request'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function show(Dependent $dependent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependent $dependent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = TestRequest::find($id);
        $testR->update($request->all());

        return view('request.assignNurse',
        [
            'request_log' => TestRequest::find($id),
            'timeSlots' => TimeSlot::all(),
            'requests' => TestRequest::all(),
            'nurses' => User::whereHas('roles', function ($query) {
                $query->where('name', 'Nurse');
            })->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependent $dependent)
    {
        //
    }
}
