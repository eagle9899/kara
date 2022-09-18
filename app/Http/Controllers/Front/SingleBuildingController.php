<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Models\Post;
use App\Models\PostImage; 
use App\Models\Admin;
use App\Models\User;
use App\Models\Setting;
use App\Models\Subcategory;
use App\Models\ShareAble;

class SingleBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function detail($slug)
    { 

        $shareable = ShareAble::orderBy('id','asc')->get();
        
        $setting = Setting::select('show_post')->first();
        
        $post =  Post::where('slug', $slug)->first();
        $subcategory =  SubCategory::where('id', $post->sub_category_id)->first();
       // $post =  post::with('rpostimage')->where('slug', $slug)->first();
       
        $new_value = $post->visitors+1;
        $post->visitors = $new_value;
        $post->update();

        $subcategorybysub = DB::table('posts')
        ->select('sub_category','city', 'sub_categories.slug',   DB::raw('count(sub_category_id) as subcount'))
        ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')   
        ->where('posts.category_id', $post->category_id) 
        ->groupBy('sub_category','sub_categories.slug', 'sub_category_id','city') 
        ->orderBy("city", 'asc')
        ->get();

        $posts = $post->sub_category_id ;
        $postid = $post->id ;
        
        $setting = Setting::where('id', 1)->first();
        $similar = $setting->show_similar;

        $similar =  Post::where('sub_category_id', $posts)->where('id', '!=', $postid)->limit($similar)->get();
        
        $cities = DB::table('posts')
        ->select( 'city', DB::raw('count(city) as citiescount'))
        ->groupBy('city')->orderBy('city', 'asc')->get();   
     
        $mostview = $setting->show_most_views;;
        $mostview =  Post::orderBy('visitors', 'desc')->limit($mostview)->get();
        $settingdata = DB::table('settings')->select('show_most_views')->first();
        if ($post->user_id == 0 AND $post->name == '')
        $userdata = Admin::where('id',$post->admin_id)->first();
        elseif($post->user_id == 0)
        $userdata = User::where('id',$post->user_id)->first();
        else 
        $userdata = $post->name;
         
        return view('front.single-property',compact( 'post', 'shareable','subcategorybysub', 'similar', 'mostview', 'settingdata', 'userdata','cities'));
    }
    public function enquire_data(Type $var = null)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
