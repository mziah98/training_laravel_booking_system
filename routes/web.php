<?php

use Illuminate\Support\Facades\Route;

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
/* URL dkt web page */
Route::get('/', function(){ return view('welcome'); })->name('welcome'); //'panggil file welcome.blade.php'
/* nk return controller dlm route */
// Route::get('/newbooking', [
//     App\Http\Controllers\User\BookingController::class, 'index'
// ]);

// Route::post('/newbooking/submit', [
//     App\Http\Controllers\User\BookingController::class, 'submit'
// ]);


// Route::redirect('/123', '/'); //bila add directory/123 dkt url, dia akan redirect ke url diatas
// Route::get('/user', function(){
//     return response()->json([
//             'name'  => 'ani',
//             'email' => 'ani@gmail.com',
//     ]);
// });

/* nk susun route guna route group */
Route::group(['prefix' => '/app', 'as' => 'app.', 'middleware' => ['auth']], function(){ 
    //user dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('booking', 'App\Http\Controllers\User\BookingController');
    //user history

    //user profile

    Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['check_admin']], function(){ 
        /* prefix=nama di dpn, as= prefix utk naming, middleware= utk make sure user login dulu baru boleh bkk page dlm ni*/

        //admin dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/booking/pdf',[App\Http\Controllers\Admin\BookingController::class, 'pdf'])->name('booking.pdf');
        Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('user', 'App\Http\Controllers\Admin\UserController');       // Admin user routes (list, view, edit, update, delete)
        Route::resource('room', 'App\Http\Controllers\Admin\RoomController');
        Route::resource('booking', 'App\Http\Controllers\Admin\BookingController');
        Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');

        /*Route::get('/') //list all user
        Route::get('/{user}') //view specific user
        Route::get('/{user}/edit') //edit user
        Route::post('/{user}/edit') //submit edit user
        Route::get('/{user}/delete') //delete user
        */
    });
});

Auth::routes(); // login, register, reset password page

