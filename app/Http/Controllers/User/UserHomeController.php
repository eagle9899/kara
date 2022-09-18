<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Income;
use App\Models\Post;
use Carbon\Carbon;

class UserHomeController extends Controller
{
    
    public function userhome()
    {
        $todaypost = DB::table('posts')->select(DB::raw('*'))->whereRaw('Date(created_at) = CURDATE()')->where('user_id', Auth::guard('user')->user()->id)->count();
           

        $postpublish = DB::table('posts')    
        ->select('sub_category','city', 'posts.id','name', 'reason', 'publish','user_id', 'admin_id', 'rate', 'currency')
        ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')    
        ->where('publish', '=', 'No')->where('user_id',  Auth::guard('user')->user()->id)->orderBy('id', 'asc')->get();
 
        $income = Income::where('user_id',  Auth::guard('user')->user()->id)->orderBy('post_id','asc')->get();
        
        $currency = DB::table('incomes')->select('currency',  DB::raw('sum(amount) as totalamount'))->groupBy('currency' )
        ->whereMonth('created_at', Carbon::now()->month)->where('user_id',  Auth::guard('user')->user()->id)->orderBy('currency')->get(); 
         
        $totalpost = Post::where('user_id',  Auth::guard('user')->user()->id)->count();
         
        $totalcategory = Category::count();
        $totalsubcategory = SubCategory::count();

        $postChart = Post::orderBy('id', 'asc')->get();
        return view('user.home', compact('totalcategory', 'todaypost', 'totalpost',  'totalsubcategory', 'currency','income','postpublish' ));
    }
}
