
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar mi especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'specialties.store']) !!}

                        <div class="form-group">
                            {!!Form::label('name', 'Nombre') !!}
                            <br>
                            {!! Form::select('name',['anatomiaPatologica'=>'Anatomía patológica','alergologia'=>'Alergología','cardiologia'=>'Cardiología','cirugiaGeneral'=>'Cirugía general','cirugiaCardiaca'=>'Cirugía cardíaca','cirugiaPlastica'=>'Cirugía plástica','cirugiaDeMama'=>'Cirugía de mama','cirugiaMaxilofacial'=>'Cirugía maxilofacial',
                'cirugiaVacular'=>'Cirugía vascular','dermatologia'=>'Dermatología','endocrinologiaYnutricion'=>'Endocrinología y nutrición','gastroenterologiaDigestivo'=>'Gastroenterología-Digestivo','genetica'=>'Genética','geriatria'=>'Geriatría','ginecologia'=>'Ginecología',
                'hematologia'=>'Hematología','hepatologia'=>'Hepatología','enfermedadesInfecciosas'=>'Enfermedades infecciosas','medicinaInterna'=>'Medicina interna','nefrologia'=>'Nefrología','neumologia'=>'Neumología','neurologia'=>'Neurología','neurocirugia'=>'Neurocirugía',
                'oftalmologia'=>'Oftalmología','otorrinolaringologia'=>'Otorrinolaringología','oncologia'=>'Oncología','pediatria'=>'Pediatría','proctologia'=>'Proctología','psiquiatria'=>'Psiquiatría','rehabilitacionMDeportiva'=>'Rehabilitación y M. Deportiva','reumatologia'=>'Reumatología','traumatologia'=>'Traumatología','urologia'=>'Urología'], ['class' => 'form-control']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

