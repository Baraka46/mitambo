<?php

use App\Http\Controllers\CustomerPackageDetailController;
use App\Http\Controllers\GodownPackageController;
use App\Http\Controllers\RolePermissionController;
use App\Livewire\DynamicForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewGodownSectionRowController;

// Route::get('/', function () {
//     return view('items.create');
// });

Route::get('/', function () {
    return view('welcome');
});






Route::group(['middleware' => ['role:admin']], function () {

// Route to show the form
Route::get('/create-roles-permissions', [RolePermissionController::class, 'showForm'])->name('roles.permissions.form');
// Route to handle role creation
Route::post('/create-role', [RolePermissionController::class, 'createRole'])->name('create.role');
// Route to handle permission creation
Route::post('/create-permission', [RolePermissionController::class, 'createPermission'])->name('create.permission');

Route::post('/assign-role/{user}', [RolePermissionController::class, 'assignRole'])->name('assign.role');
Route::post('/remove-role/{user}', [RolePermissionController::class, 'removeRole'])->name('remove.role');

});

Route::group(['middleware' => ['role:officer']], function () {
    Route::get('/c', function () {
        return view('copy');
    })->name('paste_data');

    Route::get('/officer', [CustomerPackageDetailController::class, 'index'])->name('officer.index');
    Route::get('/officer/create', [CustomerPackageDetailController::class, 'create'])->name('officer.create');
    Route::post('/officer/store', [CustomerPackageDetailController::class, 'store'])->name('officer.store');    
});



Route::group(['middleware' => ['role:officer|godown_supervisor']], function () {
    Route::resource('godown_packages', GodownPackageController::class);
    Route::get('/livewire/update', [GodownPackageController::class, 'index']);

    Route::get('/officer/searchresult', [CustomerPackageDetailController::class, 'searchResult'])->name('officer.search');
    Route::get('/officer/search', [CustomerPackageDetailController::class, 'search']);
    Route::get('/officer/ajax-search', [CustomerPackageDetailController::class, 'ajaxSearch'])->name('officer.search.ajax');
});
// routes/web.php

//form



Route::get('/new-godown-section-row/create', [NewGodownSectionRowController::class, 'create'])->name('new.godown_section_row.create');
Route::post('/new-godown-section-row/store', [NewGodownSectionRowController::class, 'store'])->name('new.godown_section_row.store');


Route::get('/dynamic-form', DynamicForm::class)->name('dynamic-form');


Route::get('/s', function (){
return view('sss');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
