@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<form method="post" style="text-align: center" action="/comments">
						<label for="content"></label>
                        <textarea id="content" name="content" rows="5" style="width: 100%"></textarea><br /><br />
						<input id="submit_button" type="submit" class="btn btn-default" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
                    <hr />
					<table class="table table-bordered">
						@foreach($comments as $comment)
						<tr>
							<td width="90%">
								<a href="/comments/{{ $comment->id }}">{{ $comment->content }}</a>
							</td>
							<td width="10%">
								<button type="button" class="btn btn-default btn-danger"
										onclick="zlanOp('comments/delete/{{ $comment->id }}', '确定删除吗')">删除</button>
							</td>
						</tr>
						@endforeach
					</table>
					{!! $comments->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
