<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminLoginController; 
use App\Http\Controllers\Admin\AdminAdvertisementController; 
use App\Http\Controllers\Admin\AdminPageAdvertiseController; 
use App\Http\Controllers\Admin\AdminCategoryController; 
use App\Http\Controllers\Admin\AdminSubCategoryController;  
use App\Http\Controllers\Admin\AdminSettingController; 
use App\Http\Controllers\Admin\PhotosController; 
use App\Http\Controllers\Admin\AdminCityCountryController;
use App\Http\Controllers\Admin\AdminPageAboutController;
use App\Http\Controllers\Admin\AdminTermsPrivacyController;
use App\Http\Controllers\Admin\AdminDisclaimirLoginController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminSocialIconController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminOurAddressController;
use App\Http\Controllers\Admin\AdminShareAbleController;
use App\Http\Controllers\Admin\AdminIncomeController;


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DisclaimirController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\PropertyController;
use App\Http\Controllers\Front\SingleBuildingController;
use App\Http\Controllers\Front\TermsConditionController;
use App\Http\Controllers\Front\PrivacyPolicyController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\CityController;
use App\Http\Controllers\Front\SearchController; 
use App\Http\Controllers\Front\LoginController;


use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\User\UserPostPhotoController;
use App\Http\Controllers\User\UserIncomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.layouts.app');
// });
// Rou
// Route::prefix('admin')->middleware('admin:admin')->group(function (){
//     Route::get('home', ([AdminDashboardController::class, 'index'])->name('admin_home') );
// });
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');



Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('user_forget_password');

// Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('user_forget_password');
Route::post('/forget-password-submit', [LoginController::class, 'forget_password_submit'])->name('user_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('user_reset_password');
Route::post('/reset-password-submit', [LoginController::class, 'reset_password_submit'])->name('user_reset_password_submit');


Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin_profile_submit')->middleware('admin:admin');
Route::get('/admin/cars/create', [AdminCarController::class, 'create']);
Route::post('/admin/cars/create', [AdminCarController::class, 'store'])->name('add_cars');

// home ads
Route::get('/admin/advertise/ads-view', [AdminAdvertisementController::class, 'index'])->name('ad_home_ad_view')->middleware('admin:admin'); 
Route::get('/admin/advertise/ads-create', [AdminAdvertisementController::class, 'create'])->name('ad_home_ad_create')->middleware('admin:admin');  
Route::post('/admin/advertise/ads-store', [AdminAdvertisementController::class, 'store'])->name('ad_home_ad_store')->middleware('admin:admin');  
Route::get('/admin/advertise/ads-edit/{id}', [AdminAdvertisementController::class, 'edit'])->name('ad_home_ad_edit')->middleware('admin:admin');
Route::post('/admin/advertise/ads-update/{id}', [AdminAdvertisementController::class, 'update'])->name('ad_home_ad_update')->middleware('admin:admin');
Route::get('/admin/advertise/ads-delete/{id}', [AdminAdvertisementController::class, 'destroy'])->name('ad_home_ad_delete')->middleware('admin:admin');

// page ads
Route::get('/admin/advertise/page-ads-view', [AdminPageAdvertiseController::class, 'index'])->name('ad_page_ad_view')->middleware('admin:admin'); 
Route::get('/admin/advertise/page-ads-create', [AdminPageAdvertiseController::class, 'create'])->name('ad_page_ad_create')->middleware('admin:admin');
Route::post('/admin/advertise/page-ads-store', [AdminPageAdvertiseController::class, 'store'])->name('ad_page_ad_store')->middleware('admin:admin');  
Route::get('/admin/advertise/page-ads-edit/{id}', [AdminPageAdvertiseController::class, 'edit'])->name('ad_page_ad_edit')->middleware('admin:admin');
Route::post('/admin/advertise/page-ads-update/{id}', [AdminPageAdvertiseController::class, 'update'])->name('ad_page_ad_update')->middleware('admin:admin');
Route::get('/admin/advertise/page-ads-delete/{id}', [AdminPageAdvertiseController::class, 'destroy'])->name('ad_page_ad_delete')->middleware('admin:admin');

// photos
Route::get('/admin/photos/photos-view/', [PhotosController::class, 'index'])->name('ad_post_photos_view')->middleware('admin:admin');
Route::get('/admin/photos/photos-delete/{id}', [PhotosController::class, 'destroy'])->name('ad_photos_delete')->middleware('admin:admin');
  
// category 
Route::get('/admin/category/show', [AdminCategoryController::class, 'index'])->name('category_view')->middleware('admin:admin'); 
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('category_create')->middleware('admin:admin'); 
Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('category_store')->middleware('admin:admin'); 
Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category_edit')->middleware('admin:admin'); 
Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('category_update')->middleware('admin:admin'); 
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('category_delete')->middleware('admin:admin');
 


//faq
Route::get('/admin/faqpage/faq', [AdminFaqController::class, 'adminfaqview'])->name('ad_faqpage_ad_view')->middleware('admin:admin'); 
Route::post('/admin/faqpage/store', [AdminFaqController::class, 'adminfaqinsert'])->name('ad_faqpage_ad_store')->middleware('admin:admin'); 
Route::post('/admin/faqpage/update/{id}', [AdminFaqController::class, 'adminfaqupdate'])->name('ad_faqpage_ad_update')->middleware('admin:admin'); 
Route::get('/admin/faqpage/destroy/{id}', [AdminFaqController::class, 'adminfaqdestroy'])->name('ad_faqpage_ad_destroy')->middleware('admin:admin'); 

//  Admin/page about faq 
Route::get('/admin/about/about', [AdminPageAboutController::class, 'aboutview'])->name('ad_about_ad_view')->middleware('admin:admin');   
Route::post('/admin/about/store', [AdminPageAboutController::class, 'aboutadd'])->name('ad_about_ad_store')->middleware('admin:admin');  
Route::post('/admin/about/about-update/{id}', [AdminPageAboutController::class, 'aboutupdate'])->name('ad_about_ad_update')->middleware('admin:admin');  

// our address
Route::get('/admin/ouraddress/show', [AdminOurAddressController::class, 'index'])->name('ad_address_ad_view')->middleware('admin:admin');   
Route::post('/admin/ouraddress/store', [AdminOurAddressController::class, 'store'])->name('ad_address_ad_store')->middleware('admin:admin');  
Route::post('/admin/ouraddress/update/{id}', [AdminOurAddressController::class, 'update'])->name('ad_address_ad_update')->middleware('admin:admin');  
// faq
Route::get('/admin/faq/faq', [AdminPageAboutController::class, 'faqview'])->name('ad_faq_ad_view')->middleware('admin:admin');  
Route::post('/admin/faq/store', [AdminPageAboutController::class, 'faqadd'])->name('ad_faq_ad_store')->middleware('admin:admin');  
Route::post('/admin/faq/faq-update/{id}', [AdminPageAboutController::class, 'faqupdate'])->name('ad_faq_ad_update')->middleware('admin:admin');  
// terms
Route::get('/admin/terms/terms', [AdminTermsPrivacyController::class, 'termsview'])->name('ad_terms_ad_view')->middleware('admin:admin');  
Route::post('/admin/terms/store', [AdminTermsPrivacyController::class, 'termsadd'])->name('ad_terms_ad_store')->middleware('admin:admin');  
Route::post('/admin/terms/terms-update/{id}', [AdminTermsPrivacyController::class, 'termsupdate'])->name('ad_terms_ad_update')->middleware('admin:admin');  
// privacy
Route::get('/admin/privacy/privacy', [AdminTermsPrivacyController::class, 'privacyview'])->name('ad_privacy_ad_view')->middleware('admin:admin');  
Route::post('/admin/privacy/privacy-update/{id}', [AdminTermsPrivacyController::class, 'privacyupdate'])->name('ad_privacy_ad_update')->middleware('admin:admin');  
// disclaimir
Route::get('/admin/disclaimir/disclaimir', [AdminDisclaimirLoginController::class, 'disclaimirview'])->name('ad_disclaimir_ad_view')->middleware('admin:admin');  
Route::post('/admin/disclaimir/store', [AdminDisclaimirLoginController::class, 'disclaimirstore'])->name('ad_disclaimir_ad_store')->middleware('admin:admin');  
Route::post('/admin/disclaimir/disclaimir-update/{id}', [AdminDisclaimirLoginController::class, 'disclaimirupdate'])->name('ad_disclaimir_ad_update')->middleware('admin:admin');  
// loginpage
Route::get('/admin/loginpage/loginpage', [AdminDisclaimirLoginController::class, 'loginpageview'])->name('ad_loginpage_ad_view')->middleware('admin:admin');  
Route::post('/admin/loginpage/loginpage-store', [AdminDisclaimirLoginController::class, 'loginpagestore'])->name('ad_loginpage_ad_store')->middleware('admin:admin');  
Route::post('/admin/loginpage/loginpage-update/{id}', [AdminDisclaimirLoginController::class, 'loginpageupdate'])->name('ad_loginpage_ad_update')->middleware('admin:admin');  
// contact page
Route::get('/admin/contact/contact', [AdminDisclaimirLoginController::class, 'contactpageview'])->name('ad_contactpage_ad_view')->middleware('admin:admin');  
Route::post('/admin/contact/contact-store', [AdminDisclaimirLoginController::class, 'contactpagestore'])->name('ad_contactpage_ad_store')->middleware('admin:admin');  
Route::post('/admin/contact/contact-update/{id}', [AdminDisclaimirLoginController::class, 'contactpageupdate'])->name('ad_contactpage_ad_update')->middleware('admin:admin');  
// admin subscriber
Route::get('/admin/subscriber/show', [AdminSubscriberController::class, 'showall'])->name('ad_subscriber_showall_ad_view')->middleware('admin:admin');  
Route::get('/admin/subscriber/mail-to-all', [AdminSubscriberController::class, 'mail_to_all'])->name('ad_subscriber_mailto_all')->middleware('admin:admin');  
Route::post('/admin/subscriber/send-mail', [AdminSubscriberController::class, 'send_email_all'])->name('ad_subscriber_sendmail_all')->middleware('admin:admin');  
// admin social icon
Route::get('/admin/socialicon/show', [AdminSocialIconController::class, 'socialiconview'])->name('ad_socialicon_ad_view')->middleware('admin:admin');  
Route::post('/admin/socialicon/store', [AdminSocialIconController::class, 'socialiconastore'])->name('ad_socialicon_ad_store')->middleware('admin:admin');  
Route::post('/admin/socialicon/update/{id}', [AdminSocialIconController::class, 'socilaiconedit'])->name('ad_socialicon_edit')->middleware('admin:admin');  
Route::get('/admin/socialicon/delete/{id}', [AdminSocialIconController::class, 'socilaicondelete'])->name('ad_socialicon_delete')->middleware('admin:admin');  
// admin social icon
Route::get('/admin/shareable/show', [AdminShareAbleController::class, 'shareableview'])->name('ad_shareable_ad_view')->middleware('admin:admin');  
Route::post('/admin/shareable/store', [AdminShareAbleController::class, 'shareablestore'])->name('ad_shareable_ad_store')->middleware('admin:admin');  
Route::post('/admin/shareable/update/{id}', [AdminShareAbleController::class, 'shareableedit'])->name('ad_shareable_edit')->middleware('admin:admin');  
Route::get('/admin/shareable/delete/{id}', [AdminShareAbleController::class, 'shareabledelete'])->name('ad_shareable_delete')->middleware('admin:admin');  
// admin users
Route::get('/admin/users/show', [AdminUserController::class, 'usersview'])->name('ad_user_ad_view')->middleware('admin:admin');  
Route::get('/admin/users/create', [AdminUserController::class, 'userscreate'])->name('ad_user_ad_create')->middleware('admin:admin');  
Route::post('/admin/users/store', [AdminUserController::class, 'usersstore'])->name('ad_user_ad_store')->middleware('admin:admin');  
Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'usersedit'])->name('ad_user_ad_edit')->middleware('admin:admin');  
Route::post('/admin/users/update/{id}', [AdminUserController::class, 'usersupdate'])->name('ad_user_ad_update')->middleware('admin:admin');  
Route::get('/admin/users/delete/{id}', [AdminUserController::class, 'usersdelete'])->name('ad_user_ad_delete')->middleware('admin:admin');  

