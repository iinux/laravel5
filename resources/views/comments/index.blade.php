<html>
<head>

</head>
<body>
    <form method="post">
        <input type="text" name="content" />
        <input type="submit" />
        {{ csrf_field() }}
    </form>
    <ul>
        @foreach($comments as $comment)
        <li>
            {{ $comment->content.' ['.$comment->ip.']['.$comment->created_at.']' }}
        </li>
        @endforeach
    </ul>
</body>
</html>