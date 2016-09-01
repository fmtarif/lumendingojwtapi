<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model {
	use SoftDeletes;

	protected $primaryKey = 'tag_id';

	protected $fillable = ['name', 'name_raw', 'tag_slug', 'count', 'type', 'sort_order', 'active'];

	protected $dates = ['deleted_at'];

	public static $rules = [
			"name" => "required",
	];

	// Relationships
	public function posts() {
			$this->belongsToMany('App\Models\Post');
	}


}
