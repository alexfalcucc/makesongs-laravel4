<?php

class Song extends Eloquent {

	protected $guarded = array('title', 'lyrics', 'slug');
}