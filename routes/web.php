<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Gestionnaire\GestionnaireController;
use App\Http\Controllers\calendarController;
use Illuminate\Support\Facades\Auth;



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


Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/login', function () {
    return redirect()->route('user.login');
});

Route::get('/register', function () {
    return redirect()->route('user.register');
});

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create','User\UserController@create')->name('create');
          Route::post('/check','User\UserController@check')->name('check');
    });

    Route::middleware('auth:web')->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout','User\UserController@logout')->name('logout');
        Route::put('/home','User\UserController@update')->name('update');
        Route::get('/calendar', [UserController::class, 'reserve'])->name('reserve');
        Route::post('/calendar/action', [UserController::class, 'action']);
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check','Admin\AdminController@check')->name('check');

    });

    Route::middleware('auth:admin')->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
//        Route::get('/home','Admin\AdminController@edit')->name('edit');
        Route::put('/home','Admin\AdminController@update')->name('update');
        Route::post('/logout','Admin\AdminController@logout')->name('logout');


        Route::delete('/user/role-delete/{id}','Admin\AdminController@deleteuser');
        Route::delete('/gs/role-delete/{id}','Admin\AdminController@deletegs');

        Route::get('/userT','Admin\AdminController@displayuser')->name('userlist');
        Route::get('/gsT','Admin\AdminController@displaygs')->name('gslist');

        Route::get('/user/status/{id}','Admin\AdminController@changestatus')->name('changestatus');
        Route::get('/gs/status/{id}','Admin\AdminController@changestatusgs')->name('changestatusgs');


    });

});



Route::prefix('gestionnaire')->name('gestionnaire.')->group(function(){

    Route::middleware(['guest:doctor','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.gestionnaire.login')->name('login');
        Route::view('/register','dashboard.gestionnaire.register')->name('register');
        Route::post('/create','Gestionnaire\GestionnaireController@create')->name('create');
        Route::post('/check','Gestionnaire\GestionnaireController@check')->name('check');

    });

    Route::middleware('auth:doctor')->group(function(){
         Route::view('/home','dashboard.gestionnaire.home')->name('home');
         Route::view('/updatep', 'dashboard.gestionnaire.update')->name('update');
        Route::put('/update','Gestionnaire\GestionnaireController@update')->name('update');
        Route::post('/logout','Gestionnaire\GestionnaireController@logout')->name('logout');
        Route::get('/home', 'Gestionnaire\GestionnaireController@stock')->name('home');
        Route::get('/notifications', 'Gestionnaire\GestionnaireController@notifications')->name('notifications');
        Route::post('/deleteNotif/{id}', 'Gestionnaire\GestionnaireController@deleteNotif');
        Route::post('/updateStock', 'Gestionnaire\GestionnaireController@updateStock')->name('updateStock');
        Route::post('/addNotification', 'Gestionnaire\GestionnaireController@addNotification')->name('addNotification');
        Route::get('calendar', [calendarController::class, 'index']);
        Route::post('calendar/action', [calendarController::class, 'action']);
    });

});



Route::view('/choix',  'choix')->name('choice');
Route::view('/Apropos',  'Apropos')->name('apropos');

Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');
Route::view('/contact',  'contact.create')->name('contact');

