<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Http;


Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {

Http::post('http://localhost:3001/auth/register', [
    'email' => $request->email,
    'password' => $request->password,
]);


    session(['user' => $request->email]);

    return redirect('/tasks');
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    session(['user' => $request->email]);
    return redirect('/tasks');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

Route::get('/', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return redirect('/tasks');
});

Route::get('/tasks', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return app(TaskController::class)->index();
});

Route::get('/tasks/create', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return app(TaskController::class)->create();
});

Route::post('/tasks', function (Request $request) {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return app(TaskController::class)->store($request);
});

Route::delete('/tasks/{id}', function ($id) {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return app(TaskController::class)->destroy($id);
});
