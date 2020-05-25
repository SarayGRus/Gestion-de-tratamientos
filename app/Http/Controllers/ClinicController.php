<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $clinics = DB::table('clinics')
            ->join('users','users.clinic_id', '=', 'clinics.id')
            ->select('users.id','clinics.*')
            ->where('users.id', '=', Auth::user()->id)
            ->get();
        return view('clinics/index',['clinics'=>$clinics]);
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

        $clinics = Clinic::all()->pluck('fullName','id');

        return view('clinics.assignClinic',['clinics'=>$clinics]);
    }

    public function showClinic($id)
    {
        $doctor = User::find($id);
        $clinics = Clinic::all()->where('id','=', $doctor->clinic_id);

        return view('clinics.showClinic',['clinics'=>$clinics]);
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
    public function edit($id)
    {
        $clinic = Clinic::find($id);
        return view('clinics/edit',['clinic'=>$clinic]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'opening' => 'required',
            'closing' => 'required'

        ]);


        $clinic = Clinic::find($id);
        $clinic->fill($request->all());
        $clinic->save();

        flash('Centro de salud modificado correctamente');

        return redirect()->route('myClinic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
   /*public function destroy($id)
    {
        $clinic = Clinic::find($id);
        $clinic->delete();
        flash('Centro de salud borrado correctamente');


        return redirect()->route('myClinic');
    }*/
}
