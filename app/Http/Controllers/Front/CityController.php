<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Post;
use App\Models\Admin;
use App\Models\User;
use App\Models\Setting;
use App\Models\SubCategory; 
use App\Models\Category; 
use App\Models\ShareAble; 

class CityController extends Controller
{
    public function city_posts($city)
    {

        // $category = Category::where('slugs', $slugs)->first();

        $setting = Setting::orderBy('id','desc')->limit(1)->first();

        $postproperties = DB::table('posts')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
        ->select( 'sub_category', 'icon','slugs','sub_categories.slug', DB::raw('count(sub_category_id) as subcategoriescount'))
        ->groupBy('sub_category_id','icon', 'slugs' ,'sub_category', 'sub_categories.slug')
        ->orderBy('sub_category_id', 'asc')
        ->where('city',$city)
        ->paginate($setting->show_post);   

        // $cities = DB::table('posts')
        // ->select( 'city', DB::raw('count(city) as citiescount'))
        // ->groupBy('city')->orderBy('city', 'asc')->get(); 

        $city = Post::where('city', $city)->first();
         
        // $setting = Setting::orderBy('id','desc')->limit(1)->first();
        // $setting = $setting->show_post ;
        // $setting = (int) $setting;
        // $post = Post::where('city', $city->city)
        // ->where('publish' ,'Yes')->paginate($setting);
        
      //  $propertynames = $propertynames->property;
        // return view('front.city.city',compact('post','postproperties', 'city', 'cities'));

        return view('front.city.city',compact( 'city', 'postproperties' ));
    }

    public function city_post_type($city, $type)
    { 
        
        $subcategory = SubCategory::where('slug',$type)->first();
        $category = Category::where('id',$subcategory->id)->first();
         
        $setting = Setting::orderBy('id', 'asc')->limit(1)->first();
        $post =  Post::where('city', $city)->where('sub_category_id', $subcategory->id)->paginate($setting->show_post);
         
        $city = Post::where('city', $city)->first();
        
        // $post =  post::with('rpostimage')->where('slug', $slug)->first();
        // dd($post);
        // $posts = $post->sub_category_id ;
        // $postid = $post->id ;
        
        // $setting = Setting::orderBy('id', 'asc')->limit(1)->first();
        // $similar = $setting->show_similar;

        // $similar =  Post::where('sub_category_id', $posts)->where('id', '!=', $postid)
        // ->limit($similar)->get();
        
        // $cities = DB::table('posts')
        // ->select( 'city', DB::raw('count(city) as citiescount'))
        // ->groupBy('city')->orderBy('city', 'asc')->get();   
     
        // $mostview = $setting->show_most_views;;
        // $mostview =  Post::orderBy('visitors', 'desc')->limit($mostview)->get();
        // $settingdata = DB::table('settings')->select('show_most_views')->first();
        // if ($post->user_id == 0)
        // $userdata = Admin::where('id',$post->admin_id)->first();
        // else
        // $userdata = User::where('id',$post->user_id)->first();
         
        // return view('front.city.citydetail',compact(  'post', 'similar', 'mostview', 'settingdata', 'userdata','cities'));
        return view('front.city.citydetail',compact( 'city', 'post', 'subcategory','category'));
    }
    

    public function city__detail_post($city,$type ,$slug)
    { 
        $category = SubCategory::where('slug',$type)->first();
        $subcategorybysub = DB::table('posts')
        ->select('sub_category','city', 'sub_categories.slug',   DB::raw('count(sub_category_id) as subcount'))
        ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')   
        ->where('posts.category_id', $category->id) 
        ->groupBy('sub_category','sub_categories.slug', 'sub_category_id','city') 
        ->orderBy("city", 'asc')
        ->get();

        $post =  Post::where('city', $city)->where('slug', $slug)->first();
        $shareable = ShareAble::orderBy('id','asc')->get();
        
        $new_value = $post->visitors+1;
        $post->visitors = $new_value;
        $post->update();

 
        
        $setting = Setting::orderBy('id', 'asc')->limit(1)->first();
 

        $similar =  Post::where('sub_category_id', $post->sub_category_id)->where('id', '!=', $post->id)
        ->limit($setting->show_similar)->get();
        
        $mostview =  Post::orderBy('visitors', 'desc')->limit($setting->show_most_views)->get(); 
        if ($post->user_id == 0 AND $post->name == '')
        $userdata = Admin::where('id',$post->admin_id)->first();
        elseif($post->user_id == 0)
        $userdata = User::where('id',$post->user_id)->first();
        else 
        $userdata = $post->name;
        return view('front.city.city_single',compact(  'post','shareable','subcategorybysub', 'category','similar', 'mostview', 'userdata'));
    }
}
