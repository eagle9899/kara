<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Post;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $postproperties = DB::table('posts')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->select( 'sub_category', 'icon', DB::raw('count(sub_category_id) as subcategoriescount'))
        ->groupBy('sub_category_id','icon' ,'sub_category')
        ->orderBy('sub_category', 'asc')
        ->get();   
  
        
        return view('front.property.property', compact('postproperties'));
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
    public function show($type)
    { 
        $setting = Setting::where('id', 1)->first();
        $setting = $setting->show_post ;
        $setting = (int) $setting;

        $propertynames = Property::select('id','property')->where('property', $type)->first();
        $house = Post::where('property_id', $propertynames->id)->paginate($setting);
        
      //  $propertynames = $propertynames->property;
         
        return view('front.property.type',compact('house','propertynames'));
    }

    public function property_detail($type, $slug)
    { 
        
       $propertynames = Property::select('id','property')->where('property', $type)->first();
       
       $house = Post::where('property_id', $propertynames->id )->where('slug',$slug)->first();
       // $house =  House::with('rhouseimage')->where('slug', $slug)->first();
        
        $new_value = $house->visitors+1;
        $house->visitors = $new_value;
        $house->update();
 
        $similar = Setting::where('id', 1)->first();
        $similar = $setting->show_similar;
        $mostview = $setting->show_most_views;
      
        $similar =  Post::where('category_id', $house->category_id)->where('id', '!=', $house->id)->limit($similar)->get();
        $mostview =  Post::where('property_id', $propertynames->id)->orderBy('visitors', 'desc')->limit($mostview)->get();
        $settingdata = DB::table('settings')->select('show_most_views')->first();
        
        return view('front.property.property-single',compact('house','propertynames','similar', 'settingdata', 'mostview'));
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
