<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;

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

	public static function getCommentByPostId($post_id)
	{
		$comments = DB::table('comments')->where('post_id',$post_id)->get();
		foreach ($comments as $key => $value) {
			$comments[$key]->user = User::find($value->user_id);
		}
		return $comments;
	}
	
}
