@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear un centro de salud</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'clinics.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Dirección') !!}
                            {!! Form::text('address',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telephone', 'Teléfono') !!}
                            {!! Form::text('telephone',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('opening', 'Horario de apertura') !!}
                            <input type="time" id="opening" name="opening" class="form-control" value="{{Carbon\Carbon::now()->format('H:i')}}" />
                        </div>
                        <div class="form-group">
                            {!! Form::label('closing', 'Horario de cierre') !!}
                            <input type="time" id="closing" name="closing" class="form-control" value="{{Carbon\Carbon::now()->format('H:i')}}" />
                        </div>




                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


