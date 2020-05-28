@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamentos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicines.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicamento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        <div class="form-group">
                            {!! Form::open(['route' => ['medicinesDoctor'], 'method' => 'get']) !!}
                            {!! Form::text('query',null,['class'=>'col-md-8', 'autofocus', 'placeholder'=>'Introduce el nombre del medicamento']) !!}
                            {!! Form::submit('Buscar', ['class'=> 'btn btn-primary col-md-2'])!!}
                            {!! Form::close() !!}
                        </div>

                        <br><br>
                        @foreach($medicines as $medicine)
                            <div class="card">
                                <div class="card-header">{{$medicine->name}}</div>

                                <div class="card-body">
                                    {!! Form::label('code', 'Código nacional: ', ['class' => 'negrita']) !!}
                                    {!! Form::hidden('code', $medicine->code,['class'=>'form-control','required'])!!}
                                    {{$medicine->code}}
                                    <br>

                                    {!! Form::label('activeIngredient', 'Principio activo: ') !!}
                                    {!! Form::hidden('activeIngredient', $medicine->activeIngredient,['class'=>'form-control','required'])!!}
                                    {{$medicine->activeIngredient}}
                                    <br>
                                    {!! Form::label('appearance', 'Presentación: ') !!}
                                    {!! Form::hidden('appearance', $medicine->appearance,['class'=>'form-control','required'])!!}
                                    {{$medicine->appearance}}
                                    <br>
                                    {!! Form::label('pharmaForm', 'Forma farmacéutica: ') !!}
                                    {!! Form::hidden('pharmaForm', $medicine->pharmaForm,['class'=>'form-control','required'])!!}
                                    {{$medicine->pharmaForm}}
                                    <br>
                                    {!! Form::hidden('link', $medicine->link,['class'=>'form-control','required'])!!}
                                    <a href="{{ $medicine->link}}" target="_blank">Prospecto de {{$medicine->name}}</a>
                                    <br>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>
                                                {!! Form::open(['route' => ['medicines.edit',$medicine->id], 'method' => 'get']) !!}
                                                {!!   Form::submit('Editar', ['class'=> 'btn btn-success'])!!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['medicines.destroy',$medicine->id], 'method' => 'delete']) !!}
                                                {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
