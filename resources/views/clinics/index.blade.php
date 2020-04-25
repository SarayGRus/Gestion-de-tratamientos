@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi centro de salud</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'clinics.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear nuevo centro de salud', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['route' => 'clinics.showAssign', 'method' => 'get']) !!}
                        {!!   Form::submit('Registrar mi centro de salud', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection

