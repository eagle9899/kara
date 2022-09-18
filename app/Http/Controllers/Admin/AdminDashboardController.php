<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use App\Models\user;
use App\Models\Subscriber;
use App\Models\Income;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;  
class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = DB::table('posts')->select(DB::raw('*'))->whereRaw('Date(created_at) = CURDATE()')->count();
        // $previous = DB::table('posts')->select(DB::raw('id'))->whereRaw('created_at', '=', Carbon::yesterday())->count();
        $previous = DB::table('posts')->select(DB::raw('id'))->whereRaw('Date(created_at) = CURDATE()-1')->count();
        
        // $post = Post::where('created_at','>=',Carbon::today())->count();
        
        $adminpost = Post::where('admin_id', '<>', '0')->whereRaw('Date(created_at) = CURDATE()')->count();
        $userpost = Post::where('user_id', '<>', '0')->whereRaw('Date(created_at) = CURDATE()')->count();
        $subscriber = Subscriber::where('status', 'Active')->count();

        $postpublish = DB::table('posts')    
        ->select('sub_category','city', 'posts.id','name', 'reason', 'publish','user_id', 'admin_id', 'rate', 'currency')
        ->join('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')    
        ->where('publish', '=', 'No')->orderBy('id', 'asc')->get();
 
        $income = Income::orderBy('post_id','asc')->get();
        
        $currency = DB::table('incomes')->select('currency',  DB::raw('sum(amount) as totalamount'))->groupBy('currency' )
        ->whereMonth('created_at', Carbon::now()->month)->orderBy('currency')->get(); 
         
        $totalpost = Post::count();
        $totaluser = User::count();
        $totalcategory = Category::count();
        $totalsubcategory = SubCategory::count();

        $postChart = Post::orderBy('id', 'asc')->get();
          
        return view('admin.home', compact('post', 'adminpost', 'totalpost','totalsubcategory', 'totalcategory',
        'totaluser','userpost','currency','income', 'subscriber', 'postpublish', 'postChart'));
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
