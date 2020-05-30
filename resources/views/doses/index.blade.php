@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tomas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br>
                        <td>
                            {!! Form::open(['route' => ['posologies.indexPatient',$posology->treatment_id], 'method' => 'get']) !!}
                            {!!   Form::submit('Volver a medicación', ['class'=> 'btn btn-primary'])!!}
                            {!! Form::close() !!}

                        </td>
                        <br>
                        <div class="container">
                            <div class="row justify-content-right">
                                <div class="col-md-20">
                                    <div class="card">
                                        <div class="card-header">Descripción de la toma</div>

                                        <div class="card-body">
                                            {!! Form::label('medicine', 'Medicamento: ') !!}
                                            {!! Form::hidden('medicine', $medicine->name,['class'=>'form-control','required'])!!}
                                            {{$medicine->name}}
                                            <br>
                                            {!! Form::label('posology_id', 'Posología: ') !!}
                                            {!! Form::hidden('posology_id', $posology->description,['class'=>'form-control','required'])!!}
                                            {{$posology->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Fecha</th>
                                <th colspan="1">Acciones</th>

                            </tr>

                            @foreach ($doses as $dose)


                                <tr>

                                    <td>{{ $dose->doseDate}}</td>

                                    <td>

                                        {!! Form::open(['route' => ['doses.destroy',$dose->id], 'method' => 'delete']) !!}
                                        @if($treatment->endDate >= date('Y-m-d H:i:s'))

                                            {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        @else
                                            {!!   Form::submit('Borrar', ['disabled','class'=> 'btn btn-outline-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        @endif
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
