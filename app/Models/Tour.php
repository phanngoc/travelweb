<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\TourImage;
use App\Http\Controllers\HomeController;

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

	/**
	 * [getTourByLandScape description]
	 * @return [type]     [description]
	 */
	public static function getLandScapeAbroad()
	{
		$des = DB::table('destinations')->where('abroad',1)->get();
		return $des;
	}


	/**
	 * [getLandScapeNotAbroad description]
	 * @return [type]     [description]
	 */
	public static function getLandScapeNotAbroad()
	{
		$des = DB::table('destinations')->where('abroad',0)->get();
		return $des;
	}

	/**
	 * [getTourByLandScape description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getTourByLandScape($id)
	{
		$tours = DB::table('tours')->join('tour_destinations','tours.id','=','tour_destinations.tour_id')->select('tours.*', 'tour_destinations.destination_id')->where('destination_id',$id)
				->paginate(8);
		foreach ($tours as $key => $value) {
			$image = TourImage::where('tour_id',$value->id)->first();
			$tours[$key]->image = $image;
		}
		return $tours;
	}

	/**
	 * [getImageTour description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getImageTour($id)
	{
		$tour_images = DB::table('tour_images')->where('tour_id',$id)->get();
		return $tour_images;
	}

	/**
	 * [getDetailAndInfoAround description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getDetailAndInfoAround($id)
	{
		$tour = Tour::find($id);
		$tour->departure = Departure::find($tour->departure_id);
		$tour_relevant = DB::table('tours')->where('departure_id',$tour->departure_id)->take(4)->get();

		foreach ($tour_relevant as $key => $value) {
			$image = TourImage::where('tour_id',$value->id)->first();
			$tour_relevant[$key]->image = $image;
			$tour_relevant[$key]->periodNature = HomeController::periodNature($value->period);
		}

		$tour->tour_relevant = $tour_relevant;
		$tour->destinations = DB::table('destinations')->join('tour_destinations','destinations.id','=','tour_destinations.destination_id')->where('tour_destinations.tour_id',$id)->get();
		return $tour;
	}

}
