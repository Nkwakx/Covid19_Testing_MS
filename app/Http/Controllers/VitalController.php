<?php

namespace App\Http\Controllers;

use App\Models\Vital;
use Illuminate\Http\Request;

class VitalController extends Controller
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
        $blood_pressure = $request->blood_pressure;
        $pulse = $request->pulse;
        $weight = $request->weight;
        $height = $request->height;
        $pain_score = $request->pain_score;
        $nurse_id = $request->nurse_id;
        $patient_id = $request->patient_id;

        for($i=0; $i < count($blood_pressure); $i++){

            $validateData = [
                'blood_pressure' => $blood_pressure[$i],
                'pulse' => $pulse[$i],
                'weight' => $weight[$i],
                'height' => $height[$i],
                'pain_score' => $pain_score[$i],
                'nurse_id' => $nurse_id[$i],
                'patient_id' => $patient_id[$i],
            ];
           
            DB::table('vitals')->insert($validateData);
        }
       

        $request->session()->flash('success', 'Vatils Save successfully!');
        return redirect(route('indexes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function show(Vital $vital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function edit(Vital $vital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vital $vital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vital $vital)
    {
        //
    }
}
