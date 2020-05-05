@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tratamientos</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'treatments.showPatients', 'method' => 'get']) !!}
                        {!!   Form::submit('Pacientes', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Descripción</th>
                                <th>Paciente</th>
                                <th>Enfermedad</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($treatments as $treatment)


                                <tr>

                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->patientUser->name }}</td>
                                    <td>{{ $treatment->disease->name }}</td>
                                    <td>{{ $treatment->startDate}}</td>
                                    <td>{{ $treatment->endDate}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['posologies.findByTreatment',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver medicación', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['treatments.edit',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['treatments.destroy',$treatment->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("Are you sure?"))event.preventDefault();'])!!}
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
