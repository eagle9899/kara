<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use App\Models\Setting;
use App\Models\ShareAble;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function category($slugs)
    { 
        
        // $postsubcategories = DB::table('posts')
        // ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        // // ->join('post_images', 'posts.id', '=', 'post_images.post_id')  
        // ->join('categories', 'sub_categories.category_id', '=', 'categories.id')  
        // ->where('categories.slugs',$slugs)
        // ->orderBy('sub_category_id', 'asc') 
        // ->get();  
        $category = Category::where('slugs', $slugs)->first();
        $categorynames = Category::select('name')->where('slugs', $slugs)->first();
        
        $setting = Setting::where('id', 1)->first();
        $setting = $setting->show_post ;
         
        $posts =  Post::where('category_id', $category->id)
        ->where('publish' ,'Yes')->paginate($setting); 

        $postproperties = DB::table('posts')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
        ->select( 'sub_category', 'icon','slugs','sub_categories.slug', DB::raw('count(sub_category_id) as subcategoriescount'))
        ->groupBy('sub_category_id','icon', 'slugs' ,'sub_category', 'sub_categories.slug')
        ->orderBy('sub_category', 'asc')
        ->where('posts.category_id',$category->id)
        ->get();   
 
        return view('front.category',compact('posts','category','postproperties', 'categorynames'));
    } 
    
    public function category_details($category, $slugs)
    { 

        $category = Category::where('slugs',$category)->first();
 
        $subcategory =  SubCategory::where('slug', $slugs)->first();
        $setting = Setting::select('show_post')->first();
        
        $posts =  Post::where('sub_category_id', $subcategory->id)
        ->where('publish' ,'Yes')->paginate($setting->show_post);
                  
        
        return view('front.categorydetail',compact( 'posts',  'subcategory', 'category'));
    }


    public function category_by_sub_details($category, $subcategory, $slugs)
    { 

        $shareable = ShareAble::orderBy('id','asc')->get();
        $category = Category::where('slugs',$category)->first();
        $subcategory = SubCategory::where('slug',$subcategory)->first();

        $post =  Post::where('sub_category_id', $subcategory->id)->where('slug', $slugs)->first(); 
         
        $new_value = $post->visitors+1;
        $post->visitors = $new_value;
        $post->update();

         
        $setting = Setting::where('id', 1)->first();
       

        $similar =  Post::where('sub_category_id', $post->sub_category_id)->where('id', '!=', $post->id)->limit($setting->show_similar)->get();
         

        $subcategorybysub = DB::table('posts')
        ->select('sub_category','city', 'sub_categories.slug',   DB::raw('count(sub_category_id) as subcount'))
        ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')   
        ->where('posts.category_id', $category->id) 
        ->groupBy('sub_category','sub_categories.slug', 'sub_category_id','city') 
        ->orderBy("city", 'asc')
        ->get();
       
        $mostview =  Post::orderBy('visitors', 'desc')->limit($setting->show_most_views)->get(); 
        if ($post->user_id == 0 AND $post->name == '')
        $userdata = Admin::where('id',$post->admin_id)->first();
        elseif($post->user_id == 0)
        $userdata = User::where('id',$post->user_id)->first();
        else 
        $userdata = $post->name;
        
        return view('front.subcategory_detail',compact( 'post', 'similar', 'mostview', 'shareable' ,'userdata', 'subcategorybysub'));
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
