@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar posología</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($posology, [ 'route' => ['posologies.update',$posology->id], 'method'=>'PUT']) !!}


                        {!! Form::hidden('posology',$posology->id,['class'=>'form-control', 'required']) !!}
                        {!! Form::hidden('treatment_id',$posology->treatment_id,['class'=>'form-control', 'required']) !!}


                        <div class="form-group">
                            {!!Form::label('medicine_id', 'Medicamento') !!}
                            <br>
                            {!! Form::select('medicine_id', $medicines, $posology->medicine_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('units', 'Unidades') !!}
                            {!! Form::number('units',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('times', 'Frecuencia') !!}
                            {!! Form::number('times',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('period', 'Periodo') !!}
                            <br>
                            {!! Form::select('period',['Horas'=>'HORAS','Días'=>'DÍAS','Semanas'=>'SEMANAS'], $posology->period, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            {!! Form::text('description',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
