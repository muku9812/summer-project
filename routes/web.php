<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BookController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\AnnouncementController;
use App\Http\Controllers\backend\IssueController;
use App\Http\Controllers\backend\BatchController;
use App\Http\Controllers\backend\FacultyController;
use App\Http\Controllers\backend\ReturnController;
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

//Route::get('/', 'IssueController@index');
//Route::get('/status/update', 'IssueController@updateStatus')->name('backend.issue.update.status');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['web','auth'])->group(function() {

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('book/add', [BookController::class, 'create']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('book',BookController::class);
//Route::resource('student',StudentController::class);



    Route::resource('announcement',AnnouncementController::class);
    Route::resource('issue',IssueController::class);
    Route::resource('batch',BatchController::class);
    Route::resource('faculty',FacultyController::class);
    Route::resource('student',StudentController::class);
    Route::resource('book',BookController::class);


    Route::get('issue/pdf_view', [IssueController::class, 'createPDF'])->name('export-pdf');
    Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');

});













//    Route::get('book/create', [BookController::class, 'create'])->name('book.create');
//    Route::post('book', [BookController::class, 'store'])->name('book.store');
//    Route::get('book', [BookController::class, 'index'])->name('book.index');
//    Route::get('book/{id}', [BookController::class, 'show'])->name('book.show');
//    Route::delete('book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
//    Route::get('book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
//    Route::put('book/{id}/edit', [BookController::class, 'update'])->name('book.update');
//
//    Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
//    Route::post('student', [StudentController::class, 'store'])->name('student.store');
//    Route::get('student', [StudentController::class, 'index'])->name('student.index');
//    Route::get('student/{id}', [StudentController::class, 'show'])->name('student.show');
//    Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
//    Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
//    Route::put('student/{id}/edit', [StudentController::class, 'update'])->name('student.update');

//    Route::get('announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
//    Route::post('announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
//    Route::get('announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
//    Route::get('announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
//    Route::delete('announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
//    Route::get('announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
//    Route::put('announcement/{id}/edit', [AnnouncementController::class, 'update'])->name('announcement.update');






//    Route::get('issue/changeStatus', [IssueController::class, 'changeStatus'])->name('issue.changeStatus');
//    Route::get('issue/create', [IssueController::class, 'create'])->name('issue.create');
//    Route::post('issue', [IssueController::class, 'store'])->name('issue.store');
//    Route::get('issue', [IssueController::class, 'index'])->name('issue.index');
//    Route::get('issue/{id}', [IssueController::class, 'show'])->name('issue.show');
//    Route::get('issue/{id}/edit', [IssueController::class, 'edit'])->name('issue.edit');
//    Route::put('issue/{id}', [IssueController::class, 'update'])->name('issue.update');
//    Route::delete('issue/{id}', [IssueController::class, 'destroy'])->name('issue.destroy');
//    Route::post('issue/{id}/restore', [IssueController::class, 'restore'])->name('issue.restore');
//    Route::get('issue/trash', [IssueController::class, 'trash'])->name('issue.trash');


//    Route::get('batch/create', [BatchController::class, 'create'])->name('batch.create');
//    Route::post('batch', [BatchController::class, 'store'])->name('batch.store');
//    Route::get('batch', [BatchController::class, 'index'])->name('batch.index');
//    Route::get('batch/{id}', [BatchController::class, 'show'])->name('batch.show');
//    Route::get('batch/{id}/edit', [BatchController::class, 'edit'])->name('batch.edit');
//    Route::put('batch/{id}/edit', [BatchController::class, 'update'])->name('batch.update');
//    Route::delete('batch/{id}', [BatchController::class, 'destroy'])->name('batch.destroy');
//    Route::post('batch/search', [BatchController::class, 'search'])->name('batch.search');

//
//    Route::get('faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
//    Route::post('faculty', [FacultyController::class, 'store'])->name('faculty.store');
//    Route::get('faculty', [FacultyController::class, 'index'])->name('faculty.index');
//    Route::get('faculty/{id}', [FacultyController::class, 'show'])->name('faculty.show');
//    Route::get('faculty/{id}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
//    Route::put('faculty/{id}/edit', [FacultyController::class, 'update'])->name('faculty.update');
//    Route::delete('faculty/{id}', [FacultyController::class, 'destroy'])->name('faculty.destroy');

//    Route::get('/search', 'BatchController@search');
//    Route::get('/search', 'IssueController@search');


//    Route::get('members', 'issueController@index');
//    Route::get('updateStatus', 'issueController@updateStatus');
//Route::get('/changeStatus',[IssueController::class,'changeTransactionStatus'])->name('changeStatus');


//Route::get('/issue/pdf', [IssueController::class, 'createPDF']);


