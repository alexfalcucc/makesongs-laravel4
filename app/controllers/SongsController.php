<?php

use Illuminate\Http\Request;

use App\Song;

use App\Requests\CreateSongRequest;

class SongsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	// public function __construct(Song $song) {

	// 	$this->song = $song;

	// }


	public function index()
	{
		$songs = DB::table('songs')->get();
		return View::make('songs.index')->with('songs', $songs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$song = DB::table('songs')->whereSlug($slug)->first();
		return View::make('songs.show')->with('song', $song);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$song = DB::table('songs')->whereSlug($slug)->first();
		return View::make('songs.edit')->with('song', $song);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug)
	{

		// $song = DB::table('songs')->whereSlug($slug)->first();
		// $new_song_data=array($song->title => Input::get('title'));
		// $song->fill($new_song_data)->save();
		$get_title = \Request::input('title');
		$get_author = \Request::input('author');
		$get_slug = \Request::input('slug');
		$get_lyrics = \Request::input('lyrics');
		$song = DB::table('songs')->whereSlug($slug)->update(array(
			'title' => $get_title, 'author' => $get_author, 
			'slug' => $get_slug, 'lyrics' => $get_lyrics));
		// $song->fill([\Request::input()])->save();
		return Redirect::to('songs');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($slug)
	{
		$song = DB::table('songs')->whereSlug($slug);
		$song->delete();
		return Redirect::to('songs');
	}

	public function showCreate() {
		return View::make('songs.create');
	}

	public function store() {
		$validation = Validator::make(Input::all(), ['title' => 'required', 'slug' => 'required']);

		if ($validation->fails()) {
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		$new_song = DB::table('songs')->insert(
			array(
				'author' => Input::get('author'),
				'title' => Input::get('title'),
				'lyrics' => Input::get('lyrics'),
				'slug' => Input::get('slug')
				));
		return Redirect::to('songs');
	}


}
