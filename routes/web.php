<?php

use App\Http\Controllers\InquiryController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

$home = function () {
    $selectedPosts = Post::where('is_published', true)
        ->where('is_featured', true)
        ->latest('id')
        ->take(3)
        ->get();

    return view('home', ['selectedPosts' => $selectedPosts]);
};

Route::get('/', $home);
Route::get('/home', $home)->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    $posts = Post::where('is_published', true)->latest('id')->paginate(9);

    return view('blog', ['posts' => $posts]);
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [InquiryController::class, 'store'])->name('contact.store');

Route::get('/blog/{post}', function (Post $post) {
    if (! $post->is_published) {
        abort(404);
    }

    return view('posts.show', ['post' => $post]);
})->name('blog.show');

Route::get('/blog/{post}/cover', function (Post $post) {
    if (! $post->is_published) {
        abort(404);
    }

    if ($post->image_path === null) {
        abort(404);
    }

    if (! Storage::disk('local')->exists($post->image_path)) {
        abort(404);
    }

    return Storage::disk('local')->response($post->image_path);
})->name('blog.cover');
