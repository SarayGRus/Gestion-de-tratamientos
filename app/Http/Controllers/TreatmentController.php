<?php

namespace App\Http\Controllers;

use App\disease;
use App\Medicine;
use App\treatment;
use App\User;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
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
        $now = new \DateTime();
        $treatments = treatment::where('patient_id','=',Auth::user()->id)
            ->where('endDate','>=',$now)->get();
        return view('treatments.index',['treatments'=>$treatments]);

    }

    public function indexFinishedTreatments(){
        $now = new \DateTime();
        $treatments = treatment::where('patient_id','=',Auth::user()->id)
            ->where('endDate','<',$now)->get();

        return view('treatments.finishedTreatments',['treatments'=>$treatments]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexDoctor(Request $request)
    {
        /*$demands = Demand::whereHas('petitioner', function($q){
            $q->where('users.cp','=', Auth::user()->cp);
        })->get();*/
        $nombreABuscar = $request->get('query');

        $treatments = treatment::whereHas('doctorUser', function ($q) use ($nombreABuscar){
            $q->where('users.id','=',Auth::user()->id)
                ->where('treatments.patient_id',
                    'LIKE','%'.$nombreABuscar.'%');
        })->get();



        /*$treatments = DB::table('treatments')
            ->join('users','users.id',"=", 'treatments.doctor_id')
            ->select('users.id','treatments.*')
            ->where('users.id','=',Auth::user()->id)
            ->get();*/

        return view('treatments.indexDoctor', ['treatments'=>$treatments]);
    }

    public function showPatients()
    {

        $patients = User::where('userType','=','patient')->get();

        return view('treatments.patients',['patients'=>$patients]);
    }

    public function showDoctors($id)
    {

        //$doctors = User::where('userType','=','doctor')->get();

        /*$doctors = User::whereHas('treatments',function ($q){
            $q->where('treatments.patient_id','=', Auth::user()->id);
        })*/
        $treatment = treatment::find($id);
        $doctors = User::all()->where('id','=',$treatment->doctor_id);

        return view('treatments.doctors',['doctors'=>$doctors]);
    }


    public function showAssign($id)
    {

        $patient = User::find($id);
        $diseases = disease::where('specialty_id', Auth::user()->specialty_id)->pluck('name','id');


        return view('treatments.assignTreatment',['patient'=>$patient, 'diseases'=>$diseases]);

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
            'description' => 'required|max:255',
            'patient_id' => 'required|exists:users,id',
            'disease_id'=> 'required|exists:diseases,id',
            'startDate' => 'required|date|after:now',
            'endDate' => 'required|date|after:now'
        ]);

        $treatment = new treatment($request->all());
        $treatment->doctor_id = Auth::user()->id;
        $treatment->save();

        flash('Tratamiento creado correctamente');
        return redirect()->route('myPatientsTreatments');
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
    public function edit($id)
    {
        $treatment = treatment::find($id);
        $patients = User::where('userType','=','patient')->pluck('name','id');
        $diseases = disease::where('specialty_id', Auth::user()->specialty_id)->pluck('name','id');

        return view('treatments/edit',['treatment'=> $treatment,'patients'=>$patients,'diseases'=>$diseases]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
            'patient_id' => 'required|exists:users,id',
            'disease_id'=> 'required|exists:diseases,id',
            'startDate' => 'required|date|after:now',
            'endDate' => 'required|date|after:now'
        ]);

        $treatment = treatment::find($id);
        $treatment->fill($request->all());
        $treatment->doctor_id = Auth::user()->id;
        $treatment->save();

        flash('Tratamiento modificado correctamente');
        return redirect()->route('myPatientsTreatments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = treatment::find($id);
        $treatment->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('myPatientsTreatments');
    }
}
