@extends('layouts.app')

@section('content')
    <!--3rd Party Fonts & Icons-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}"/>

    <div class="container fill">
        <div class="row chat-wrap">

            <!-- Messages & Info -->
            <div class="col-sm-9 panel-wrap">

                <!--Main Content / Message List-->
                <div class="col-sm-9 section-wrap" id="Messages">

                    <!--Header-->
                    <div class="row header-wrap">
                        <div class="chat-header col-sm-12">
                            <h4>Chat: {{ $chat->name }}</h4>
                            <div class="header-button">
                                <a class="btn pull-right info-btn">
                                    <i class="fa fa-info-circle fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Messages-->
                    <div class="row content-wrap messages">
                        @foreach ($messages as $message)
                        <div class="msg">
                            <div class="media-body">
                                <small class="pull-right time"><i class="fa fa-clock-o"></i> {{ $message->created_at }}</small>

                                <h5 class="media-heading">{{ $message->name }}</h5>
                                <small class="col-sm-11">{{ $message->body }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!--Message box & Send Button-->
                    <div class="row send-wrap">
                        <div class="send-message">
                            <form action="/chat/{{ $chat->id }}/send-message" method="POST">
                                {{ csrf_field() }}
                                <div class="message-text">
                                    <textarea class="no-resize-bar form-control" name="body" rows="2" placeholder="Write a message..."></textarea>
                                </div>
                                <div class="send-button">
                                    <input type="submit" value="Send"/>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <!--Sliding Menu / Conversation Members-->
                <div class="col-sm-3 section-wrap" id="Members">

                    <!--Header-->
                    <div class="row header-wrap">
                        <div class="chat-header col-sm-12">
                            <h4>Conversation Info</h4>
                            <div class="header-button">
                                <a class="btn pull-right info-btn">
                                    <i class="fa fa-close"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Members-->
                    <div class="row content-wrap">
                        <div class="contact">
                            <div class="media-body">
                                <h5 class="media-heading">Walter White</h5>
                                <small class="pull-left time"><i>Owner</i></small>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
