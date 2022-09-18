<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB; 
use App\Models\Country;
use App\Models\Category;
use App\Models\PageAboutFaq;
use App\Models\PagePrivacyTerms;
use App\Models\DisclaimirLogin;
use App\Models\SocialIcon;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\OurAddress;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
 
        $sub_categories = DB::table('posts')
        ->leftJoin('sub_categories', 'posts.sub_category_id', '=', 'sub_categories.id')
        ->select( 'sub_category','sub_category_id', DB::raw('count(sub_category_id) as sub_categoriescount'))
        ->groupBy('sub_category_id', 'sub_category')->orderBy('sub_category', 'asc')->get();   
        
         
        // $cities = DB::table('posts')
        // ->leftJoin('cities', 'posts.city_id', '=', 'cities.id')
        // ->select( 'city', DB::raw('count(city_id) as citiescount'))
        // ->groupBy('city_id', 'city')->orderBy('city', 'asc')->get();   


        $categories = Category::where('show_on_menu', 'Show')->orderBy('order', 'asc')->get();  

        $pagefaqabout = PageAboutFaq::first();   

        $pageprivacyterms = PagePrivacyTerms::first();   
        $pagedisclaimerlogincontact = DisclaimirLogin::first(); 

        $social_icon_show = SocialIcon::orderBy('id', 'asc')->get();   
        $setting_data = Setting::where('id', 1)->first();   

        $our_address = OurAddress::orderBy('id', 'asc')->first();   
  
        view()->share('global_sub_categories', $sub_categories);
        view()->share('global_categories', $categories); 
        view()->share('global_faq_about', $pagefaqabout);
        view()->share('global_terms_privacy', $pageprivacyterms);
        view()->share('global_disclaimer_login_contact', $pagedisclaimerlogincontact);
        view()->share('global_social_icon_show', $social_icon_show);
        view()->share('global_setting_data', $setting_data);
        view()->share('global_our_address', $our_address);
    }
}
