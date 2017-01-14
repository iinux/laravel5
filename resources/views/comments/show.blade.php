@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <form method="post" action="/comments/{{ $comment->id }}" style="text-align: center">
                            <label for="content"></label>
                            <textarea id="content" name="content" rows="5" style="width: 100%">{{ $comment->content }}</textarea><br /><br />
                            <input id="submit_button" type="submit" class="btn btn-default" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <hr />
                            <p style="text-align: left">
                                {{ 'IP: '.$comment->ip }}
                                <br />
                                {{ 'Time: '.$comment->created_at }}
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
