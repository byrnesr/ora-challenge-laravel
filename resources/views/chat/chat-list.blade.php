@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
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
                    <li>
                        <div class="chat-area">
                            <a class="chat-link" href='/chat/{{ $chat->id }}'>
                                <div>
                                    <h3>{{ $chat->name }}</h3>
                                </div>
                                @if ($chat->last_message != null)
                                    <h5>Last Message: </h5>
                                    <div class="msg">
                                        <div class="media-body">
                                            <small class="pull-right time"><i class="fa fa-clock-o"></i> {{ $chat->created_at }}</small>

                                            <h5 class="media-heading">{{ $chat->user_name }}</h5>
                                            <small class="col-sm-11">{{ $chat->body }}</small>
                                        </div>
                                    </div>
                                    <h5>Users: </h5>
                                    <div>
                                        <p>
                                        @foreach ($chat_users as $chat_user)
                                            @if ($chat_user->chat_id == $chat->id)
                                                {{ $chat_user->name }}
                                            @endif
                                        @endforeach
                                        </p>
                                    </div>
                                @else
                                    <div class="msg">
                                        <p>
                                            There are no messages in this Chat yet!
                                        </p>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="/create-chat" method="POST">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Create a New Chat Here!</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="name">Chat Name</label>
                        <div class="col-lg-3">
                            <input id="name" name="name" type="text" placeholder="Enter chat name here" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-1 control-label" for=""></label>
                        <div class="col-md-2">
                            <button id="" name="" class="btn btn-primary">Add Chat</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection
