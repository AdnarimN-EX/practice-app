<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('newpage/{article}', function ($slug) {

    //With New Class
    return view('newpage', [
        'content' => Post::find($slug)
    ]);


    // $path = __DIR__ . "/../resources/samples/{$slug}.html";

    // if (!file_exists($path)) {
    //     abort(404);
    // }

    // $content = file_get_contents($path);

    // return view('newpage', [
    //     'content' => $content
    // ]);
});

Route::get('chicken',function(){

    $data = [
        ['flavor'=>'spicy'],
        ['flavor'=>'sweet'],
    ];

    return view('chickenwings/layout',[
        'chick' => $data
    ]);
});


//POST

Route::get('post', function () {

    return view('postSingle',[
        'content' => Post::all()
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {

    return view('post',[
        'content' => $post
    ]);
});


Route::get('hometest', function () {
    return view('hometest');
});

Route::get('layoutpractice', function () {
    return view('layoutpractice/header');
});

//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
