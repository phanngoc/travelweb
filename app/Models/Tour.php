<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\TourImage;

class Tour extends Model {

	protected $table = 'tours';

	protected $fillable = [
		'code',
		'title',
		'content',
		'departure_id',
		'departure_time',
		'period',
		'price_include',
		'price_not_include',
		'regulation_destroy_tour',
		'note',
		'price'
	];

	/**
	 * get recent comments
	 * @return [type] [description]
	 */
	public static function getFeatureTour()
	{
		$tours = DB::table('tours')->where('is_featured',1)->take(6)->get();
		foreach ($tours as $key => $value) {
			$image = TourImage::where('tour_id',$value->id)->first();
			$tours[$key]->image = $image;
		}
		return $tours;	
	}
	
	/**
	 * [getNewTour description]
	 * @return [type] [description]
	 */
	public static function getNewTour()
	{
		$tours = DB::table('tours')->orderBy('departure_time', 'desc')->take(6)->get();

		foreach ($tours as $key => $value) {
			$image = TourImage::where('tour_id',$value->id)->first();
			$tours[$key]->image = $image;
		}
		return $tours;	
	}
}
