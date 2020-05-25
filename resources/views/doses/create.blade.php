@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registra una toma</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br>
                        {!! Form::open(['route' => 'doses.store']) !!}

                        <div class="card">
                            <div class="card-header">Descripción de la toma</div>

                            <div class="card-body">
                                {!! Form::label('medicine', 'Medicamento: ') !!}
                                {!! Form::hidden('medicine', $medicine->name,['class'=>'form-control','required'])!!}
                                {{$medicine->name}}
                                <br>
                                {!! Form::label('posology_id', 'Posología: ') !!}
                                {!! Form::hidden('posology_id', $posology->id,['class'=>'form-control','required'])!!}
                                {{$posology->description}}
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            {!! Form::label('doseDate', 'Fecha') !!}
                            <input type="datetime-local" id="doseDate" name="doseDate" class="form-control" max="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
