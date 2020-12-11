<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register','UserAPIController@register');
    Route::post('login', 'UserAPIController@authenticate');
    Route::post('forget-password', 'UserAPIController@forgetPassword');
    Route::post('set-password', 'UserAPIController@setPassword');
    Route::post('logout', 'UserAPIController@logout')->middleware('jwt.verify');
});

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::resource('users', 'UserAPIController');

});




Route::resource('notifications', 'NotificationAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('donation_orders', 'DonationOrderAPIController');

Route::resource('posts', 'PostAPIController');

Route::resource('clients', 'ClientAPIController');

Route::resource('contact_us_messages', 'ContactUsMessageAPIController');

Route::resource('governorates', 'GovernorateAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('blood_types', 'BloodTypeAPIController');

Route::resource('client_notifications', 'ClientNotificationAPIController');

Route::resource('settings', 'SettingsAPIController');

Route::resource('client_posts', 'ClientPostAPIController');

Route::resource('client_governorates', 'ClientGovernorateAPIController');

Route::resource('blood_type_clients', 'BloodTypeClientAPIController');