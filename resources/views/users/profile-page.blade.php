@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Profile Page</h2>
                <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
            </div>

            <div class="panel-body">
                <h4>ID: {{ Auth::user()->id }}</h4>
                <h4>Name: {{ Auth::user()->name }}</h4>
                <h4>Email: {{ Auth::user()->email }}</h4>
            </div>
        </div>
    </div>
@endsection