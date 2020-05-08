@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tomas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Medicación</th>
                                <th>Fecha</th>
                            </tr>

                            @foreach ($doses as $dose)


                                <tr>
                                    <td>{{ $dose->posology->description}}</td>
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
