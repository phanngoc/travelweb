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

	/**
	 * [getTourSearch description]
	 * @param  [type] $id_depart [description]
	 * @param  [type] $id_desti  [description]
	 * @return [type]            [description]
	 */
	public static function getTourSearch($id_depart,$id_desti)
	{
		$table = DB::table('tours');
		if($id_depart != 0)
		{
			$table = $table->where('departure_id',$id_depart);
		}

		if($id_desti != 0)
		{
			$table = $table->join('tour_destinations','tours.id','=','tour_destinations.tour_id')->select('tours.*', 'tour_destinations.destination_id')->where('destination_id',$id_desti);
		}
		$tours = $table->paginate(8);
		foreach ($tours as $key => $value) {
			$image = TourImage::where('tour_id',$value->id)->first();
			$tours[$key]->image = $image;
		}
		return $tours;
	}
}
