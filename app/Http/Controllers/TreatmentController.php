<?php

namespace App\Http\Controllers;

use App\treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
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

    public function indexPatient()
    {
        $treatments = treatment::where('patient_id', Auth::user()->id)->get();
        return view('treatments.index',['treatments'=>$treatments]);
    }

    public function indexDoctor()
    {
        $treatments = DB::table('treatments')
            ->join('users','users.id',"=", 'treatments.doctor_id')
            ->select('users.id','treatments.*')
            ->where('users.id','=',Auth::user()->id)
            ->get();

        return view('treatments.indexDoctor', ['treatments'=>$treatments]);
    }
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
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, treatment $treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(treatment $treatment)
    {
        //
    }
}
