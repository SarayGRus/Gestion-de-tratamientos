<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Posology;
use App\treatment;
use Cassandra\Date;
use Illuminate\Http\Request;

class PosologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $posologies = Posology::all()->where('treatment_id')->get();

        return view('posologies/index',['posologies'=>$posologies]);

    }*/

    public function indexPatient($id){


        $now = new \DateTime();
        $treatment = treatment::find($id);
        $posologies = Posology::all()->where('treatment_id','=',$id);
        return view('posologies/indexPatient',['posologies'=>$posologies,'treatment'=>$treatment,'now'=>$now]);
    }

    public function findByTreatment($id)
    {
        $treatment = treatment::find($id);
        $posologies = Posology::all()->where('treatment_id','=',$id);
        return view('posologies/index',['posologies'=>$posologies,'treatment'=>$treatment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTreatment($id)
    {
        $treatment = treatment::find($id);
        $medicines = Medicine::all()->pluck('name','id');
        return view('posologies/create',['treatment'=> $treatment, 'medicines'=>$medicines]);

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

            'description'=>'required|max:255',
            'units' => 'required|max:255',
            'times' => 'required|max:255',
            'period' => 'required|max:255',
            'treatment_id' => 'required|exists:treatments,id',
            'medicine_id' => 'required|exists:medicines,id',


        ]);

        $posology = new Posology($request->all());

        $posology->save();
        flash('Medicación creada correctamente');
        return redirect()-> route('posologies.findByTreatment',['id'=>$posology->treatment_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posology  $posology
     * @return \Illuminate\Http\Response
     */
    public function show(Posology $posology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posology  $posology
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posology = Posology::find($id);
        $medicines = Medicine::all()->pluck('code','id');
        return view('posologies/edit',['posology'=> $posology, 'medicines'=>$medicines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posology  $posology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'treatment_id' => 'required|exists:treatments,id',
            'medicine_id' => 'required|exists:medicines,id',
            'units' => 'required|max:255',
            'times' => 'required|max:255',
            'period' => 'required|max:255',
            'description'=>'required|max:255',
        ]);


        $posology = Posology::find($id);
        $posology->fill($request->all());
        $posology->save();

        flash('Medicación modificada correctamente');
        return redirect()-> route('posologies.findByTreatment',['id'=>$posology->treatment_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posology  $posology
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posology = Posology::find($id);
        $treatment = treatment::find($posology->treatment_id);
        $posology->delete();
        flash('Medicación borrada correctamente');

        return redirect()->route('posologies.findByTreatment',["id"=>$treatment->id]);
    }
}
