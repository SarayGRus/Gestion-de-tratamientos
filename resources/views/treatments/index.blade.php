@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Treatments</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Description</th>
                                <th>Patient</th>
                                <th>Disease</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th colspan="2">Actions</th>
                            </tr>

                            @foreach ($treatments as $treatment)


                                <tr>
                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->user->name }}</td>
                                    <td>{{ $treatment->disease->name}}</td>
                                    <td>{{ $treatment->startDate}}</td>
                                    <td>{{ $treatment->endDate}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
