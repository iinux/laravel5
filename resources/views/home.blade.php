@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<table class="table table-bordered">
						@foreach($comments as $comment)
						<tr>
							<td>
								<a href="">{{ $comment->content }}</a>
							</td>
							<td>
								<button type="button" class="btn btn-default btn-danger"
										onclick="zlanOp('comment/delete/{{ $comment->id }}', '确定删除吗')">删除</button>
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
