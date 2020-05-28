@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar una enfermedad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($disease, ['route' => ['diseases.update', $disease->id], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <br>
                            {!! Form::hidden('specialty_id', $specialty->id, ['class' => 'form-control']) !!}
                            {!! "Especialidad: ".$specialty->name !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            {!! Form::text('description',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
