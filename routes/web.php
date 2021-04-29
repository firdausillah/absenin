<?php

use App\Http\Controllers\{AuthController, DashboardController, HomeController};
use App\Http\Controllers\Admin\{Day_OffController, GradeController, HourController, ScheduleController, SchoolController, UserController};
use Illuminate\Support\Facades\Route;

Route::get('', AuthController::class);
Route::post('auth', [AuthController::class, 'login'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('siswa/register', [AuthController::class, 'siswa'])->name('siswa.register');

Route::group(['middleware' => 'userrole:admin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    // Kelas
    Route::group(['prefix' => 'kelas'], function(){
        Route::get('', GradeController::class)->name('admin.grade');
        Route::get('create', [GradeController::class, 'create'])->name('admin.grade.create');
        Route::post('create', [GradeController::class, 'save']);
        Route::get('edit/{grade:slug}', [GradeController::class, 'edit'])->name('admin.grade.edit');
        Route::put('edit/{grade:slug}', [GradeController::class, 'update']);
        Route::get('delete/{grade:slug}', [GradeController::class, 'destroy'])->name('admin.grade.delete');
    });

    //Jam Absen
    Route::group(['prefix' => 'jam-absen-guru'], function(){
        Route::get('', HourController::class)->name('admin.hour.guru');
        Route::get('create', [HourController::class, 'createGuru'])->name('admin.hour.guru.create');
        Route::post('create', [HourController::class, 'save']);
        Route::get('edit/{hour:id}', [HourController::class, 'editGuru'])->name('admin.hour.guru.edit');
        Route::put('edit/{hour:id}', [HourController::class, 'update']);
        Route::get('delete/{hour:id}', [HourController::class, 'destroy'])->name('admin.hour.guru.delete');
    });
    Route::group(['prefix' => 'jam-absen-siswa'], function(){
        Route::get('', [HourController::class, 'siswa'])->name('admin.hour.siswa');
        Route::get('create', [HourController::class, 'createSiswa'])->name('admin.hour.siswa.create');
        Route::post('create', [HourController::class, 'save']);
        Route::get('edit/{hour:id}', [HourController::class, 'editSiswa'])->name('admin.hour.siswa.edit');
        Route::put('edit/{hour:id}', [HourController::class, 'update']);
        Route::get('delete/{hour:id}', [HourController::class, 'destroy'])->name('admin.hour.siswa.delete');
    });

    // daftar hari libur
    Route::group(['prefix' => 'daftar-hari-libur'], function(){
        Route::get('', Day_OffController::class)->name('admin.dayOff');
        Route::post('search', [Day_OffController::class, 'search'])->name('admin.dayOff.search');
        Route::get('create', [Day_OffController::class, 'create'])->name('admin.dayOff.create');
        Route::post('create', [Day_OffController::class, 'save']);
        Route::get('edit/{day_off:id}', [Day_OffController::class, 'edit'])->name('admin.dayOff.edit');
        Route::put('edit/{day_off:id}', [Day_OffController::class, 'update']);
        Route::get('delete/{day_off:id}', [Day_OffController::class, 'destroy'])->name('admin.dayOff.delete');
    });

    // jadwal pelajaran
    Route::group(['prefix' => 'jadwal-pelajaran'], function(){
        Route::get('', ScheduleController::class)->name('admin.schedule');
        Route::put('update/{schedule:id}', [ScheduleController::class, 'update'])->name('admin.schedule.update');
    });

    // data sekolah
    Route::group(['prefix' => 'data-sekolah'], function(){
        Route::get('', SchoolController::class)->name('admin.data.sekolah');
        Route::put('update/{school:id}', [SchoolController::class, 'update'])->name('admin.data.sekolah.update');
    });
    
    // data users
    Route::group(['prefix' => 'data-user'], function(){
        Route::get('', UserController::class)->name('admin.data.user');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('create', [UserController::class, 'save']);
        Route::get('edit/{user:username}', [UserController::class, 'edit'])->name('admin.data.user.edit');
        Route::put('edit/{user:username}', [UserController::class, 'update']);
        Route::get('delete/{user:username}', [UserController::class, 'destroy'])->name('admin.data.user.delete');
        Route::delete('delete-users}', [UserController::class, 'deleteAll'])->name('admin.data.user.delete.all');
    });
});

Route::group(['middleware' => 'userrole:guru', 'prefix' => 'guru'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('guru.dashboard');
});

Route::group(['middleware' => 'userrole:siswa', 'prefix' => 'siswa'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('siswa.dashboard');
});