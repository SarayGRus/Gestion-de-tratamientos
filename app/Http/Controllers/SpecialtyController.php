<?php

namespace App\Http\Controllers;

use App\specialty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
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
       /*$specialties = DB::table('specialties')
            ->join('users','users.specialty_id','=','specialties.id')
            ->select('users.id','specialties.*')
            ->where('users.id','=',Auth::user()->id)
            ->get();*/

        return view('specialties/index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialties.create');
    }

    public function assignDoctor(Request $request){
        Auth::user()->specialty_id = $request->get('specialty_id');
        Auth::user()->save();

        flash('Tu especialidad ha sido registrada correctamente');

        return redirect()->route('mySpecialty');

    }

    public function showAssign()
    {

        $especialidades = specialty::all()->pluck('name','id');

        return view('specialties.assignSpecialty',['especialidades'=>$especialidades]);
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
            'name' => ['required', 'string', 'in:anatomiaPatologica,alergologia,cardiologia,cirugiaGeneral,cirugiaCardiaca,cirugiaPlastica,cirugiaDeMama,cirugiaMaxilofacial,
                cirugiaVascular,dermatologia,endocrinologiaYnutricion,gastroenterologiaDigestivo,genetica,geriatria,ginecologia,
                hematologia,hepatologia,enfermedadesInfecciosas,medicinaInterna,nefrologia,neumologia,neurologia,neurocirugia,
                oftalmologia,otorrinolaringologia,oncologia,pediatria,proctologia,psiquiatria,rehabilitacionMDeportiva,reumatologia,traumatologia,urologia']
        ]);
        $specialty = new specialty($request->all());
        $specialty->save();

        flash('Tu especialidad ha sido creada correctamente');

        return redirect()->route('mySpecialty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialty = specialty::find($id);

        return view('specialties/show',['specialty'=>$specialty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialty $specialty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialty $specialty)
    {
        //
    }
}
