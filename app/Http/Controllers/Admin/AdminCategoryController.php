<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category;
        $request->validate([  
            'category' => 'required',
            'order' => 'required', 
        ]);
 
        $slug = SlugService::createSlug(Category::class, 'slugs',  $request->category);
        $categories->name = $request->category;  
        $categories->show_on_menu = $request->showmenu;
        $categories->order = $request->order;
        $categories->slugs = $slug;
    
        $categories->save();
        
        return redirect()->route('category_view')->with('success','Category added successfully');
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
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit_category', compact('category'));
        
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
        $categories = Category::where('id',$id)->first();
        $request->validate([  
            'category_name' => 'required',
            'ordering' => 'required',  
        ]);
 
        // $slug = SlugService::Slug(Category::class, 'slugs',  $request->category);
        $categories->name = $request->category_name;  
        $categories->show_on_menu = $request->showmenuu;
        $categories->order = $request->ordering;
        // $categories->slugs = $slug;
    
        $categories->update();
        
        return redirect()->route('category_view')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::where('id',$id)->first();
        $subcategory = SubCategory::where('category_id',$id)->get();
        if(count($subcategory) > 0){

            return redirect()->back()->with('error', 'You are not allowed th delete this Category It has SubCategory');
        }
        
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted successfully');
    }
}
