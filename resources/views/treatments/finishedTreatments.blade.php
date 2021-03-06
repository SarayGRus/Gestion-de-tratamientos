@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis tratamientos finalizados</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'myTreatments', 'method' => 'get']) !!}
                        {!!   Form::submit('Tratamientos actuales', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Descripción</th>
                                <th>Doctor</th>
                                <th>Enfermedad</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Adherencia global</th>
                                <th>Adherencia parcial</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($treatments as $treatment)


                                <tr>

                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->doctorUser->fullName }}</td>
                                    <td>{{ $treatment->disease->name }}</td>
                                    <td>{{ $treatment->startDate}}</td>
                                    <td>{{ $treatment->endDate}}</td>
                                    <td>{{ $treatment->adherence }}</td>
                                    <td>{{ $treatment->parcial_adherence }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['posologies.indexPatient',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver tratamiento', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['treatments.showDoctors',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver doctor', ['class'=> 'btn btn-primary'])!!}
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
