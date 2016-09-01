<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;

	protected $primaryKey = 'post_id';

	protected $fillable = ['title', 'title_slug', 'url', 'description', 'type', 'user_id', 'sort_order', 'active'];

	protected $dates = ['deleted_at'];

	public static $rules = [
		"title" => "required",
	];

	// Relationships
	public function tags() {
			$this->belongsToMany('App\Models\Tag');
	}

}
