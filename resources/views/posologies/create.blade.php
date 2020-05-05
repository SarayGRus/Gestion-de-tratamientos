@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Añadir medicamento al tratamiento: <?php echo $treatment->description;?></div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'posologies.store']) !!}


                        {!! Form::hidden('treatment_id',$treatment->id,['class'=>'form-control', 'required']) !!}


                        <div class="form-group">
                            {!!Form::label('medicine_id', 'Medicamento') !!}
                            <br>
                            {!! Form::select('medicine_id', $medicines, ['class' => 'form-control', 'required']) !!}
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
                            {!! Form::select('period',['Horas'=>'HORAS','Días'=>'DÍAS','Semanas'=>'SEMANAS','Meses'=>'MESES','Año'=>'AÑO'], ['class' => 'form-control']) !!}
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

