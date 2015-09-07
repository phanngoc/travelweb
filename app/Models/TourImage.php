<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;

class TourImage extends Model {

	protected $table = 'tour_images';

	protected $fillable = [
		'name',
		'link',
		'tour_id',
	];	
}
