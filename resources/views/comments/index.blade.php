<html>
<head>
    <title>Life</title>
</head>
<body>
    <form method="post">
        <input type="text" name="content" />
        <input type="submit" />
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