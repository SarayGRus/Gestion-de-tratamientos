@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi doctor</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'myTreatments', 'method' => 'get']) !!}
                        {!!   Form::submit('Volver a tratamientos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                                    <div class="card">
                                        <div class="card-header">Información sobre el doctor</div>

                                        <div class="card-body">
                                            {!! Form::label('doctor_name', 'Nombre: ') !!}
                                            {!! Form::hidden('doctor_name', $doctor->name,['class'=>'form-control','required'])!!}
                                            {{$doctor->name}}
                                            <br>
                                            {!! Form::label('doctor_surname', 'Apellido: ') !!}
                                            {!! Form::hidden('doctor_surname', $doctor->surname,['class'=>'form-control','required'])!!}
                                            {{$doctor->surname}}
                                            <br>
                                            {!! Form::label('doctor_specialty', 'Especialidad: ') !!}
                                            {!! Form::hidden('doctor_specialty', $doctor->specialty->name,['class'=>'form-control','required'])!!}
                                            {{$doctor->specialty->name}}
                                            <br>
                                            {!! Form::label('doctor_email', 'Correo electrónico: ') !!}
                                            {!! Form::hidden('doctor_email', $doctor->email,['class'=>'form-control','required'])!!}
                                            {{$doctor->email}}
                                            <br>
                                        </div>
                                    </div>

                        <br><br>
                                    <div class="card">
                                        <div class="card-header">Información sobre el centro</div>

                                            <div class="card-body">
                                                {!! Form::label('clinic_name', 'Nombre: ') !!}
                                                {!! Form::hidden('clinic_name', $clinic->name,['class'=>'form-control','required'])!!}
                                                {{$clinic->name}}
                                                <br>
                                                {!! Form::label('clinic_telephone', 'Teléfono: ') !!}
                                                {!! Form::hidden('clinic_telephone', $clinic->telephone,['class'=>'form-control','required'])!!}
                                                {{$clinic->telephone}}
                                                <br>

                                                {!! Form::label('clinic_opening', 'Hora de apertura: ') !!}
                                                {!! Form::hidden('clinic_opening', $clinic->opening,['class'=>'form-control','required'])!!}
                                                {{$clinic->opening}}
                                                <br>
                                                {!! Form::label('clinic_closing', 'Hora de cierre: ') !!}
                                                {!! Form::hidden('clinic_closing', $clinic->closing,['class'=>'form-control','required'])!!}
                                                {{$clinic->closing}}
                                                <br>
                                                {!! Form::label('clinic_address', 'Dirección: ') !!}
                                                {!! Form::hidden('clinic_address', $clinic->address,['class'=>'form-control','required'])!!}
                                                {{$clinic->address}}
                                            </div>
                                        </div>
                                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
