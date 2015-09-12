<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;

class Departure extends Model {

	protected $table = 'departure';

	protected $fillable = [
		'city',
		'nation',
	];

}
