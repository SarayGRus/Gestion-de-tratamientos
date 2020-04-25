
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar mi especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'specialties.assign']) !!}

                        <div class="form-group">
                                {!!Form::label('specialty_id', 'Seleccione su especialidad') !!}
                                <br>
                                {!! Form::select('specialty_id', $especialidades, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Asignar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

