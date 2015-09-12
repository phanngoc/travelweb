<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;

class Destination extends Model {

	protected $table = 'destinations';

	protected $fillable = [
		'city',
		'nation',
	];

}
