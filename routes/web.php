<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/docs', function () {
    return view('docs');
});

Route::get('/', function () { 

    $posts = Post::alll();

    // ddd($posts[0]->Time);
    
    return view('posts', ['posts' => Post::alll()]);
});

Route::get('posts/{post}', function ($slug) {


    return view('post', ['post' => Post::find($slug)]);

})->where('post', '[A-z_\-]+');
