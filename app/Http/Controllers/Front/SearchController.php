<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Setting;

class SearchController extends Controller
{
    public function searchresult(Request $request)
    {
        $post = Post::orderBy('id', 'desc');
      
        if ($request->categorysearch !=''){
            $category = Category::where('name', $request->categorysearch)->first();
        }
        if ($request->subcategorysearch != '') {
            $subcategory = SubCategory::where('sub_category', $request->subcategorysearch)->first();
        }
        
        if ($request->categorysearch !='' AND $request->subcategorysearch !=''){  
            $post = $post->where('title', 'like', '%'. $request->searchvalue .'%')
            ->where('sub_category_id',$subcategory->id);//->where('subcategory_id', $subcategory->id); 
        }
        
        // elseif  ( $request->categorysearch !='' AND $request->subcategorysearch ==''){ 
        //     $post = $post->where('title', 'like', '%'. $request->searchvalue .'%')
        //     ->where('category_id',$category->id);
        // } 
        else {
            $post = $post->where('title', 'like', '%'. $request->searchvalue .'%') ;
        } 


        $setting = Setting::where('id', 1)->first();
        $setting = $setting->show_post ;
        $setting = (int) $setting;

        
        $post = $post
        ->where('publish' ,'Yes')->paginate($setting); 
        
        return view('front.search', compact('post'));
    }
}
