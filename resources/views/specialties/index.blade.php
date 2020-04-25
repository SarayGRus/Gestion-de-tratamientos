@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'specialties.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear nueva especialidad', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['route' => 'specialties.showAssign', 'method' => 'get']) !!}
                        {!!   Form::submit('Registrar mi especialidad', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection
