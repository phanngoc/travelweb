<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tour;
use App\Models\Category;
use App\User;
use Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $postfeatures = Post::getPostFeatured();
        $postfoods = Post::getPostFood();
        $postlandscapes = Post::getPostLandscape();
        $comments = Comment::getLastComment();
        $tours = Tour::getFeatureTour();
      
        return view('home.home',compact('postfeatures','postfoods','postlandscapes','comments','tours'));
    }

    /**
     * [category description]
     * @param  [type] $cate_id [description]
     * @return [type]          [description]
     */
    public function category($cate_id)
    {
        $postfeatures = Post::getPostFeaturedWidget();
        $posts = Post::getPostBelongCategory($cate_id);
        $postlandscapes = Post::getPostLandscape();
        $randomposts = Post::getRandomPost();
        return view('home.category',compact('posts','postfeatures','postlandscapes','randomposts'));
    }

    /**
     * [postdetail description]
     * @param  [type] $post_id [description]
     * @return [type]          [description]
     */
    public function postdetail($post_id)
    {
        $post = Post::find($post_id);
        $post->category = Category::find($post->category_id);
        $randomposts = Post::getRandomPost();
        $postfeatures = Post::getPostFeaturedWidget();
        $commentposts = Comment::getCommentByPostId($post_id);
        return view('home.detailpost',compact('post','randomposts','postfeatures','commentposts'));
    }


    public function submitCommentPostDetail($post_id,$more,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fullname' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        if($validator->fails())
        {
          return redirect()->route('detailpost',array('id'=>$post_id,'more'=>$more))->withErrors($validator,'post')->withInput();  
        }

        $user = User::create([
            'fullname'=>$request->input('fullname'),
            'email'=>$request->input('email'),
            'avatar'=> 'avatar.png',
        ]);

        Comment::create([
            'comment' => $request->input('comment'),
            'user_id' => $user->id,
            'post_id' => $post_id,
            'date'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('detailpost',array('id'=>$post_id,'more'=>$more));  
    }

    /**
     * [tour description]
     * @return [type] [description]
     */
    public function tour()
    {
        $featuretours = Tour::getFeatureTour();
        foreach ($featuretours as $key => $value) {
            $featuretours[$key]->periodNature = $this->periodNature($value->period);
        }

        $newtours = Tour::getNewTour();
        foreach ($newtours as $key => $value) {
            $newtours[$key]->periodNature = $this->periodNature($value->period);
        }
        return view('home.tour',compact('featuretours','newtours'));
    }

    /**
     * [periodNature description]
     * @param  [type] $num [description]
     * @return [type]      [description]
     */
    public function periodNature($num)
    {
        $result = "";
        $day = floor($num / 2);
        $period = $num % 2;
        if($day == 1 && $period == 0)
        {
            $result = "Trong ngày";
        }
        else if($period == 0)
        {
            $result = $day." ngày ".$day." đêm";
        }
        else if($period == 1)
        {
            $result = $day." ngày 1 đêm";   
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
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