Route::get('/user/verify/{token}/{email}', [LoginController::class, 'usersverify'])->name('user_verify');
// sub category 
Route::get('/admin/sub-category/show', [AdminSubCategoryController::class, 'index'])->name('sub_category_view')->middleware('admin:admin'); 
Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('sub_category_create')->middleware('admin:admin'); 
Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('sub_category_store')->middleware('admin:admin'); 
Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('sub_category_edit')->middleware('admin:admin'); 
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('sub_category_update')->middleware('admin:admin'); 
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'destroy'])->name('sub_category_delete')->middleware('admin:admin'); 
// admin post route
Route::get('/admin/post/show', [AdminPostController::class, 'index'])->name('ad_post_view')->middleware('admin:admin'); 
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('ad_post_create')->middleware('admin:admin'); 
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('ad_post_store')->middleware('admin:admin'); 
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('ad_post_edit')->middleware('admin:admin'); 
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('ad_post_update')->middleware('admin:admin'); 
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'destroy'])->name('ad_post_delete')->middleware('admin:admin'); 
Route::get('/admin/post/photo/delete/{id}', [AdminPostController::class, 'delete_photo'])->name('ad_post_delete_photo')->middleware('admin:admin'); 

// income
Route::get('/admin/income/view', [AdminIncomeController::class, 'index'])->name('ad_income_view')->middleware('admin:admin'); 
Route::post('/admin/income/store', [AdminIncomeController::class, 'store'])->name('ad_income_store')->middleware('admin:admin');  
Route::get('/admin/income/post-store/{id}', [AdminIncomeController::class, 'poststore'])->name('ad_income_separate')->middleware('admin:admin');  
Route::post('/admin/income/ppost-store', [AdminIncomeController::class, 'ppoststore'])->name('ad_income_separate_store')->middleware('admin:admin');  
Route::post('/admin/income/update/{id}', [AdminIncomeController::class, 'update'])->name('ad_income_update')->middleware('admin:admin');  
Route::get('/admin/income/delete/{id}', [AdminIncomeController::class, 'delete'])->name('ad_income_delete')->middleware('admin:admin');  

