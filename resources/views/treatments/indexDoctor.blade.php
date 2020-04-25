@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Treatments</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'treatments.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Create treatment', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Description</th>
                                <th>Patient</th>
                                <th>Disease</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($treatments as $treatment)


                                <tr>
                                    <td>{{ $treatment->description }}</td>
                                    <td>{{ $treatment->user->name }}</td>
                                    <td>{{ $treatment->disease->name}}</td>
                                    <td>{{ $treatment->startDate}}</td>
                                    <td>{{ $treatment->endDate}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['treatments.edit',$treatment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Edit', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['treatments.destroy',$demand->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Delete', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("Are you sure?"))event.preventDefault();'])!!}
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
