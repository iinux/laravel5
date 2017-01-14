<?php namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.index')->with([
			'comments' => Comment::orderBy('created_at', 'desc')->paginate(20),
		]);
	}
	
	public function showComment($id)
	{
		return view('comments.show')->with([
			'comment' => Comment::findOrFail($id),
		]);
		
	}

	public function editComment($id, Request $request)
	{
		$comment = Comment::findOrFail($id);
		$comment->content = $request->input('content');
		$comment->save();

		return redirect('/home');
	}

	public function addComment(Request $request)
	{
		$content = $request->input('content');
		Comment::create([
			'content' => $content,
		]);

		return redirect('/home');
	}

	public function deleteComment($id)
	{
		$comment = Comment::findOrFail($id);
		$comment->delete();

		return 'OK';
	}

}
