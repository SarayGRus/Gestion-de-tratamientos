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
                        {!! Form::open(['route' => 'myPatientsTreatments', 'method' => 'get']) !!}
                        {!!   Form::submit('Tratamientos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br><br>
                        {!! Form::open(['route' => ['posologies.createTreatment', $treatment->id], 'method' => 'get']) !!}
                        {!!   Form::submit('Añadir medicamento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Medicamento</th>
                                <th>Descripción</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Periodo</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($posologies as $posology)


                                <tr>
                                    <td>{{ $posology->medicine->code }}</td>
                                    <td>{{ $posology->description}}</td>
                                    <td>{{ $posology->units }}</td>
                                    <td>{{ $posology->times }}</td>
                                    <td>{{ $posology->period }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['posologies.edit',$posology->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['posologies.destroy',$posology->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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
