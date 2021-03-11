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

//wep.php
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\UserController;

Route::middleware('user_role:admin')->group(function () {

    Route::resource('/users', UserController::class);
});


use App\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);


Route::get('import', function () {
    $path = storage_path('app/malaysia_postcode/ALL-POSTCODES.csv');
    $file = fopen($path, "r");
    while ($d = fgetcsv($file)) {

        DB::table('malaysia_streets')
            ->insert([
                'postcode' => $d[0],
                'street_name' => $d[1],
                'city_name' => $d[2],
                'state_code' => $d[3],
            ]);

        DB::table('malaysia_cities')
            ->updateOrInsert([
                'postcode' => $d[0]
            ], [
                'city_name' => $d[2],
                'state_code' => $d[3],
            ]);
    }

    print_r();
    fclose($file);
    dd(1);
});

Route::get('import2', function () {
    $states = [
        'JHR' => 'Johor',
        'KDH' => 'Kedah',
        'KTN' => 'Kelantan',
        'MLK' => 'Melaka',
        'NSN' => 'Negeri Sembilan',
        'PHG' => 'Pahang',
        'PRK' => 'Perak',
        'PLS' => 'Perlis',
        'PNG' => 'Pulau Pinang',
        'SBH' => 'Sabah',
        'SWK' => 'Sarawak',
        'SGR' => 'Selangor',
        'TRG' => 'Terengganu',
        'KUL' => 'W.P. Kuala Lumpur',
        'LBN' => 'W.P. Labuan',
        'PJY' => 'W.P. Putrajaya',
    ];

    foreach ($states as $k => $v) {
        DB::Table('malaysia_states')->insert([
            'state_code' => $k,
            'state_name' => $v

        ]);
    }
});
