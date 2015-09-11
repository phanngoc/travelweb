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

	/**
	 * [getPostBelongCategory description]
	 * @param  [type] $cate_id [description]
	 * @return [type]          [description]
	 */
	public static function getPostBelongCategory($cate_id)
	{
		return DB::table('posts')->where('category_id',$cate_id)->paginate(6);
	}

	/**
	 * [getRandomPost description]
	 * @return [type] [description]
	 */
	public static function getRandomPost()
	{
		return Post::orderByRaw(DB::raw('RAND()'))->limit(5)->get();
	}

	/**
	 * [getPostFeaturedWidget description]
	 * @return [type] [description]
	 */
	public static function getPostFeaturedWidget()
	{
		return DB::table('posts')->where('is_featured',1)->take(5)->get();
	}
}
