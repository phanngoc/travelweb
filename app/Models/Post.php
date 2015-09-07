<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;

class Post extends Model {

	protected $table = 'posts';

	protected $fillable = [
		'title',
		'content',
		'date',
		'image',
		'author_id',
		'views',
		'is_featured',
		'category_id'
	];

	/**
	 * [getPostFeatured description]
	 * @return [type] [description]
	 */
	public static function getPostFeatured()
	{
		return DB::table('posts')->where('is_featured',1)->take(9)->get();
	}

	/**
	 * [getPostFood description]
	 * @return [type] [description]
	 */
	public static function getPostFood()
	{
		return DB::table('posts')->where('category_id',2)->take(6)->get();
	}

	/**
	 * [getPostLandscape description]
	 * @return [type] [description]
	 */
	public static function getPostLandscape()
	{
		return DB::table('posts')->where('category_id',9)->take(6)->get();
	}
}
