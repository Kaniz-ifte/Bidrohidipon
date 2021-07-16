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

// Route::get('/', 'PagesController@index');

Route::get('/', function () {
    return view('index');
});
// Demo routes
Route::get('/', 'PagesController@index')->name('índex');
Route::post('/contact/submit', 'PagesController@contactSubmit')->name('contact.submit');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin');

  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::group(['middleware' => ['auth:admin']], function() {


Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
});

Route::get('/language/{locale}', function ($locale) {
     Session::put('locale',$locale);
    return redirect()->back();
});

});

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Auth::routes();



// Admin Group
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => 'auth:admin' ], function(){

     Route::get('dashboard', 'Admin\CinemaController@index')->name('dashboard');
    Route::resource('backgrounds','Admin\BackgroundController');
    Route::resource('abouts','Admin\AboutController');
    Route::resource('cinemas','Admin\CinemaController');
    Route::resource('stills','Admin\StillController');
    Route::resource('mentions','Admin\MentionController');
    Route::resource('blogs','Admin\BlogController');
    Route::resource('categories','Admin\CategoryController');
    Route::resource('users','Admin\UserController');
    Route::resource('roles','Admin\RoleController');
    Route::resource('admins','Admin\AdminController');
    Route::resource('settings','Admin\SettingController');
    Route::resource('social_media','Admin\SocialMediaController');
});


// Route::post('/pay', 'SslCommerzPaymentController@index');


Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax')->name('pay-via-ajax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');

Auth::routes();
