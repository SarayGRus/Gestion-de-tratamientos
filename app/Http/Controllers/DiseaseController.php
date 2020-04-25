<?php

namespace App\Http\Controllers;

use App\disease;
use App\specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Description;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = disease::where('specialty_id', Auth::user()->specialty_id)->get();
        return view('diseases.index',['diseases' => $diseases]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = specialty::where('id', Auth::user()->specialty_id)->pluck('name','id');
        return view('diseases/create',['specialty'=>$specialties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'specialty_id' => 'required|exists:specialties,id',
            'description'=>'required|max:255'
        ]);

        //TODO: crear validación propia para nuhsa
        $disease = new disease($request->all());
        $disease->save();

        flash('Enfermedad creada correctamente');

        return redirect()->route('diseases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(disease $disease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, disease $disease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(disease $disease)
    {
        //
    }
}