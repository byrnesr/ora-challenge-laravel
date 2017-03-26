@extends('layouts.app')

@section('content')

    <div class="container fill">
        <div class="row chat-wrap">

                <!--Main Content / Message List-->
                <div class="col-md-8 col-md-offset-2" id="Messages">

                    <!--Header-->
                    <div class="panel-heading">
                        <div class="chat-header col-sm-12">
                            <h4>Chat: {{ $chat->name }}</h4>
                        </div>
                    </div>

                    <!--Messages-->
                    <div class="panel-body">
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
                                <div class="input-sm">
                                    <input class="no-resize-bar form-control" type="text" name="body" rows="2" placeholder="Write a message..."/>
                                </div>
                                <div class="send-button">
                                    <input type="submit" value="Send"/>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
        </div>
    </div>

@endsection
