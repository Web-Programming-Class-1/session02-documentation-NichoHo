<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test-submit', function () {
    return view('test-submit');
});

Route::post('/submit', function () {
    return "Submitted";
});

Route::put('/update', function () {
    return "Updated";
});

Route::delete('/remove', function () {
    return "Deleted";
});

Route::get('/admin/student', function () {
    return view('admin.student');
});

Route::get('/admin/lecturer', function () {
    return view('admin.lecturer');
});

Route::get('/admin/employee', function () {
    return view('admin.employee');
});

Route::prefix('/admin')->group(function(){
    Route::get('/mahasiswa', function(){
        return "<h1>Daftar Mahasiswa</h1>";
    });

    Route::get('/dosen', function(){
        return "<h1>Daftar Dosen</h1>";
    });

    Route::get('/karyawan', function(){
        return "<h1>Daftar Karyawan</h1>";
    });
});

Route::match(['get', 'post'], '/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }else if ($request->isMethod('delete')) {
        return 'Form deleted';
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nicho', "age" => 20]);
});

Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]);
});

// 2.4 Route Fall Back => Fallback route for undefined pages
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});