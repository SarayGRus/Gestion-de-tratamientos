@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar mi centro de salud</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'clinics.assign']) !!}

                        <div class="form-group">
                            {!!Form::label('clinic_id', 'Seleccione su centro de salud') !!}
                            <br>
                            {!! Form::select('clinic_id', $clinics, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Asignar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

