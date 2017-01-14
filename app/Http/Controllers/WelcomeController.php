<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('comments/index')->with([
			'comments' => Comment::orderBy('updated_at', 'desc')->paginate(20),
		]);
	}

	public function postIndex(Request $request)
	{
		$content = $request->input('content');
		if ($content) {
			$data = [
					'ip' => $request->ip(),
					'content' => $content,
			];
			//dd($data);
			Comment::create($data);
		}

		return redirect('/');
	}
}