#setting
Route::get('/admin/setting/setting', [AdminSettingController::class, 'index'])->name('ad_setting_show')->middleware('admin:admin'); 
Route::post('/admin/setting/submit', [AdminSettingController::class, 'setting'])->name('ad_setting_submit')->middleware('admin:admin'); 

// Route::post('/admin/advertisement/create', [AdminAdvertisementController::class, 'index']);



// user dashboadr section

Route::get('/user/home', [UserHomeController::class, 'userhome'])->name('user_home')->middleware('user:user');
Route::get('/user/profile', [UserProfileController::class, 'userprofile'])->name('user_profile')->middleware('user:user');
Route::post('/user/profile/update', [UserProfileController::class, 'update'])->name('user_update')->middleware('user:user');


Route::get('/user/post/show', [UserPostController::class, 'userindex'])->name('user_post_view')->middleware('user:user'); 
Route::get('/user/post/create', [UserPostController::class, 'create'])->name('user_post_create')->middleware('user:user'); 
Route::post('/user/post/store', [UserPostController::class, 'store'])->name('user_post_store')->middleware('user:user'); 
Route::get('/user/post/edit/{id}', [UserPostController::class, 'edit'])->name('user_post_edit')->middleware('user:user'); 
Route::post('/user/post/update/{id}', [UserPostController::class, 'update'])->name('user_post_update')->middleware('user:user'); 
Route::get('/user/post/delete/{id}', [UserPostController::class, 'desstroy'])->name('user_post_delete')->middleware('user:user'); 
Route::get('/user/post/photo/', [UserPostPhotoController::class, 'index'])->name('user_photo')->middleware('user:user'); 
Route::get('/user/post/photo/delete/{id}', [UserPostController::class, 'user_delete_photo'])->name('user_post_delete_photo')->middleware('user:user'); 

