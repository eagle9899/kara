<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post; 
use App\Models\PostImage; 
//use App\Models\SubCategory; 
use App\Models\Category;  
use App\Models\SubCategory;  
use App\Models\Subscriber; 
use App\Mail\Websitemail;
use Str; 
use Auth;

use Cviebrock\EloquentSluggable\Services\SlugService;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    { 
        $posts = Post::with('rCategory')->with('rPostimage')->where('user_id', Auth::guard('user')->user()->id)
        ->get(); 
        return view('user.post.post_view', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $properties = Property::orderBy('id', 'asc')->get();
        
        $cities = City::orderBy('id', 'asc')->get();
        return view('user.post.post_add', compact('categories' ,'properties', 'cities')) ;
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
        $category = Category::where('id', $subcategory->id)->first();
        
        $slug = SlugService::createSlug(Post::class, 'slug',  $request->title);
        $request->validate([
            'pictures.*' => 'required|image|mimes:jpg,gpeg,gif,png,gif,svg', 
        ]); 
      
        $post = $subcategory->rPosts()->create([
            'sub_category_id' => $validatedData['sub_category_id'],
            'category_id' => $category->id,
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
            'space' => $validatedData['area'], 
            'city' => $validatedData['city'],  
            'user_id' =>  Auth::guard('user')->user()->id,
            'admin_id' =>  0,
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
        return redirect()->route('user_income_separate',$post->id,  Auth::guard('user')->user()->id )->with('success','Post added successfully.\n Please add it\'s charges.');
      //  return redirect()->route('ad_post_view')->with('success','Post added successfully');
        
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
        $single_Post = Post::with('rPostimage')->where('id',$id)->where('user_id', Auth::guard('user')->user()->id)->first(); 
        if(!$single_Post){
            return redirect()->back();
        }
        $Postimage = PostImage::where('Post_id', $id)->get();
        $categories = Category::orderBy('id', 'asc')->get();
        $properties = Property::orderBy('id', 'asc')->get();
        $cities = City::orderBy('id', 'asc')->get();
        return view('user.post.post_edit', compact('single_Post', 'categories', 'cities', 'properties', 'Postimage'));
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
        
        $Post->category_id = $validatedData['category_id'];
        $Post->title = $validatedData['title'];
        $Post->description  = $validatedData['description']; 
        $Post->bedroom = $validatedData['bedroom'];
        $Post->rooms  = $validatedData['rooms'];
        $Post->bathrooms = $validatedData['bathrooms'];
        $Post->rate = $validatedData['money'];
        $Post->currency = $validatedData['currency'];
        $Post->space = $validatedData['area'];
        $Post->property_id = $validatedData['property_id'];
        $Post->phone = $validatedData['phone'];
        $Post->address = $validatedData['address']; 
        $Post->city_id = $validatedData['city']; 
        
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
            $imagefile->Post_id = $id;
            $imagefile->save();
           
        }
      
        $Post->update();
        return redirect()->route('user_post_view', $id)->with('success','Post Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Postimage = PostImage::where('Post_id',$id)->where('user_id',Auth::guard('user'->user()->id))->first();
        if($Postimage != '' ){
            if(file_exists(public_path('uploads/'.$Postimage->photo)) AND !empty($Postimage->photo)){
                unlink(public_path('uploads/'.$Postimage->photo));
            }
        
            $Postimage->delete();
        }

        $Post = Post::where('id', $id)->first();
        $Post->delete();

        return redirect()->back()->with('success', 'Post Image and it\'s data Deleted successfully');
    }
    public function user_delete_photo($id)
    {
        $Postimage = PostImage::where('id',$id)->first();
        // dd($Postimage);1
        if(file_exists(public_path('uploads/'.$Postimage->photo)) AND !empty($Postimage->photo)){
            unlink(public_path('uploads/'.$Postimage->photo));
        }
        $Postimage->delete();

        return redirect()->back()->with('success', 'Post Image and it\'s data Deleted successfully');
    }
}
