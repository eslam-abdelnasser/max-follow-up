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

    Route::get('/images','Admin\AccreditationController@index')->name('images.index');
    Route::post('/images','Admin\AccreditationController@postImage')->name('images.store');

    Route::resource('/galleries','Admin\GalleryController');
    Route::resource('/socials','Admin\SocialController');
    Route::resource('/team','Admin\TeamController');

    Route::resource('/why-us','Admin\WhyUsController');
    Route::delete('/why-us','Admin\WhyUsController@destroyAll')->name('why-us.destroy.all');

    Route::delete('/team','Admin\TeamController@destroyAll')->name('team.destroy.all');


    Route::delete('/socials','Admin\SocialController@destroyAll')->name('socials.destroy.all');


    Route::delete('/galleries','Admin\GalleryController@destroyAll')->name('galleries.destroy.all');
    Route::get('/Album/{id}/create','Admin\GalleryController@addMedia')->name('Album.create');
    Route::post('/Album/{id}/create','Admin\GalleryController@postMedia')->name('Album.store');
    Route::get('/Album/{id}/show','Admin\GalleryController@showAlbum')->name('Album.show');
    Route::get('/Album/{id}/delete','Admin\GalleryController@delete')->name('Album.delete');
    Route::resource('/blogs','Admin\BlogController');
    Route::delete('/blogs','Admin\BlogController@destroyAll')->name('blogs.destroy.all');


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

    Route::get('/about' , 'Admin\AboutUsController@getAboutUs')->name('admin.about.index');
    Route::put('/about/{id}/update' , 'Admin\AboutUsController@updateAboutUs')->name('admin.about.update');

    Route::get('/who' , 'Admin\WhoController@getWho')->name('admin.who.index');
    Route::put('/who/{id}/update' , 'Admin\WhoController@updateWho')->name('admin.who.update');

    Route::get('/director-words' , 'Admin\DirectorWordsController@getDirectorWord')->name('admin.director-words.index');
    Route::put('/director-words/{id}/update' , 'Admin\DirectorWordsController@updateDirectorWord')->name('admin.director-words.update');

    Route::get('/general-setting' , 'Admin\GeneralSettingController@index')->name('admin.general.setting');
    Route::put('/general-setting/{id}/update' , 'Admin\GeneralSettingController@update')->name('admin.general.setting.update');
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



    Route::get('/','HomeController@index')->name('home');

    Route::get('/about-us', 'AboutUsController@index')->name('about-us');


    Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');






}) ;