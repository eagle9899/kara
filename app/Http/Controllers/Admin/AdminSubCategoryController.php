<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory; 
use App\Models\Category; 

use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order','asc')->get();
        return view('admin.sub_category.sub_category', compact('sub_categories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('admin.sub_category.sub_add_category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([  
            'subcategory' => 'required',
            'order' => 'required', 
        ]); 
        $slug = SlugService::createSlug(SubCategory::class, 'slug',  $request->subcategory);
         
      
        $subcategory = new SubCategory;
        $subcategory->sub_category= $request->subcategory;   
        $subcategory->show_on_menu = $request->showmenu;
        $subcategory->slug = $slug;
        $subcategory->sub_category_order = $request->order;
        $subcategory->category_id = $request->category_name;
    
        $subcategory->save();
        
        return redirect()->route('sub_category_view')->with('success','Sub Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $single_sub_category = SubCategory::where('id',$id)->first();
        $categories = Category::orderBy('id','asc')->get();
        return view('admin.sub_category.sub_edit_category', compact('single_sub_category', 'categories'));
        
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
        $categories = SubCategory::where('id',$id)->first();
        $request->validate([  
            'subcategory_name' => 'required',
            'ordering' => 'required', 
        ]);
 
        
        $categories->sub_category_order = $request->subcategory_name;  
        $categories->show_on_menu = $request->showmenuu;
        $categories->category_id = $request->category;
        $categories->sub_category_order = $request->ordering;
    
        $categories->update();
        return redirect()->route('sub_category_view')->with('success','Sub Category updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SubCategory::where('id',$id)->first();
        
        $category->delete();

        return redirect()->back()->with('success', 'Sub Category Deleted successfully');
    }
}
