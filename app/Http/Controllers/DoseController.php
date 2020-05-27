<?php

namespace App\Http\Controllers;

use App\Dose;
use App\Medicine;
use App\Posology;
use App\treatment;
use Carbon\Carbon;
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
        $doses = Dose::all()->where('posology_id','=',$id);
        $medicine = Medicine::find($posology->medicine_id);
        $treatment = treatment::find($posology->treatment_id);

        return view('doses/index',['doses'=>$doses,'posology'=>$posology,'medicine'=>$medicine,'treatment'=>$treatment]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDose($id)
    {

        $posology = Posology::find($id);
       //$doses = Dose::all()->where('posology_id','=',$id);
        $medicine = Medicine::find($posology->medicine_id);
        //dd($medicine);
        return view('doses/create',['posology'=>$posology,'medicine'=>$medicine]);


    }

    public function showDoses($id)
    {
        $posology = Posology::find($id);
        $doses = Dose::all()->where('posology_id','=',$posology->id);
        //$doses = Dose::all()->where('posology_id','=','9');
        //dd($doses);
        $medicine = Medicine::find($posology->medicine_id);
        return view('doses/showDose',['doses'=>$doses,'posology'=>$posology,'medicine'=>$medicine]);
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
            'doseDate' => 'required|date|before:now',
            'posology_id' => 'required|exists:posologies,id',
        ]);


        $dose = new Dose($request->all());
        $dose->save();


        $posology = Posology::find($dose->posology_id);
        $treatment_id = $posology->treatment_id;
        $this->adherence($treatment_id);


        flash('Toma registrada correctamente');
        return redirect()->route('posologies.indexPatient',["id"=>$treatment_id]);
    }

    public function adherence($id)
    {
        $treatment = treatment::find($id);
        //dd($treatment);
        $posologies = Posology::all()->where('treatment_id','=',$id);
        //dd($posologies);
        $num_posologies = count($posologies);
        //dd($num_posologies);
        $adherence = 0.0;
        $parcial_adherence = 0.0;

        foreach ($posologies as $posology){
            $doses = Dose::all()->where('posology_id','=',$posology->id);
            $count = count($doses);
            //dd($count);

            $date1string = $treatment->startDate;
            $date1 = Carbon::parse($date1string);
            //dd($date1);

            $date2string = $treatment->endDate;
            $date2 = Carbon::parse($date2string);

            $now = new \DateTime();

            $n_days = $date1->diffInDays($date2);
            $n_days = $n_days+1;

            $n_days_actual = $date1->diffInDays($now);
            $n_days_actual = $n_days_actual + 1;
            //dd ("Información de ejecucion: ".$n_days_actual. "Var2: ". $n_days);
            //n_days no tiene en cuenta el dia de fin/inicio del tratamiento, es decir,
            //cuenta un día menos, por lo que tenemos que sumar uno.


            //$n_doses_total = 0;
            //dd($n_days+1);
            if($posology->period == 'Horas'){

                // 1 día tiene 24h. Si tengo que tomarlo cada X horas, entonces tomaré
                //la medicación 24/X = número de tomas diarias.
                $n_doses_day = 24/($posology->times);
                $n_doses_total = $n_doses_day*$n_days;
                //dd($n_doses_total);

                //Cálculo parcial:
                $n_doses_parcial = $n_doses_day*$n_days_actual;
                //dd($n_doses_parcial);

            }elseif($posology->period == 'Días'){

                $hours = ($posology->times)*24;
                $n_doses_week = $n_days*24/$hours;
                $n_doses_total = round($n_doses_week);
                //dd($n_doses_week);

                //Cálculo parcial:
                $n_doses_parcial = round($n_days_actual*24/$hours);
                //dd($n_doses_parcial);

            }else{
                //Tratamiento periodo semanal
                $hours = ($posology->times)*7*24;
                $n_doses_month = $n_days*24/$hours;
                $n_doses_total = round($n_doses_month);
                //dd($n_doses_month);

                //Cálculo parcial:
                $n_doses_parcial = round($n_days_actual*24/$hours);

            }


            //$adherence_posology = $count*10/$n_doses_total;
            $adherence += ($count*10/$n_doses_total);
            //dd($adherence);

            $parcial_adherence += ($count*10/$n_doses_parcial);
            //dd($parcial_adherence);
            //dd($adherence);

            //dd ("Información de ejecucion: ".$var1. "Var2: ". $var2. ....)

        }

        $treatment->adherence = round($adherence/$num_posologies,4);
        $treatment->parcial_adherence = round($parcial_adherence/$num_posologies,4);
        $treatment->save();
        //dd($treatment->adherence);
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
    public function destroy($id)
    {
        $dose = Dose::find($id);
        $dose->delete();
        flash('Toma borrada correctamente');


        return redirect()->route('doses.indexPatientDose',["id"=> $dose->posology_id]);
    }
}
