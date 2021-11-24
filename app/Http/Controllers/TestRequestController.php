<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Suburb;
use App\Models\TimeSlot;
use App\Models\Favourite;
use App\Models\MainMember;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestRequestController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestRequest  $testRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TestRequest $testRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestRequest  $testRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;

        //dd($id);
        return view('request.edit',[
            'request_log' => TestRequest::find($id),
            'timeSlots' => TimeSlot::all(),
            'requests' => TestRequest::all(),

            'favouriteSub' => Favourite::where('user_id', $user_id)
            ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            ->select('suburbs.suburb_name', )
            ->get(),

            'staffs' => User::whereHas('roles', function ($query) {
                $query->where('name', 'Nurse');
            })->get(),

            'cities' => City::all(),
            'suburbs' => Suburb::all(),
            'favourites' => Favourite::all(),
            'name' => MainMember::where('main_member_id', $user_id)->pluck('name')->first(),
            'surname' => MainMember::where('main_member_id', $user_id)->pluck('surname')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestRequest  $testRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestRequest $testRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestRequest  $testRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestRequest $testRequest)
    {
        //dd($testRequest);
        $testRequest->delete();

        return redirect()->route('statuses')
            ->with('success', 'Request cancelled succesfully.');
    }
}