Route::get('/user/income/view', [UserIncomeController::class, 'index'])->name('user_income_view')->middleware('user:user'); 
Route::post('/user/income/store', [UserIncomeController::class, 'store'])->name('user_income_store')->middleware('user:user');  
Route::get('/user/income/post-store/{id}', [UserIncomeController::class, 'poststore'])->name('user_income_separate')->middleware('user:user');  
Route::post('/user/income/ppost-store', [UserIncomeController::class, 'ppoststore'])->name('user_income_separate_store')->middleware('user:user');  
Route::post('/user/income/update/{id}', [UserIncomeController::class, 'update'])->name('user_income_update')->middleware('user:user');  
Route::get('/user/income/delete/{id}', [UserIncomeController::class, 'delete'])->name('user_income_delete')->middleware('user:user');  

// user login section
// Auth::routes();
Route::get('/login', [LoginController::class, 'userindex'])->name('userlogin');
Route::post('/login-submit', [LoginController::class, 'user_login_submit'])->name('user_login_submit');
Route::get('/logout', [LoginController::class, 'user_logout'])->name('user_logout');

Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('user_forget_password');

// Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('user_forget_password');
Route::post('/forget-password-submit', [LoginController::class, 'forget_password_submit'])->name('user_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('user_reset_password');
Route::post('/reset-password-submit', [LoginController::class, 'reset_password_submit'])->name('user_reset_password_submit');
//Route::get('/user', [UserHomeController::class, 'userhome'])->name('user_home');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/property-by-city/{id}', [HomeController::class, 'get_city_by_category'])->name('city-by-property');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms-and-condition', [TermsConditionController::class, 'index'])->name('terms');
Route::get('/privacy-and-policy', [PrivacyPolicyController::class, 'index'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); 
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit'); 
Route::get('/disclaimir', [DisclaimirController::class, 'index'])->name('disclaimir'); 

Route::get('/detail/{slug?}', [SingleBuildingController::class, 'detail'])->name('homedetails');

// Route::post('/property-detail/enquiredata', [SingleBuildingController::class, 'enquire_data'])->name('enquire_property_data');
// Route::get('/property', [PropertyController::class, 'index'])->name('property');
// Route::get('/property/{property}', [PropertyController::class, 'show'])->name('property-type');
// Route::get('/property/{property}/{slug?}', [PropertyController::class, 'property_detail'])->name('property-single');


Route::get('/city/{city}', [CityController::class, 'city_posts'])->name('city_post');
Route::get('/city/{city}/{type?}', [CityController::class, 'city_post_type'])->name('city_post_type');
Route::get('/city/{city}/{type?}/{slug?}', [CityController::class, 'city__detail_post'])->name('city_single_post');

Route::get('/{name}', [CategoryController::class, 'category'])->name('category');
Route::get('/{name}/{subname?}', [CategoryController::class, 'category_details'])->name('category_detail');
Route::get('/{name}/{subname?}/{slug?}', [CategoryController::class, 'category_by_sub_details'])->name('category_by_subcategory_detail');
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscribe_verify');

Route::post('/search/{property?}/{city?}', [SearchController::class, 'searchresult'])->name('search_result');

// Route::get('/login', [LoginController::class, 'author_index'])->name('author_login');  