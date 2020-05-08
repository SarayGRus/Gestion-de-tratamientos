@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamentos para el tratamiento:<?php echo " ".$treatment->description;?></div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br>
                        {!! Form::open(['route' => 'myTreatments', 'method' => 'get']) !!}
                        {!!   Form::submit('Volver a tratamientos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Medicamento</th>
                                <th>Descripción</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Periodo</th>

                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($posologies as $posology)


                                <tr>
                                    <td>{{ $posology->medicine->code }}</td>
                                    <td>{{ $posology->description}}</td>
                                    <td>{{ $posology->units }}</td>
                                    <td>{{ $posology->times }}</td>
                                    <td>{{ $posology->period }}</td>



                                    <td>
                                        {!! Form::open(['route' => ['medicines.indexPatientMedicine',$posology->medicine_id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver medicamento', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['doses.createDose',$posology->id], 'method' => 'get']) !!}
                                        @if($treatment->endDate >= date('Y-m-d\Th:i'))
                                            {!!   Form::submit('Registrar toma', ['class'=> 'btn btn-primary'])!!}
                                        @else
                                            {!!   Form::submit('Registrar toma', ['disabled','class'=> 'btn btn-outline-primary'])!!}
                                        @endif
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['doses.indexPatientDose',$posology->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver tomas', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
