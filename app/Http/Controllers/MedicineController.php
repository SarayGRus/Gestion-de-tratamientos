<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines/index',['medicines'=>$medicines]);
    }

    public function indexPatientMedicine($id)
    {
        $medicines = Medicine::all()->where('id','=',$id);
        return view('medicines/indexPatient',['medicines'=>$medicines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicines/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|max:255',
            'composition' => 'required|max:255',
            'appearance' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        $medicine =  new Medicine($request->all());
        $medicine->save();
        flash('Medicamento creado correctamente');

        return redirect()->route('medicines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines/edit',['medicine'=>$medicine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required|max:255',
            'composition' => 'required|max:255',
            'appearance' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        $medicine =  Medicine::find($id);
        $medicine->fill($request->all());
        $medicine->save();
        flash('Medicamento modificado correctamente');

        return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine= Medicine::find($id);
        $medicine->delete();
        flash('Medicamento eliminado correctamente');

        return redirect()->route('medicines.index');
    }
}
