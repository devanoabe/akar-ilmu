<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\KartuSoalController;
use App\Http\Controllers\JenisSoalController;
use App\Http\Controllers\ExamController;


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


Auth::routes();

//Route khusus untuk admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    //Route Beranda
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin.beranda');

    //Route User
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');

    //Route Mapel
    Route::post('CariMapel', [MataPelajaranController::class, 'cariMapel'])->name('cariMapel');
    Route::resource('mapel', MataPelajaranController::class)->name('mapel', 'admin.mapel');

    //Route Tryout
    Route::get('/exam', [AdminController::class, 'examDashboard'])->name('admin.exam');
    Route::post('/add-exam', [AdminController::class, 'addExam'])->name('addExam');
    Route::get('/get-exam-detail/{id}', [AdminController::class, 'getExamDetails'])->name('getExamDetails');
    Route::post('/update-exam', [AdminController::class, 'updateExam'])->name('updateExam');
    Route::post('/delete-exam', [AdminController::class, 'deleteExam'])->name('deleteExam');

    //Route Soal
    Route::get('/qna-ans', [AdminController::class, 'qnaDashboard'])->name('admin.qna');
    Route::post('/add-qna-ans', [AdminController::class, 'addQna'])->name('addQna');
    Route::get('/get-qna-details', [AdminController::class, 'getQnaDetails'])->name('getQnaDetails');
    Route::get('/delete-ans', [AdminController::class, 'deleteAns'])->name('deleteAns');
    Route::post('/update-qna-ans', [AdminController::class, 'updateQna'])->name('updateQna');
    Route::post('/delete-qna-ans', [AdminController::class, 'deleteQna'])->name('deleteQna');

    //Route Tryout Soal
    Route::get('/get-questions', [AdminController::class, 'getQuestions'])->name('getQuestions');
    Route::post('/add-questions', [AdminController::class, 'addQuestions'])->name('addQuestions');
    Route::get('/get-exam-questions', [AdminController::class, 'getExamQuestions'])->name('getExamQuestions');
    Route::get('/delete-exam-questions', [AdminController::class, 'deleteExamQuestions'])->name('deleteExamQuestions');

    //Route Marks
    Route::get('/marks', [AdminController::class, 'loadMarks'])->name('admin.marks');
    Route::post('/update-marks', [AdminController::class, 'updateMarks'])->name('updateMarks');


    //Route Review
    Route::get('/review-exam', [AdminController::class, 'reviewExam'])->name('admin.review');
    Route::get('/get-reviewed-qna',[AdminController::class,'reviewQna'])->name('reviewQna');

    Route::post('/approved-qna',[AdminController::class, 'approvedQna'])->name('approvedQna');

});


//Route khusus untuk user
Route::get('/welcome', [HomeController::class, 'welcome'])->name('home.welcome');

Route::get('/dashboard', [UserController::class, 'loadDashboard'])->name('home.dashboard');;
Route::get('/exam/{id}', [ExamController::class, 'loadExamDashboard']);
Route::post('/exam-submit', [ExamController::class, 'examSubmit'])->name('examSubmit');




//User Route
// Route::middleware(['auth','user-role:user'])->group(function()
// {
//     Route::get('/user/home',[HomeController::class, 'userHome'])->name('home.user');
// });

//Admin Route
// Route::middleware(['auth','user-role:admin'])->group(function()
// {
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home.admin');
// });
