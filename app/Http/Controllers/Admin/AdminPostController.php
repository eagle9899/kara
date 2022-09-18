<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post; 
use App\Models\PostImage; 
use App\Models\SubCategory;   
use App\Models\Category;   
use App\Models\Subscriber; 
use App\Mail\Websitemail;
use Str; 
use Auth;

use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('rSubcategory')->with('rPostimage')->orderBy('created_at','desc')->get();
        
        return view('admin.post.post_view', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'desc')->get();
        $subcategories = SubCategory::with('rCategory')->orderBy('id', 'asc')->get(); 
     
        if (count($category) == NULL ){
            return redirect()->route('category_view')->with('error' ,'Please add Category') ;
            // return view('admin.category.category')->with('error' ,'Please add Category') ;
        }
        elseif (count($subcategories) == NULL ){
            return redirect()->route('sub_category_view')->with('error' ,'Please add Sub Category') ;
            // return view('admin.sub_category.sub_category')->with('error' ,'Please add Sub Category') ;
        }

        return view('admin.post.post_add', compact('subcategories' )) ;
        // $rcategory = Category::orderBy('id', 'asc')->get();
        // return view('admin.Post.Post_add', compact('rcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    { 
        $validatedData = $request->validated();

        $subcategory = SubCategory::findOrFail($validatedData['sub_category_id']);
        $category = SubCategory::where('id', $subcategory->id)->first();
        
       
        $slug = SlugService::createSlug(Post::class, 'slug',  $request->title);
        $request->validate([
            'pictures.*' => 'required|image|mimes:jpg,gpeg,gif,png,gif,svg', 
        ]); 
      
        $post = $subcategory->rPosts()->create([
            'sub_category_id' => $validatedData['sub_category_id'],
            'category_id' =>  $category->category_id,
            'title' => $validatedData['title'],
            'slug' => $slug,
            'description' => $validatedData['description'], 
            'bedroom' => $validatedData['bedroom'],
            'rooms' => $validatedData['rooms'],
            'bathrooms' => $validatedData['bathrooms'], 
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'meta_title' => $validatedData['title'],
            'meta_keyword' => $validatedData['meta_keyword'], 
            'meta_description' => $validatedData['meta_description'],
            'garage' => $request->garage  ? 'Yes' : 'No',
            'pictures' => $validatedData['pictures'],
            'currency' => $validatedData['currency'],
            'rate' => $validatedData['money'],
            'target' => $validatedData['target'],
            'reason' => $validatedData['reason'],
            'space' => $validatedData['area'], 
            'city' => $validatedData['city'], 
            'publish' => $validatedData['publish'], 
            'admin_id' => Auth::guard('admin')->user()->id ,
            'user_id' =>  0, 
        ]);
        
        $property = SubCategory::where('id', $request->sub_category_id)->first();
        $i = 1;
        if($request->hasFile('pictures')){
            
            foreach ($request->file('pictures') as $imagefile) {
                
                $extenstion = $imagefile->getClientOriginalExtension();
                $finalname = time(). $i++ . '.'. $extenstion;
                $imagefile->move(public_path('uploads/'), $finalname);
                
                //dd($Post->id);
                $post->postImages()->create([
                    'Post_id' => $post->id,
                    'photo' => $finalname,
                    
                ]);
            }
        }
  
        if ($request->send_email_subscriber == 1){
            $subject = "A new ".$property->sub_category." is published";
            $message = "Hi, a new ".$property->sub_category." post has published into our website. Please go to see that post<br>";
            $message .= '<a href="'.route('homedetails',$slug). '" type="button" class="btn btn-primary" target="_blank">';
            $message .= 'What is that?';
            $message .= '</a>';
            $subscribers = Subscriber::where('status', 'Active')->get();
            foreach($subscribers as $row){
                \Mail::to($row->email)->send(new Websitemail($subject, $message));
            }
        }
        return redirect()->route('ad_income_separate',$post->id,  Auth::guard('admin')->user()->id )->with('success','Post added successfully.\n Please add it\'s charges.');
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
        $single_post = Post::with('rPostimage')->where('id',$id)->first();
        $postimage = PostImage::where('Post_id', $id)->get();
        $subcategories = SubCategory::orderBy('id', 'asc')->get(); 
        
        return view('admin.Post.Post_edit', compact('single_post', 'subcategories', 'postimage'));

        // $Posts = Post::with('rsubcategory')->with('rPostimage')->findOrfail($id);
        // return view('admin.Post.Post_edit', compact('Posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
     
        $validatedData = $request->validated();
  
        $Post = Post::findOrFail($id);

        $category = SubCategory::where('id', $request->sub_category_id)->first();
        
        $Post->sub_category_id = $validatedData['sub_category_id'];
        $Post->category_id = $category->category_id;
        $Post->title = $validatedData['title'];
        $Post->description  = $validatedData['description']; 
        $Post->bedroom = $validatedData['bedroom'];
        $Post->rooms  = $validatedData['rooms'];
        $Post->bathrooms = $validatedData['bathrooms'];
        $Post->rate = $validatedData['money'];
        $Post->currency = $validatedData['currency'];
        $Post->space = $validatedData['area']; 
        $Post->space = $validatedData['city']; 
        $Post->phone = $validatedData['phone'];
        $Post->address = $validatedData['address'];
        $Post->meta_title = $validatedData['meta_title'];
        $Post->meta_keyword = $validatedData['meta_keyword'];
        $Post->publish = $validatedData['publish'];
        $Post->targert = $validatedData['target'];
        $post->reason = $validatedData['reason'];
        $Post->meta_description = $validatedData['meta_description'];  
        
        $i = 1;
        if($request->hasFile('pictures')){
            $request->validate([
                'pictures' => 'required',
                'pictures.*' => 'image|mimes:jpg,gpeg,gif,png,gif,svg', 
            ]);            
            $imagefile = new PostImage;
            $extenstion = $request->file('pictures')->extension();
            
            $finalname =  time(). $i++ .'.' .$extenstion;
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('pictures')->move(public_path('uploads/'), $finalname);
            $imagefile->photo = $finalname;
            $imagefile->post_id = $id;
            $imagefile->save();
           
        }
      
        $Post->update();
        return redirect()->route('ad_post_edit', $id)->with('success','Post Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $postimage = PostImage::where('post_id',$id)->first();
        if($postimage != '' ){
            if(file_exists(public_path('uploads/'.$postimage->photo)) AND !empty($postimage->photo)){
                unlink(public_path('uploads/'.$postimage->photo));
            }
        
            $postimage->delete();
        }

        $post = Post::where('id', $id)->first();
        $post->delete();

        return redirect()->back()->with('success', 'Post Image and it\'s data Deleted successfully');
    }
    
    public function delete_photo($id)
    {
        $postimage = PostImage::where('id',$id)->first();
        // dd($Postimage);1
        if(file_exists(public_path('uploads/'.$postimage->photo)) AND !empty($postimage->photo)){
            unlink(public_path('uploads/'.$postimage->photo));
        }
        $postimage->delete();

        return redirect()->back()->with('success', 'Post Image  Deleted successfully');
    }
}
