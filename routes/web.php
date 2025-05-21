<?php

use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\AssignTechnicianController;
use App\Http\Controllers\TechnicianDashboardController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\DepartmentController;
use App\Livewire\Employees\Employee;
use App\Livewire\Requests\Request;
use App\Livewire\Technicians\Technician;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportforuserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Requestforadmin;
use App\Http\Controllers\ResponseByteTechnicianController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Livewire\Department\Department;
use App\Livewire\Help\Help;
use App\Livewire\Notification\Notification;
use App\Livewire\Profile\Profile;
use App\Livewire\Response\Response;
use App\Livewire\notifications\notifications;
use App\Livewire\Requestsforadmin\Requestsforadmin;
use App\Livewire\Requestsofuser\Requestsofuser;
use App\Livewire\Responsebytechnician\Responsebytechnician;
use App\Http\Controllers\RequestforadminController;
use App\Http\Controllers\ResponsebytechnicianController;
use App\Livewire\Report\Report;
 use App\Livewire\Reportforuser\Reportforuser;


 use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportforadminController;
use App\Http\Controllers\ResponseForUserController;
use App\Http\Livewire\ResponseForUser\ResponseForUser as ResponseForUserResponseForUser;
use App\Livewire\Answerforrequest\Answerforrequest;
// use App\Livewire\Reportforadmin\Reportforadmin;
use App\Livewire\Reportforadmin\Reportforadmin;
use App\Livewire\Responseforuser\Responseforuser;


// use App\Http\Livewire\ResponseForUser\ResponseForUser;
// use App\Http\Livewire\Reportforuser\Reportforuser;

Route::get('/', function () {

   //dd("Well Come");
    return view('welcome');
});





// Route::post('/logout', function () {
//   Auth::logout();
//     return redirect('/'); // Redirect to the welcome page (assuming it's the homepage)
// })->name('logout');



// Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::middleware([])->group(function () {
       // dd("Welcome");
       Route::get('/', function () {

        //dd("Well Come");
         return view('welcome');
     });
     
Route::get('/dashboard', function () {
 // //dd('Well l');
         return view('dashboard');
    })->name('dashboard');


    Route::get('/home', [HomeController::class, 'index']);
    //  Route::get('/employees',Employee::class)->name('employee');
    Route::get('/request',Request::class)->name('request');
    Route::get('/requests',Request::class)->name('requests');
    Route::get('/department',Department::class)->name('department');
    Route::get('/profile',Profile::class);
      Route::get('/profiles',Profile::class)->name('profile');
    Route::get('/requestsofuser',Requestsofuser::class)->name('requestsofuser');
    Route::get('/responsebytechnician',Responsebytechnician::class)->name('responsebytechnician');
    // Route::get('/report',Report::class)->name('report');

    Route::get('/reportforuser',Reportforuser::class)->name('reportforuser');
    Route::get('/reportforadmin',Reportforadmin::class)->name('reportforadmin');
    Route::get('/responseforuser',Responseforuser::class)->name('responseforuser');
    Route::get('/answerforrequest',Answerforrequest::class)->name('answerforrequest');

Route::get('/reportforadmins', [ReportforadminController::class, 'showResponsesByTechnician'])->name('report.generate');

Route::get('/reportforadmin', [ReportforadminController::class, 'showResponsesByTechnician'])->name('reportforadmin');



Route::get('/response-for-user', ResponseForUser::class)->name('response.for.user');






    // // Route to display the form for generating user-specific reports
    // Route::get('/reportforuser', Reportforuser::class)->name('reportforuser');
    
    // // Route to handle the form submission for the user-specific report
    // Route::get('/reportforuser/show', [Reportforuser::class, 'displayForUser'])->name('reportforuser.display');
    

// Route to display the report form
// Route::get('/report', Report::class)->name('report');

// Route to handle form submission and display the report
// Route::get('/reports', [Report::class, 'display'])->name('report.display');




    //  Route::get('/report',Report::class)->name('report');

    //  Route::get('/reports', [Report::class, 'display'])->name('report.display');
     //Route::get('/reports', [Report::class, 'display'])->name('report.display');


Route::get('/requestsforadmin', [RequestforadminController::class, 'showRequestsForAdmin'])->name('requestsforadmin');


// Route::get('/responsebytechnician', [ResponseController::class, 'showResponses'])->name('responsebytechnician');

    // Route::get('/requestsforadmin', [Requestforadmin::class, 'showRequestsForAdmin'])->name('requests.for.admin');
    

// routes/web.php

// Route::get('/responsebytechnician', [ResponseController::class, 'showResponse'])->name('responsebytechnician');


// routes/web.php




Route::get('/admin/requests', [RequestforadminController::class, 'showRequestsForAdmin'])->name('admin.requests');


Route::get('/responsebytechnician', [ResponsebytechnicianController::class, 'showResponsesByTechnician'])->middleware('auth')->name('responsebytechnician');





/////////////////////////////////////////////////////////////////////
Route::get('/reports', [ReportforuserController::class, 'showResponsesByTechnician'])->middleware('auth')->name('report.display');
/////////////////////////////////////////////////////////////////////
Route::get('/reports', [ReportforadminController::class, 'showResponsesByTechnician'])->middleware('auth')->name('report.display');




// Route::get('/responsebytechnician', [ResponsebytechnicianController::class, 'index'])->name('responsebytechnician');


// Route to show the form to respond to a specific request
Route::get('/response/{id}', [ResponseController::class, 'show'])->name('response.show');

