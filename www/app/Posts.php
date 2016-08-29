<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	protected $fillable = ["link", "title", "description"];

	protected $dates = [];

	public static $rules = [
		"title" => "required",
	];

	// Relationships

}
