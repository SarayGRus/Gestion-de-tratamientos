@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Composición</th>
                                <th>Presentación</th>
                                <th>Enlace</th>
                            </tr>

                            @foreach ($medicines as $medicine)


                                <tr>
                                    <td>{{ $medicine->code }}</td>
                                    <td>{{ $medicine->composition }}</td>
                                    <td>{{ $medicine->appearance }}</td>
                                    <td>{{ $medicine->link}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
