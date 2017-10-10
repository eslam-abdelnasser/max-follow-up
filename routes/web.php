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
    Route::resource('/services','Admin\ServiceController');

    Route::resource('/teachers','Admin\TeacherController');
    Route::resource('/news','Admin\NewController');
    Route::resource('/laboratories','Admin\LaboratoryController');
    Route::resource('/activities','Admin\ActivityController');


    Route::resource('/galleries','Admin\GalleryController');
    Route::resource('/slider' , 'Admin\SliderController');
    Route::resource('/faqs','Admin\FaqController');
    Route::resource('/socials','Admin\SocialController');


    Route::resource('/supervisors','Admin\SupervisorController');
    Route::delete('/supervisors','Admin\SupervisorController@destroyAll')->name('supervisors.destroy.all');

    Route::resource('/education-levels','Admin\educationLevelController');
    Route::delete('/education-levels','Admin\EducationLevelController@destroyAll')->name('education-levels.destroy.all');

    Route::resource('/admission-roles','Admin\AdmissionRoleController');
    Route::delete('/admission-roles','Admin\AdmissionRoleController@destroyAll')->name('admission-roles.destroy.all');


    Route::delete('/socials','Admin\SocialController@destroyAll')->name('socials.destroy.all');
    Route::delete('/services','Admin\ServiceController@destroyAll')->name('services.destroy.all');

    Route::delete('/teachers','Admin\TeacherController@destroyAll')->name('teachers.destroy.all');
    Route::delete('/news','Admin\NewController@destroyAll')->name('news.destroy.all');
    Route::delete('/laboratories','Admin\LaboratoryController@destroyAll')->name('laboratories.destroy.all');
    Route::delete('/activities','Admin\ActivityController@destroyAll')->name('activities.destroy.all');

    Route::delete('/galleries','Admin\GalleryController@destroyAll')->name('galleries.destroy.all');
    Route::resource('/sliders' , 'Admin\SliderController');
    Route::get('/Album/{id}/create','Admin\GalleryController@addMedia')->name('Album.create');
    Route::post('/Album/{id}/create','Admin\GalleryController@postMedia')->name('Album.store');
    Route::get('/Album/{id}/show','Admin\GalleryController@showAlbum')->name('Album.show');
    Route::get('/Album/{id}/delete','Admin\GalleryController@delete')->name('Album.delete');
    Route::resource('/blogs','Admin\BlogController');
    Route::delete('/blogs','Admin\BlogController@destroyAll')->name('blogs.destroy.all');
    Route::resource('/careers','Admin\CareerController');
    Route::delete('/careers','Admin\CareerController@destroyAll')->name('careers.destroy.all');

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

    Route::get('/education-level', 'AboutUsController@educationLevel')->name('education-level');
    Route::get('/supervisor', 'AboutUsController@supervisor')->name('supervisor');
    Route::get('/admission-roles', 'AboutUsController@admissionRoles')->name('admission-roles');

    Route::get('/blog', 'ListController@blog')->name('blog');
    Route::get('/media', 'AboutUsController@media')->name('media');
    Route::get('/careers', 'ListController@career')->name('careers');
    Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');
    Route::post('/contact-us-footer','ContactUsController@contactFooter')->name('contact-us-footer');
    Route::post('/contact-us','ContactUsController@postMessage')->name('contact.post');

    Route::get('/teachers', 'ListController@teacher')->name('teachers');
    Route::get('/news', 'ListController@news')->name('news');
    Route::get('/laboratories', 'ListController@laboratory')->name('laboratories');
    Route::get('/activities', 'ListController@activity')->name('activities');

    Route::get('/services', 'ListController@service')->name('services');

    Route::get('/service/{slug}/details', 'DetailsController@service')->name('services.details');
    // details of list
    Route::get('/blog/{slug}/details', 'DetailsController@blog')->name('blog.details');
    Route::get('/careers/{slug}/details', 'DetailsController@career')->name('careers.details');

    Route::get('/teachers/{slug}/details', 'DetailsController@teacher')->name('teachers.details');
    Route::get('/news/{slug}/details', 'DetailsController@news')->name('news.details');
    Route::get('/laboratories/{slug}/details', 'DetailsController@laboratory')->name('laboratories.details');
    Route::get('/activities/{slug}/details', 'DetailsController@activity')->name('activities.details');




}) ;