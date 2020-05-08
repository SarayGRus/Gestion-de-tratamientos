@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-16 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tomas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => ['posologies.findByTreatment',$posology->treatment_id], 'method' => 'get']) !!}
                        {!!   Form::submit('Volver a medicación', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        <div class="container">
                            <div class="row justify-content-right">
                                <div class="col-md-20">
                                    <div class="card">
                                        <div class="card-header">Descripción de la toma</div>

                                        <div class="card-body">
                                            {!! Form::label('medicine', 'Medicamento: ') !!}
                                            {!! Form::hidden('medicine', $medicine->code,['class'=>'form-control','required'])!!}
                                            {{$medicine->code}}
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
                            </tr>

                            @foreach ($doses as $dose)


                                <tr>


                                    <td>{{ $dose->doseDate}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
