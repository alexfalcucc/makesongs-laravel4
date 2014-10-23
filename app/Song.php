<?php

class Song extends \Eloquent {
	protected $fillable = [
		'title', 'lyrics', 'slug'
	];
}