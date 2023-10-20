<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

//POST
Route::get('post', function () {
    return view('post',[
        'content' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {
    return view('postSingle',[
        'content' => $post
    ]);
});

Route::get('category/{category:slug}', function (Category $category) {
    return view('post',[
        'content' => $category->post
    ]);
});

Route::get('authors/{author}', function (User $author) {
    return view('post',[
        'content' => $author->posts
    ]);
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
