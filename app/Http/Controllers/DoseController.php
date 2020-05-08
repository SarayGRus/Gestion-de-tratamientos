<?php

namespace App\Http\Controllers;

use App\Dose;
use App\Medicine;
use App\Posology;
use Illuminate\Http\Request;

class DoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPatientDose($id)
    {
        $posology = Posology::find($id);
        $doses = Dose::where('posology_id','=',$posology->id);
        return view('doses/index',['doses'=>$doses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDose($id)
    {
        $posology = Posology::find($id);
        return view('doses/create',['posology'=>$posology]);


    }

    public function showDoses($id)
    {
        $posology = Posology::find($id);
        $doses = Dose::all()->where('posology_id','=',$posology->id);
        //$doses = Dose::all()->where('posology_id','=','9');
        //dd($doses);
        return view('doses/showDose',['doses'=>$doses]);
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
            'doseDate' => 'required|date',
            'posology_id' => 'required|exists:posologies,id',
        ]);


        $dose = new Dose($request->all());
        $dose->save();
        //dd($dose->posology_id);




        flash('Toma registrada correctamente');
        return redirect()->route('posologies.indexPatient',["id"=>$dose->posology_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function show(Dose $dose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function edit(Dose $dose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dose $dose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dose  $dose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dose $dose)
    {
        //
    }
}
