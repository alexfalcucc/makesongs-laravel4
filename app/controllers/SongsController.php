<?php

use Illuminate\Http\Request;

use App\Song;

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
	public function store()
	{
		//
	}


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
		$song = DB::table('songs')->whereSlug($slug)->first();
		// $get_title = \Request::input('title');
		// $song->fill([\Request::input()])->save();
		return Redirect::to('songs');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
