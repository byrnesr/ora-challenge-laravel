@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Profile Page</h2>
            </div>
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif
            <div class="panel-body">
                <form class="form-horizontal" action='/update' method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="id">ID: {{ Auth::user()->id }}</label>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="name">Name:</label>
                            <input name="name" id="name" class="input-large" type="text" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email:</label>
                            <input name="email" id="email" class="input-large" type="text" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success">Save Changes</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection