<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestResultController extends Controller
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
        dd($request);
        $request->validate([
            'test_result' => 'required',
            'temperature' => 'required',
            'blood_pressure' => 'required',
            'oxygen_levels' => 'required',
            'request_id' => '',
            'patient_id' => '',
            'nurse_id' => '',
            'nurse_id' => '',
        ]);

        $barcode = Helper::IDGenerator(new TestResult, 'barcode', 5, 'RST_');
        $test_result = $request->test_result;
        $temperature = $request->temperature;
        $blood_pressure = $request->blood_pressure;
        $oxygen_levels = $request->oxygen_levels;
        $request_id = $request->request_id;
        $patient_id = $request->patient_id;
        $nurse_id = $request->nurse_id;

        $results = new TestResult;
        $results->barcode = $barcode;
        $results->test_result = $test_result;
        $results->temperature = $temperature;
        $results->blood_pressure = $blood_pressure;
        $results->oxygen_levels = $oxygen_levels;
        $results->request_id = $request_id;
        $results->patient_id = $patient_id;
        $results->nurse_id = $nurse_id;

        $results -> save();

        $request->session()->flash('success', 'Patient details captured successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function show(TestResult $testResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function edit(TestResult $testResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestResult $testResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResult $testResult)
    {
        //
    }
}
