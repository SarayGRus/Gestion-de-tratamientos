@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Código nacional</th>
                                <th>Principio activo</th>
                                <th>Presentación</th>
                                <th>Forma farmacéutica</th>
                                <th>Enlace</th>
                            </tr>

                            @foreach ($medicines as $medicine)


                                <tr>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->code }}</td>
                                    <td>{{ $medicine->activeIngredient }}</td>
                                    <td>{{ $medicine->appearance }}</td>
                                    <td>{{ $medicine->pharmaForm }}</td>
                                    <td><a href="{{ $medicine->link}}" target="_blank">Prospecto de {{$medicine->name}}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
