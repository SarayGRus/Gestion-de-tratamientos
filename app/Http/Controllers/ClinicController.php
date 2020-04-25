<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
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

    public function indexDoctor()
    {
        return view('clinics/index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinics.create');
    }

    public function assignDoctor(Request $request){

        Auth::user()->clinic_id = $request->get('clinic_id');
        Auth::user()->save();

        flash('Centro de salud registrado correctamente');

        return redirect()->route('myClinic');

    }

    public function showAssign()
    {

        $clinics = Clinic::all()->pluck('name','id');

        return view('clinics.assignClinic',['clinics'=>$clinics]);
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
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'opening' => 'required',
            'closing' => 'required'

        ]);
        $clinic = new Clinic($request->all());
        $clinic->save();

        flash('Centro de salud creado correctamente');

        return redirect()->route('myClinic');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $id)
    {
        $clinic = Clinic::find($id);

        return view('clinics/show',['clinic'=>$clinic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        //
    }
}
