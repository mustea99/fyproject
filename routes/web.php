<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', function () {
    return redirect()->to('/student/login');
});


Route::get('/home', [MainController::class, 'index']);
Route::get('test/view', [MainController::class, 'testView']);
Route::get('test/view/arguments', [MainController::class, 'testViewArgs']);
Route::get('check-pass', [MainController::class, 'checkPass'])->middleware('check.pass');
// Route::get('login', [AuthController::class, 'login']);
// Route::post('login', [AuthController::class, 'doLogin']);

//MUSTY
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.home');
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'doLogin'])->name('admin.login');

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::get('view_student', [AdminController::class, 'view_student'])->name('admin.view_student');
        Route::get('manage_student', [AdminController::class, 'readdStudent'])->name('admin.manage_student');
        Route::get('delete_student/{id}', [AdminController::class, 'deleteStudent'])->name('delete.student');
        Route::get('edit_student/{id}', [AdminController::class, 'EditStudent'])->name('edit.student');
        Route::post('update_student/{id}', [AdminController::class, 'UpdateStudent'])->name('update.student');
        Route::get('manage_student', [AdminController::class, 'register']);
        Route::get('manage_lecturer', [AdminController::class, 'lecturer'])->name('admin.manage_lecturer');
        Route::post('manage_lecturer', [AdminController::class, 'addLecturer'])->name('admin.manage_lecturer.submit');


        Route::get('edit_lecturer/{id}', [AdminController::class, 'editLecturer'])->name('lecturer.edit');
        Route::post('update_lecturer/{id}', [AdminController::class, 'UpdateLecturer'])->name('update.lecturer');
        Route::get('delete_lecturer/{id}', [AdminController::class, 'deleteLecturer'])->name('delete.lecturer');


        Route::get('dashboard', [AdminController::class, 'admindash'])->name('admin.dashboard');

        Route::get('post', [AdminController::class, 'post'])->name('admin.post');
        Route::post('post', [AdminController::class, 'createPost'])->name('post.submit');
        Route::get('assign_supervisor', [AdminController::class, 'assign_supervisor'])->name('admin.assign_supervisor');
        Route::get('supervisor_list', [AdminController::class, 'assign_supervisor_list_lecturers'])->name('admin.supervisor_list');
        Route::get('assign_supervisor/{student}/list-lecturers', [AdminController::class, 'assign_supervisor_list_lecturers'])->name('admin.assign_supervisor.list-lecturers');
        Route::get('manage_project', [AdminController::class, 'project'])->name('admin.manage_project');
        Route::get('manage_student', [AdminController::class, 'student'])->name('admin.manage_student');
        Route::get('manage_student', [AdminController::class, 'student'])->name('admin.manage_student');
        Route::post('manage_student', [AdminController::class, 'addStudent'])->name('admin.manage_student.submit');
        Route::get('view_lecturer', [Admincontroller::class, 'view_lecturer'])->name('admin.view_lecturer');
    });
});

// All Student Methods goes here !
Route::get('student/authentication', [StudentController::class, 'studAuthForm']);
Route::post('student/authentication', [StudentController::class, 'studAuth'])->name('student.stud_auth.submit');


Route::get('student/create_password', [StudentController::class, 'createPassForm'])->name('student.create_password');
Route::post('student/create_password', [StudentController::class, 'doCreatePass'])->name('student.create_password.submit');



Route::get('student/login', [StudentController::class, 'loginForm'])->name('student.auth.login');
Route::post('student/login', [StudentController::class, 'studLogin'])->name('student.auth.login.submit');

Route::post('student/logout', [StudentController::class, 'logout'])->name('student.logout');

Route::middleware('student')
    ->prefix('student')
    ->group(function () {
        Route::get('/View Notice Board', [studentController::class, 'stud_view_notice'])->name('student.view_notice_board');
        Route::get('/view_supervisor', [StudentController::class, 'view_supervisor'])->name('student.view_supervisor');
        Route::get('/proposal', [StudentController::class, 'listProposals'])->name('student.proposal');
        Route::get('/proposal/add', [StudentController::class, 'showProposal'])->name('student.proposal.add');
        Route::post('/proposal/add', [StudentController::class, 'saveProposal'])->name('student.proposal.add');
        Route::get('/proposal/{pid}', [StudentController::class, 'viewProposal'])
            ->whereNumber('pid')
            ->name('student.proposal.view');

        Route::get('/proposal/{pid}/upload/', [StudentController::class, 'upload'])->name('student.proposal.upload');
        Route::post('/proposal/{pid}/upload/', [StudentController::class, 'saveUpload'])->name('student.proposal.upload.save');

        Route::get('student/view_feedback', [StudentController::class, 'view_feedback'])->name('student.view_feedback');
        Route::get('student/submit_approved', [StudentController::class, 'showApproved'])->name('approved.project');
        Route::get('student/list_uploads',[StudentController::class,'showUploadsList'])->name('student.list.uploads');
    });

//  All Lecturer Methods goes here !
Route::get('lecturer/authentication', [LecturerController::class, 'lect_auth']);
Route::post('lecturer/authentication', [LecturerController::class, 'studAuth'])->name('lecturer.lect_auth.submit');


Route::get('lecturer/login', [LecturerController::class, 'showLoginForm'])->name('lecturer.auth.login');
Route::post('lecturer/login', [LecturerController::class, 'doLogin'])->name('lecturer.auth.login.submit');

Route::middleware('lecturer')
    ->prefix('lecturer')
    ->group(function () {
        Route::post('/logout', [LecturerController::class, 'logout'])->name('lecturer.logout');
        Route::get('/view_student/{id}', [LecturerController::class, 'viewstudent'])->name('lecturer.view_student');
        Route::get('/grade_student', [LecturerController::class, 'grade_student'])->name('lecturer.grade_student');
        Route::get('/view_student_upload', [LecturerController::class, 'view_student_upload'])->name('lecturer.view_student_upload');
        Route::get('/view_notice_board', [LecturerController::class, 'view_notice_board'])->name('lecturer.view_notice_board');
        Route::get('/send_feedback', [LecturerController::class, 'send_feedback'])->name('lecturer.send_feedback');
        Route::get('/feedback/comment/{id}', [LecturerController::class, 'send_feedback'])->name('feedback.comment');
        Route::get('/manage_proposal', [LecturerController::class, 'studProposal'])->name('lecturer.manage_proposal');
        Route::post('/send_feedback/{id}',[LecturerController::class,'sendFeed'])->name('send.feedback.submit');
    
    });
