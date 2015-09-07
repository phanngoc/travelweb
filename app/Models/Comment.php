<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;

class Comment extends Model {

	protected $table = 'comments';

	protected $fillable = [
		'comment',
		'user_id',
		'post_id',
		'date'
	];

	/**
	 * get recent comments
	 * @return [type] [description]
	 */
	public static function getLastComment()
	{
		$comments = DB::table('comments')->join('users','users.id','=','comments.user_id')
			->join('posts','posts.id','=','comments.post_id')->get();
		return $comments;	
	}
	
}
