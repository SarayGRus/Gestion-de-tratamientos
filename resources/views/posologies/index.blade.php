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
                        @if($treatment->endDate >= date('Y-m-d H:i:s'))
                            {!! Form::open(['route' => 'myPatientsTreatments', 'method' => 'get']) !!}
                            {!!   Form::submit('Tratamientos', ['class'=> 'btn btn-primary'])!!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => 'finishedTreatments', 'method' => 'get']) !!}
                            {!!   Form::submit('Tratamientos', ['class'=> 'btn btn-primary'])!!}
                            {!! Form::close() !!}

                        @endif

                        <br><br>

                        {!! Form::open(['route' => ['posologies.createTreatment', $treatment->id], 'method' => 'get']) !!}
                        @if($treatment->endDate >= date('Y-m-d H:i:s'))
                            {!!   Form::submit('Añadir medicación', ['class'=> 'btn btn-primary'])!!}
                        @else
                            {!!   Form::submit('Añadir medicación', ['disabled','class'=> 'btn btn-outline-primary'])!!}
                        @endif
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
                                    <td>{{ $posology->medicine->name }}</td>
                                    <td>{{ $posology->description}}</td>
                                    <td>{{ $posology->units }}</td>
                                    <td>{{ $posology->times }}</td>
                                    <td>{{ $posology->period }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['doses.showDoses',$posology->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Registro de tomas', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}

                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['posologies.edit',$posology->id], 'method' => 'get']) !!}
                                        @if($treatment->endDate >= date('Y-m-d H:i:s'))
                                            {!!   Form::submit('Editar', ['class'=> 'btn btn-success'])!!}
                                        @else
                                            {!!   Form::submit('Editar', ['disabled','class'=> 'btn btn-outline-success'])!!}

                                        @endif
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['posologies.destroy',$posology->id], 'method' => 'delete']) !!}
                                        @if($treatment->endDate >= date('Y-m-d H:i:s'))
                                            {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}

                                        @else
                                            {!!   Form::submit('Borrar', ['disabled','class'=> 'btn btn-outline-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}

                                        @endif

                                        {!! Form::close() !!}

                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
