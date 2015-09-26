<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Departure;
use App\Models\Destination;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $destinations = $request->input('destinations');
        $departures = $request->input('departures');

        $tours = Tour::getTourSearch($departures,$destinations);

        foreach ($tours as $key => $value) {
            $tours[$key]->periodNature = HomeController::periodNature($value->period);
        }
        
        $destinationsData = Destination::all();
        $departuresData = Departure::all();
        $landScapeAbroad = Tour::getLandScapeAbroad();
        $landScapeNotAbroad = Tour::getLandScapeNotAbroad();
        return view('home.searchtour',compact('tours','destinationsData','departuresData','landScapeAbroad','landScapeNotAbroad'));
    }

    /**
     * [landscape description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function landscape($id)
    {
        $tours = Tour::getTourByLandScape($id);
        foreach ($tours as $key => $value) {
            $tours[$key]->periodNature = HomeController::periodNature($value->period);
        }
        $destinationsData = Destination::all();
        $departuresData = Departure::all();
        $landScapeAbroad = Tour::getLandScapeAbroad();
        $landScapeNotAbroad = Tour::getLandScapeNotAbroad();
        return view('home.searchtour',compact('tours','destinationsData','departuresData','landScapeAbroad','landScapeNotAbroad'));
    }

    /**
     * [detailtour description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function detailtour($id)
    {
        $tourimages = Tour::getImageTour($id);
        $tour = Tour::getDetailAndInfoAround($id);
        return view('home.detailtour',compact('tourimages','tour'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
