@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis doctores</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'myTreatments', 'method' => 'get']) !!}
                        {!!   Form::submit('Volver a tratamientos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Especialidad</th>
                                <th>Centro de salud</th>
                                <th>Correo electrónico</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($doctors as $doctor)


                                <tr>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->surname}}</td>
                                    <td>{{ $doctor->specialty->name}}</td>
                                    <td>{{ $doctor->clinic->name}}</td>
                                    <td>{{ $doctor->email}}</td>



                                    <td>
                                        {!! Form::open(['route' => ['clinics.showClinic',$doctor->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Información del centro', ['class'=> 'btn btn-primary'])!!}
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
