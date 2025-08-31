<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/like')

// Route::middleware(['admin', 'auth:sanctum'])->prefix('admin')->group(function () {
//     Route::delete('user/{id}/destroy', [userController::class, 'destroy']);
//     Route::patch('user/{id}/suspend-or-unsuspend', [userController::class, 'suspendOrUnsuspend']);
// });

// Route::get('test', function (){
//     return 'hi';
// });