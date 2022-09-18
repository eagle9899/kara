<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Post;
use App\Models\Setting;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    { 
        $setting = Setting::where('id', 1)->first();
        $setting = $setting->show_post ;
        $setting = (int) $setting;
        $house =  Post::orderBy('id', 'desc')->where('publish' ,'Yes')->paginate($setting);
        
        return view('front.home', compact( 'house'));
    }

    public function get_city_by_category($id)
    {
        $city_data = City::where('property_id', $id)->get();
        $response = "<option value=''>Select City</option>";
        foreach($cityproperty as $item ){
            $response .= '<option value="'. $item->id. '">'. $item->city .'</option>';

        }
        return response()->json(['city_data' => $response]);
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
        $house =  Post::where('slug', $id)->get(); 
      //  return view('front.single-property',compact('house'));
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
