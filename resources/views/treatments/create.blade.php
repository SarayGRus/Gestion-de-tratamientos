
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'treatments.store']) !!}

                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            {!! Form::text('description',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('patient_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('patient_id', $patients, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('disease_id', 'Enfermedad') !!}
                            <br>
                            {!! Form::select('disease_id', $diseases, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('startDate', 'Fecha de inicio') !!}
                            <input type="datetime-local" id="startDate" name="startDate" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('endDate', 'Fecha de fin') !!}
                            <input type="datetime-local" id="endDate" name="endDate" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
