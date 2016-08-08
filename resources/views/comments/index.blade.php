<html>
<head>
    <title>Life</title>
    <style type="text/css">
        li {
            font-size: 2em;
        }
        textarea {
            font-size: 2em;
            width: 100%;
        }
        ul {
            width: 100%;
        }
        form {
            text-align: center;
        }
        #submit_button {
            font-size: 2em;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="content"></label><textarea id="content" name="content" rows="10"></textarea><br /><br />
        <input id="submit_button" type="submit" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <ul>
        @foreach($comments as $comment)
        <li>
            {{ $comment->content.' ['.$comment->ip.']['.$comment->created_at.']' }}
        </li>
        @endforeach
    </ul>
    {!! $comments->render() !!}
</body>
</html>