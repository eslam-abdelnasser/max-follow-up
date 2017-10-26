<?php

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

Auth::routes();


//Route::middleware(['auth:admin'])->group(function(){
//
//
//});

Route::group([
    'prefix' => LaravelLocalization::setLocale().'/dashboard',
    'middleware' => ['localize','auth:admin'],
], function () {

    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('/admins','Admin\AdminController');
    Route::resource('/roles','Admin\RoleController');
    Route::resource('/languages','Admin\LanguagesController');
    Route::resource('/galleries','Admin\GalleryController');
    Route::resource('/socials','Admin\SocialController');
    Route::delete('/socials','Admin\SocialController@destroyAll')->name('socials.destroy.all');
    Route::delete('/galleries','Admin\GalleryController@destroyAll')->name('galleries.destroy.all');
    Route::get('/Album/{id}/create','Admin\GalleryController@addMedia')->name('Album.create');
    Route::post('/Album/{id}/create','Admin\GalleryController@postMedia')->name('Album.store');
    Route::get('/Album/{id}/show','Admin\GalleryController@showAlbum')->name('Album.show');
    Route::get('/Album/{id}/delete','Admin\GalleryController@delete')->name('Album.delete');
    Route::resource('/contact-us','Admin\ContactUsController');
    Route::delete('/contact-us','Admin\Contact-usController@destroyAll')->name('contact-us.destroy.all');
    Route::get('/permissions', 'Admin\PermissionController@index')->name('permission.index');
    Route::get('/permissions/{permission_id}', 'Admin\PermissionController@edit')->name('permission.edit');
    Route::post('/permissions/{permission_id}', 'Admin\PermissionController@update')->name('permission.update');
    Route::get('roles/{role_id}/addpermissions' , 'Admin\RoleController@displaypermission')->name('role.permission');
    Route::post('roles/{role_id}/permissions' , 'Admin\RoleController@addpermission')->name('role_permission.store');
    Route::get('roles/{role_id}/permissions' , 'Admin\RoleController@display_role_permission')->name('role.view.permission');
    Route::post('roles/{role_id}/permissions/{permission_id}','Admin\PermissionController@delete_relation')->name('permission.destroyRelation');
    Route::get('admins/{admin_id}/addroles' , 'Admin\AdminController@displayroles')->name('admin.role');
    Route::post('admins/{admin_id}/roles' , 'Admin\AdminController@addrole')->name('admin_role.store');
    Route::get('admins/{admin_id}/roles' , 'Admin\AdminController@display_admin_role')->name('admin.view.role');
    Route::post('admins/{admin_id}/roles/{role_id}','Admin\RoleController@delete_relation')->name('role.destroyRelation');
    Route::get('/general-setting' , 'Admin\GeneralSettingController@index')->name('admin.general.setting');
    Route::put('/general-setting/{id}/update' , 'Admin\GeneralSettingController@update')->name('admin.general.setting.update');



     //// start pages routes



    // news
    Route::resource('/news','Admin\NewsController');
    Route::delete('/news','Admin\NewsController@destroyAll')->name('news.destroy.all');
       // news images
    Route::post('/news/image' , 'Admin\NewsController@storeImage')->name('news.images.store');
    Route::get('/news-images/{id}/show','Admin\NewsController@showImages')->name('images.index');
    Route::get('/news-images/{id}/delete','Admin\NewsController@deleteImage')->name('images.delete');
    Route::get('/news-images/{id}/create','Admin\NewsController@createImage')->name('images.create');
    //education level
    Route::resource('/education-level','Admin\EducationLevelController');
    Route::delete('/education-level','Admin\EducationLevelController@destroyAll')->name('education-level.destroy.all');
    Route::get('education-level/images/show','Admin\EducationLevelController@showImages')->name('education-level-images.index');
    Route::get('education-level-images/{id}/create','Admin\EducationLevelController@createImage')->name('education-level-image.create');
    Route::post('education-level/images','Admin\EducationLevelController@postImages')->name('education.image.post');
    Route::get('/education-level-image/{id}/delete','Admin\EducationLevelController@deleteImage')->name('education.level.images.delete');
    // testimonial
    Route::resource('/testimonial','Admin\TestimonialController');
    Route::delete('/testimonial','Admin\TestimonialController@destroyAll')->name('testimonial.destroy.all');
    // faq
    Route::resource('/faq','Admin\FaqController');
    Route::delete('/faq','Admin\FaqController@destroyAll')->name('faq.destroy.all');
    //admin structure
    Route::resource('/admin-structure','Admin\AdminStructureController');
    Route::delete('/admin-structure','Admin\AdminStructureController@destroyAll')->name('admin-structure.destroy.all');
    //team
    Route::resource('/team','Admin\TeamController');
    Route::delete('/team','Admin\TeamController@destroyAll')->name('team.destroy.all');

    // teaching stuff
    Route::resource('/teaching-stuff','Admin\TeachingStuffController');
    Route::delete('/teaching-stuff','Admin\TeachingStuffController@destroyAll')->name('teaching-stuff.destroy.all');
    //why us
    Route::resource('/why-us','Admin\WhyUsController');
    Route::delete('/why-us','Admin\WhyUsController@destroyAll')->name('why-us.destroy.all');
    //about us
    Route::get('/about' , 'Admin\AboutUsController@getAboutUs')->name('admin.about.index');
    Route::put('/about/{id}/update' , 'Admin\AboutUsController@updateAboutUs')->name('admin.about.update');
    //who
    Route::get('/who' , 'Admin\WhoController@getWho')->name('admin.who.index');
    Route::put('/who/{id}/update' , 'Admin\WhoController@updateWho')->name('admin.who.update');
    //director words
    Route::get('/director-words' , 'Admin\DirectorWordsController@getDirectorWord')->name('admin.director-words.index');
    Route::put('/director-words/{id}/update' , 'Admin\DirectorWordsController@updateDirectorWord')->name('admin.director-words.update');
    //blog
    Route::resource('/blogs','Admin\BlogController');
    Route::delete('/blogs','Admin\BlogController@destroyAll')->name('blogs.destroy.all');
    // board trustees
    Route::resource('/board-trustees','Admin\BoardTrusteesController');
    Route::delete('/board-trustees','Admin\BoardTrusteesController@destroyAll')->name('board-trustees.destroy.all');

    //images
    Route::post('/image-system' , 'Admin\ImageSystemController@store')->name('images.store');
    Route::get('/image-system/show','Admin\ImageSystemController@index')->name('images.index');
    Route::get('/image-system/{id}/delete','Admin\ImageSystemController@delete')->name('images.delete');
    Route::get('/image-system/{type}/create','Admin\ImageSystemController@create')->name('images.create');
    //// end pages routes

});


Route::group([
    'prefix' => LaravelLocalization::setLocale().'/admin',
    'middleware' => ['localize','web'],
//    'namespace' => 'Modules\Blog\Http\Controllers',
], function () {

//    dd(LaravelLocalization::setLocale())   ;


    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
    Route::get('/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');


    //reset password.

//    Route::get('posts', ['as' => 'blog.post.index', 'uses' => 'PublicController@index']);
//    Route::get('/', 'Admin\DashboardController@index');
//    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
});


Route::group([
    'prefix' => LaravelLocalization::setLocale().'/',
    'middleware' => ['localize'],
], function () {



    Route::get('/','@index')->name('home');

    Route::get('/about-us', 'AboutUs\AboutUsController@index')->name('about-us');
    Route::get('/admin-structure', 'AboutUs\AboutUsController@adminStructure')->name('admin-structure');

    Route::get('/board-trustees', 'AboutUs\AboutUsController@boardTrustees')->name('board-trustees');
    Route::get('/accreditation', 'AboutUs\AboutUsController@accreditation')->name('accreditation');
// why us
    Route::get('/why-us','AboutUs\AboutUsController@whyUs')->name('why-us');
    Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');






}) ;