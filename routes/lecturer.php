<?php


//  All Lecturer Methods goes here !
use App\Http\Controllers\Lecturer\ProposalController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('lecturer/authentication', [LecturerController::class, 'lect_auth']);
Route::post('lecturer/authentication', [LecturerController::class, 'studAuth'])->name('lecturer.lect_auth.submit');


Route::get('lecturer/login', [LecturerController::class, 'showLoginForm'])->name('lecturer.auth.login');
Route::post('lecturer/login', [LecturerController::class, 'doLogin'])->name('lecturer.auth.login.submit');

Route::middleware('lecturer')
    ->prefix('lecturer')
    ->name('lecturer.')
    ->group(function () {
        Route::get('/chat',[MainController::class,'chat'])->name('lecturer.chat');
        Route::post('/logout', [LecturerController::class, 'logout'])->name('logout');
        Route::get('/view_student/{id}', [LecturerController::class, 'viewstudent'])->name('view_student');
        Route::get('/grade_student', [LecturerController::class, 'grade_student'])->name('grade_student');
        Route::get('/view_student_upload', [LecturerController::class, 'view_student_upload'])->name('view_student_upload');
        Route::get('/view_notice_board', [LecturerController::class, 'view_notice_board'])->name('view_notice_board');
        Route::get('/list_uploads', [LecturerController::class, 'showUploadsList'])->name('list_uploads');
        Route::match(['get', 'post'], '/list_uploads/{id}', [LecturerController::class, 'viewUploadInfo'])
        ->whereNumber('id')
        ->name('view_upload');
        Route::get('/dashboard', [LecturerController::class,'lecturerdash'])->name('dashboard');


        //PROPOSALS
        Route::prefix('proposal')
            ->name('proposal.')
            ->group(function () {
                Route::get('/', [ProposalController::class, 'index'])->name('index');
                //View information
                Route::get('/{id}', [ProposalController::class, 'viewProposal'])
                    ->whereNumber('id')
                    ->name('view');
                //Accept
                Route::get('/{id}/accept', [ProposalController::class, 'accept'])
                    ->whereNumber('id')
                    ->name('accept');
                //Reject
                Route::get('/{id}/reject', [ProposalController::class, 'reject'])
                    ->whereNumber('id')
                    ->name('reject');
            });
    });
