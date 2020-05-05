@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamentos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicines.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicamento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Composición</th>
                                <th>Presentación</th>
                                <th>Enlace</th>


                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicines as $medicine)


                                <tr>
                                    <td>{{ $medicine->code }}</td>
                                    <td>{{ $medicine->composition }}</td>
                                    <td>{{ $medicine->appearance }}</td>
                                    <td>{{ $medicine->link}}</td>


                                    <td>
                                        {!! Form::open(['route' => ['medicines.edit',$medicine->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicines.destroy',$medicine->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
