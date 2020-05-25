@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>NUHSA</th>
                                <th>Teléfono</th>
                                <th>Correo electrónico</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($patients as $patient)


                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->surname}}</td>
                                    <td>{{ $patient->dni}}</td>
                                    <td>{{ $patient->nuhsa}}</td>
                                    <td>{{ $patient->telephone}}</td>
                                    <td>{{ $patient->email}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['treatments.showAssign', $patient->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Prescribir tratamiento', ['class'=> 'btn btn-success'])!!}
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
