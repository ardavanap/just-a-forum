<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\questionController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\topicController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;



Route::get('/', [homeController::class, 'index'])->name('home');

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'authenticate'])->name('login');

Route::get('/logout', function (){
    auth()->logout();
    return redirect()->route('home');
});

Route::get('/signup', [signupController::class, 'index'])->name('signup.index');
Route::post('/signup', [signupController::class, 'signup'])->name('signup');

Route::prefix('/profile')->middleware('auth')->group( function (){
    Route::get('/', [profileController::class, 'index'])->name('profile');
    Route::get('/edit', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit', [profileController::class, 'update']);
});


Route::resource('/topic',topicController::class)->only(['index', 'show']);
Route::resource('/topic',topicController::class)->middleware('auth')->except(['index', 'show']);


Route::resource('/blog', blogController::class)->middleware('auth')->except(['index', 'show']);
Route::resource('/blog', blogController::class)->only(['index', 'show']);

Route::resource('/question', questionController::class)
    ->middleware('auth')
    ->except(['index', 'show'])
    ->names('question');

    Route::resource('/question', questionController::class)->names('question');


Route::middleware('auth')->group( function (){
    Route::get('/tag', [TagController::class, 'index']);
    Route::post('/tag', [TagController::class, 'likeOrDislikeTag']);
    Route::get('/tag/edit', [TagController::class, 'userEditeTag'])->name('tag.edit');
});


Route::get('/email/verify', function(){
    return view('verify-email');
})->middleware('auth')->name('verification.notice');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/tag');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/' , [adminController::class, 'index'])                                 ->name('admin.dashboard');
    Route::get('/users' , [adminController::class, 'userPage'])                         ->name('admin.usersPage');
    Route::get('/blogs', [adminController::class, 'blogsPage'])                         ->name('admin.blogsPage');
    Route::get('/blog-comments', [adminController::class, 'blogCommentsPage'])          ->name('admin.blogCommentPage');
    Route::get('/questions', [adminController::class, 'questionsPage'])                 ->name('admin.questionPage');
    Route::get('/question-comments' , [adminController::class, 'questionCommentPage'])  ->name('admin.questionCommentPage');
    Route::get('/suspended', [adminController::class, 'suspendedPage'])                 ->name('admin.suspendedPage');
    Route::get('/tags', [adminController::class, 'tagsPage'])                           ->name('admin.tagsPage');
    Route::get('/reports', [adminController::class, 'reportsPage'])                     ->name('admin.reportsPage');
    Route::delete('/user/{id}/destroy', [userController::class, 'destroy']);
    Route::post('/user/{id}/suspend-or-unsuspend', [userController::class, 'suspendOrUnsuspend']);
    Route::post('/blog/{id}/delete', [blogController::class, 'destroy']);
    Route::post('/blog-comment/{id}/delete', [commentController::class, 'destroyBlogComment']);
    Route::post('/question-comment/{id}/delete', [commentController::class, 'destroyQuestionComment']);
    Route::post('/question/{id}/delete', [questionController::class, 'destroy']);
});


Route::prefix('comment')->middleware('auth')->group(function (){
    Route::post('/question', [commentController::class, 'storeQuestionComment']);
    Route::post('/blog', [commentController::class, 'storeBlogComment']);
    Route::post('/blog/like', [commentController::class, 'blogCommentLike']);
    Route::post('/question/like', [commentController::class, 'questionCommentLike']);
});


Route::fallback(function () {
    return view('404');
});
