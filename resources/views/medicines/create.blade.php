@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'medicines.store']) !!}
                        <div class="form-group">
                            {!! Form::label('code', 'Nombre: código del medicamento') !!}
                            {!! Form::text('code',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composition ', 'Composición') !!}
                            {!! Form::text('composition',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('appearance', 'Presentación del medicamento') !!}
                            <br>
                            {!! Form::select('appearance',['Comprimido'=>'Comprimido', 'Inyectable'=>'Inyectable','Gota'=>'Gota','Sobre'=>'Sobre',
                            'Solución'=>'Solución','Supositorio'=>'Supositorio','Suspensión'=>'Suspensión'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link del medicamento') !!}
                            {!! Form::text('link',null,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
