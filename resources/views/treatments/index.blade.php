@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Tratamientos</div>

                    <div class="panel-body">

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Descripción</th>
                                <th>Doctor</th>
                                <th>Enfermedad</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th colspan="1">Acciones</th>
                            </tr>

                            @foreach ($treatments as $treatment)


                                <tr>

                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->doctorUser->name }}</td>
                                    <td>{{ $treatment->disease->name }}</td>
                                    <td>{{ $treatment->startDate}}</td>
                                    <td>{{ $treatment->endDate}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['posologies.indexPatient',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver tratamiento', ['class'=> 'btn btn-primary'])!!}
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
