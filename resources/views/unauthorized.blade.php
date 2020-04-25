@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Unauthorized</div>

                    <div class="panel-body">
                        You can't access this page ‘{{$role}}’”
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