// Route to store the response to a specific request
Route::post('/response/{id}', [ResponseController::class, 'store'])->name('response.store');

// Route to display the response for a specific request
// Route::get('/responsebytechnician/{id}', [ResponseController::class, 'showResponseByTechnician'])->name('responsebytechnician.show');


    // Route::get('/response/{id}', [ResponseController::class, 'show'])->name('response.show');
    // Route::post('/response/store/{id}', [ResponseController::class, 'store'])->name('response.store');
    // Route::get('/responsebytechnician/{id}', [ResponseController::class, 'responsebytechnicianShow'])->name('responsebytechnician.show');
    
// Route::get('/responsebytechnician/{id}', [ResponseByteTechnicianController::class, 'show'])
//     ->name('responsebytechnician');




// Route for showing responses for a specific technician
// Route::get('/responsebytechnician', [ResponseController::class, 'showUserResponses'])->name('responsebytechnician');



// routes/web.php


/////////////////////////////////////////////////
//  Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');




    //  Route::get('/aboutme', [ProfileController::class, 'show'])->name('profile.show');
    

//////////////////////////////////////
    //   Route::put('/aboutme/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
   /////////////////////////////  
    // Route::get('/requestsofuser', [RequestController::class, 'index'])->name('user.requests');


    Route::get('/requestsofuser', [RequestController::class, 'index'])->name('requestsofuser');

  

    Route::get('/response',Response::class)->name('response');



// Define a route for showing the response form
Route::get('/response/{id}', [ResponseController::class, 'show'])->name('response.show');
// Route to handle the form submission
Route::post('/response/{id}', [ResponseController::class, 'store'])->name('response.store');
// Route::get('/responsesbytechnician', [ResponseController::class, 'showResponseByTechnician'])->name('responsebytechnician');
 Route::get('/responses', [ResponseController::class, 'index'])->name('responses.index');
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
 Route::get('employees/data', [EmployeeController::class, 'getData'])->name('employees.data');
Route::get('/requests/create', [RequestController::class, 'create'])->name('requests.create');
// routes/web.php


Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/create-request', [RequestController::class, 'create'])->name('requests.create');
Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');




// routes/web.php


Route::get('/employees', [UserController::class, 'index'])->name('employee');
Route::get('/employees/create', [UserController::class, 'create'])->name('employees.create');
Route::post('/employees', [UserController::class, 'store'])->name('employees.store');
Route::get('/employees/{user}/edit', [UserController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{user}', [UserController::class, 'update'])->name('employees.update');
Route::delete('/employees/{user}', [UserController::class, 'destroy'])->name('employees.destroy');



Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


// web.php
// Route::get('/generate-report', [ReportController::class, 'generateReport'])->name('generate.report');



Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});


// routes/web.php

Route::get('/assign-technician/{id}', [App\Http\Controllers\ResponseController::class, 'showAssignTechnicianForm'])->name('assign-technician');
// routes/web.php

Route::post('/assign-technician/{id}', [App\Http\Controllers\ResponseController::class, 'storeAssignedTechnician'])->name('assign-technician.store');
// routes/web.php

Route::get('/user-requests', [App\Http\Controllers\ResponseController::class, 'showUserRequests'])->name('user-requests');

// routes/web.php




// For a resource controller
Route::resource('requests', RequestController::class);

// OR for a simple route
Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');





// routes/web.php
Route::get('/technicians/assign/{id}', [TechnicianController::class, 'showAssignForm'])
     ->name('assign-technician.show');

Route::post('/technicians/assign/{id}', [TechnicianController::class, 'processAssignment'])
     ->name('assign-technician.store');


     

Route::get('/technicians/assign', [TechnicianController::class, 'assign'])->name('assign-technician');

Route::get('/response/{id}/assign', [ResponseController::class, 'showAssignTechnicianForm'])->name('response.assignForm');
Route::post('/response/{id}/assign', [ResponseController::class, 'assignTechnician'])->name('response.assign');



// // Route to show technician's assigned requests
// Route::get('/technician/response', [RequestController::class, 'showTechnicianResponsePage'])->name('technician.response');

// // Route to update request status by technician
// Route::post('/technician/response/{id}', [RequestController::class, 'updateRequestStatus'])->name('technician.update');

// // routes/web.php
// Route::get('/assign-technician/{id}', [RequestController::class, 'respond'])->name('assign-technician');

// // routes/web.php
// Route::post('/submit-response/{id}', [RequestController::class, 'submitResponse'])->name('submit-response');


// routes/web.php

// Route to show the response form
Route::get('/respond-to-request/{id}', [RequestController::class, 'showResponseForm'])->name('respond-to-request');
//Route::get('/respond-to-request', [RequestController::class, 'showResponseForm'])->name('respond-to-request');

// Route to submit the response
Route::post('/submit-response/{id}', [RequestController::class, 'submitResponse'])->name('submit-response');




Route::get('/assign-technician/{id}', [AssignTechnicianController::class, 'create'])->name('assign-technician.create');


Route::post('/assign-technician/{id}', [AssignTechnicianController::class, 'store'])->name('assign-technician.store');



Route::get('/technician/requests', [TechnicianDashboardController::class, 'responseForUser'])->name('technician.requests');

// Route::get('/technician/requests', [TechnicianDashboardController::class, 'responseForUser'])->name('technician.requests');
Route::post('/requests/{request}/assign-technician', [AssignTechnicianController::class, 'store'])
     ->name('assign-technician.store');


   
     
   Route::get('/user/requests', [RequestController::class, 'index'])->name('user.requests');
  
});
