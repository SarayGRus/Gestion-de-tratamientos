@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi centro de salud</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Horario de apertura</th>
                                <th>Horario de cierre</th>

                            </tr>

                            @foreach ($clinics as $clinic)


                                <tr>
                                    <td>{{ $clinic->name }}</td>
                                    <td>{{ $clinic->address }}</td>
                                    <td>{{ $clinic->telephone }}</td>
                                    <td>{{ $clinic->opening }}</td>
                                    <td>{{ $clinic->closing }}</td>

                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
@endsection

