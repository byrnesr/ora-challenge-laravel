@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-heading">
            <h2>Chats</h2>
        </div>
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif
        <div class="panel-body">
            <ul>
                @foreach ($chats as $chat)
                    <li>Chat: {{ $chat->name }}</li>
                @endforeach
            </ul>
            <form class="form-horizontal" action="/create-chat" method="POST">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Create a New Chat Here!</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Chat Name</label>
                        <div class="col-md-6">
                            <input id="name" name="name" type="text" placeholder="Enter chat name here" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-4">
                            <button id="" name="" class="btn btn-primary">Add Chat</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection
