<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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




Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'register_post'])->name('register.post');
Route::get('/', [AuthController::class, 'loadLogin']);
Route::get('/getlogin', [AuthController::class, 'getlogin'])->name('getlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['web', 'isAdmin']], function () {
    Route::get('/admin', [AdminController::class, 'home']);


    Route::get('/employee', [AdminController::class, 'employee']);
    Route::post('/addemployee', [AdminController::class, 'addemployee'])->name('addemployee.post');
    Route::get('/deleteemployee/{id}', [AdminController::class, 'deleteemployee'])->name('delete.employee');
    Route::get('/editemployee/{id}', [AdminController::class, 'editemployee'])->name('edit.employee');
    Route::get('/viewemployee/{id}', [AdminController::class, 'viewemployee'])->name('view.employee');
    Route::post('/updateemployee/{id}', [AdminController::class, 'updateemployee'])->name('update.employee');
    Route::get('/search', [AdminController::class, 'search']);




    Route::prefix('Jobs')->group(function () {
        Route::get('/', [AdminController::class, 'jobs']);
        Route::post('/jobs/store', [AdminController::class, 'jobsstore'])->name('jobs.store');
        Route::get('/deleteJobs/{id}', [AdminController::class, 'deleteJobs'])->name('delete.Jobs');
        Route::get('/editJobs/{id}', [AdminController::class, 'editJobs'])->name('edit.Jobs');
        Route::post('/updateJobs/{id}', [AdminController::class, 'updateJobs'])->name('update.Jobs');
    });


    Route::prefix('jobshistory')->group(function () {
    Route::get('/', [AdminController::class, 'jobshistory']);
    Route::post('jobshistorystore', [AdminController::class, 'jobshistorystore'])->name('jobshistory.store');
        Route::get('/deletejobshistory/{id}', [AdminController::class, 'deletejobshistory'])->name('delete.jobshistory');
        Route::get('/editjobshistory/{id}', [AdminController::class, 'editjobshistory'])->name('edit.jobshistory');
        Route::post('/updatejobshistory/{id}', [AdminController::class, 'updatejobshistory'])->name('update.jobshistory');

    });

    Route::prefix('JobGrade')->group(function () {
        Route::get('/', [AdminController::class, 'JobGrade']);
        Route::post('/JobGradestore', [AdminController::class, 'JobGradestore'])->name('JobGrade.store');
        Route::get('/deleteJobGrades/{id}', [AdminController::class, 'deleteJobGrades'])->name('delete.JobGrades');
        Route::get('/editJobGrades/{id}', [AdminController::class, 'editJobGrades'])->name('edit.JobGrades');
        Route::post('/updateJobGrades/{id}', [AdminController::class, 'updateJobGrades'])->name('update.JobGrades');



    });

    Route::prefix('Department')->group(function () {
        Route::get('/', [AdminController::class, 'createDepartment']);
        Route::post('/departments/store', [AdminController::class, 'departmentsstore'])->name('departments.store');
        Route::get('/deletedepartments/{id}', [AdminController::class, 'deletedepartments'])->name('delete.departments');
        Route::get('/editdepartments/{id}', [AdminController::class, 'editdepartments'])->name('edit.departments');
        Route::post('/updatedepartments/{id}', [AdminController::class, 'updatedepartments'])->name('update.departments');

    });
    Route::prefix('Regions')->group(function () {
        Route::get('/', [AdminController::class, 'regionscreate']);
        Route::post('/regions/store', [AdminController::class, 'regionstore'])->name('regions.store');
        Route::get('/deleteregions/{id}', [AdminController::class, 'deleteregions'])->name('delete.regions');
        Route::get('/editregions/{id}', [AdminController::class, 'editregions'])->name('edit.regions');
        Route::post('/updateregions/{id}', [AdminController::class, 'updateregions'])->name('update.regions');

    });

    Route::prefix('countries')->group(function () {
        Route::get('/', [AdminController::class, 'countriescreate']);
        Route::post('/countries/store', [AdminController::class, 'countriestore'])->name('countries.store');
        Route::get('/deletecountries/{id}', [AdminController::class, 'deletecountries'])->name('delete.countries');
        Route::get('/editcountries/{id}', [AdminController::class, 'editcountries'])->name('edit.countries');
        Route::post('/updatecountries/{id}', [AdminController::class, 'updatecountries'])->name('update.countries');

    });
    Route::prefix('Location')->group(function () {
        Route::get('/', [AdminController::class, 'Locationcreate']);
        Route::post('/Location/store', [AdminController::class, 'Locationtore'])->name('Location.store');
        Route::get('/deleteLocation/{id}', [AdminController::class, 'deleteLocation'])->name('delete.Location');
        Route::get('/editLocation/{id}', [AdminController::class, 'editLocation'])->name('edit.Location');
        Route::post('/updateLocation/{id}', [AdminController::class, 'updateLocation'])->name('update.Location');
    });
});
Route::prefix('Dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'Dashboard']);

});
Route::prefix('Manager')->group(function () {
    Route::get('/', [AdminController::class, 'ManagerCreate']);
    Route::post('/Managers/store', [AdminController::class, 'Managerstore'])->name('Managers.store');
    Route::get('/deleteManagers/{id}', [AdminController::class, 'deleteManagers'])->name('delete.Managers');
    Route::get('/editManagers/{id}', [AdminController::class, 'editManagers'])->name('edit.Managers');
    Route::post('/updateManagers/{id}', [AdminController::class, 'updateManagers'])->name('update.Managers');


});

Route::prefix('Payroll')->group(function () {
    Route::get('/', [AdminController::class, 'PayrollCreate'])->name('Payroll.create');
    Route::post('/Payroll/store', [AdminController::class, 'Payrollstore'])->name('Payroll.store');
    Route::get('/deletePayroll/{id}', [AdminController::class, 'deletePayroll'])->name('delete.Payroll');
    Route::get('/editPayroll/{id}', [AdminController::class, 'editPayroll'])->name('edit.Payroll');
    Route::post('/updatePayroll/{id}', [AdminController::class, 'updatePayroll'])->name('update.Payroll');
});


// ********** User Routes *********
Route::group(['middleware' => ['web', 'isUser']], function () {
    Route::get('/home', [HomeController::class, 'home']);

});
