<?php

// Admin Controller
use App\Http\Controllers\admin\admin_controller;
use App\Http\Controllers\admin\branches_controller;
use App\Http\Controllers\admin\branchesContact_controller;
use App\Http\Controllers\admin\category_controller;
use App\Http\Controllers\admin\department_controller;
use App\Http\Controllers\admin\exchange_controller;
use App\Http\Controllers\admin\login_controller as adminLogin;
use App\Http\Controllers\admin\product_controller;
use App\Http\Controllers\admin\subCategory_controller;
use App\Http\Controllers\admin\unit_controller;

// Cashier Controller
use App\Http\Controllers\cashier\cashier_controller;
use App\Http\Controllers\cashier\login_controller as cashierLogin;

// Stock keeper Controller
use App\Http\Controllers\stockkeeper\stock_controller;
use App\Http\Controllers\stockkeeper\login_controller as stockkeeperLogin;

use App\Http\Controllers\welcome_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [welcome_controller::class, 'index'])->name('welcome');

// Admin Middleware
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guests'], function () {
        // login 
        Route::get('login', [adminLogin::class, 'index'])->name('admin.login');
        Route::post('authenticate', [adminLogin::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        // Logout
        Route::get('logout', [adminLogin::class, 'logout'])->name('admin.logout');

        // Show Dashboard
        Route::get('/', [admin_controller::class, 'dashboard'])->name('admin.dashboard');
        Route::get('dashboard', [admin_controller::class, 'dashboard'])->name('admin.dashboard');

        // Category
        Route::get('category', [category_controller::class, 'category'])->name('category');
        Route::post('/categories/addCategory', [category_controller::class, 'addCategory'])->name('categories.add');
        Route::get('/categories/{id}/edit', [category_controller::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [category_controller::class, 'update'])->name('categories.update');
        Route::post('/categories/delete/{id}', [category_controller::class, 'updateStatus'])->name('categories.delete');

        // Sub-Category
        Route::get('subcategory', [subCategory_controller::class, 'subcategory'])->name('subcategory');
        Route::post('/subcategories/addSubcategory', [subCategory_controller::class, 'addSubcategory'])->name('subcategories.add');
        Route::get('/subcategories/{id}/edit', [subCategory_controller::class, 'edit'])->name('subcategories.edit');
        Route::put('/subcategories/{id}', [subCategory_controller::class, 'update'])->name('subcategories.update');
        Route::post('/subcategories/delete/{id}', [subCategory_controller::class, 'updateStatus'])->name('subcategories.delete');

        // Unit
        Route::get('unit', [unit_controller::class, 'unit'])->name('units');
        Route::post('/addUnit', [unit_controller::class, 'addUnit'])->name('units.add');
        Route::get('/units/{id}/edit', [unit_controller::class, 'edit'])->name('units.edit');
        Route::put('/units/{id}', [unit_controller::class, 'update'])->name('units.update');
        Route::post('/units/delete/{id}', [unit_controller::class, 'updateStatus'])->name('units.delete');

        // Branches
        Route::get('/branches', [branches_controller::class, 'branches'])->name('branches');
        Route::post('/branches/add', [branches_controller::class, 'addBranches'])->name('branches.add');
        Route::get('/branches/{id}/edit', [branches_controller::class, 'edit'])->name('branches.edit');
        Route::put('/branches/{id}', [branches_controller::class, 'update'])->name('branches.update');
        Route::post('/branches/delete/{id}', [branches_controller::class, 'updateStatus'])->name('branches.delete');

        // Branch Contacts
        // Route::get('/branches/contacts/{id}', [branchesContact_controller::class, 'index'])->name('branches.contacts');
        // Route::post('/branches/contacts/add', [branchesContact_controller::class, 'addContact'])->name('branches.contacts.add'); // Fixed name
        // Route::get('/branches/contacts/{id}/edit', [branchesContact_controller::class, 'edit'])->name('branches.contacts.edit');
        // Route::put('/branches/contacts/{id}', [branchesContact_controller::class, 'update'])->name('branches.contacts.update');
        // Route::post('/branches/contacts/delete/{id}', [branchesContact_controller::class, 'updateStatus'])->name('branches.contacts.delete');

        // Exchange rate
        Route::get('exchangeRate', [exchange_controller::class, 'exchangeRate'])->name('exchangeRate');
        Route::get('/exchangeRate/{id}/edit', [exchange_controller::class, 'edit'])->name('exchangeRate.edit');
        Route::put('/exchangeRate/{id}', [exchange_controller::class, 'update'])->name('exchangeRate.update');

        // Product
        Route::get('/products', [product_controller::class, 'product']);
        Route::get('/addProduct', [product_controller::class, 'addProduct']);
        Route::post('/addProductSubmit', [product_controller::class, 'addProductSubmit']);
        Route::get('/stock', [product_controller::class, 'stock']);
        Route::get('/printBarcode', [product_controller::class, 'printBarcode']);

        // Department
        Route::get('department', [department_controller::class, 'department'])->name('department');
        Route::post('/department/add', [department_controller::class, 'add'])->name('department.add');
    });
});


// Cashier Middleware
Route::group(['prefix' => 'cashier'], function () {

    Route::group(['middleware' => 'cashier.guests'], function () {
        // login 
        Route::get('login', [cashierLogin::class, 'index'])->name('cashier.login');
        Route::post('authenticate', [cashierLogin::class, 'authenticate'])->name('cashier.authenticate');
    });

    Route::group(['middleware' => 'cashier.auth'], function () {
        // Logout
        Route::get('logout', [cashierLogin::class, 'logout'])->name('cashier.logout');

        // Show Dashboard
        Route::get('/', [cashier_controller::class, 'dashboard'])->name('cashier.dashboard');
        Route::get('dashboard', [cashier_controller::class, 'dashboard'])->name('cashier.dashboard');
    });
});




// Stock Keeper Middleware
Route::group(['prefix' => 'stockkeeper'], function () {

    Route::group(['middleware' => 'stockkeeper.guests'], function () {
        // login 
        Route::get('login', [stockkeeperLogin::class, 'index'])->name('stockkeeper.login');
        Route::post('authenticate', [stockkeeperLogin::class, 'authenticate'])->name('stockkeeper.authenticate');
    });

    Route::group(['middleware' => 'stockkeeper.auth'], function () {
        // Logout
        Route::get('logout', [stockkeeperLogin::class, 'logout'])->name('stockkeeper.logout');

        // Show Dashboard
        Route::get('/', [stock_controller::class, 'dashboard'])->name('stockkeeper.dashboard');
        Route::get('dashboard', [stock_controller::class, 'dashboard'])->name('stockkeeper.dashboard');
    });
});





Route::get('/register', [adminLogin::class, 'register'])->name('register');
Route::post('/processRegister', [adminLogin::class, 'processRegister'])->name('processRegister');





// Admin Panel


// Inventory (product, category, unit)

Route::get('/admin/subCategory', [admin_controller::class, 'subCategory']);



// Stock
Route::get('/admin/stockIn', [admin_controller::class, 'stockIn']);
Route::get('/admin/stockOut', [admin_controller::class, 'stockOut']);
Route::get('/admin/stockTransfer', [admin_controller::class, 'stockTransfer']);
Route::get('/admin/stockAdjustment', [admin_controller::class, 'stockAdjustment']);

// Sale
Route::get('/admin/sale', [admin_controller::class, 'sale']);
Route::get('/admin/invoice', [admin_controller::class, 'invoice']);
Route::get('/admin/saleReturn', [admin_controller::class, 'saleReturn']);

// Membership Card
Route::get('/admin/card', [admin_controller::class, 'card']);
Route::get('/admin/createCard', [admin_controller::class, 'createCard']);

// People
Route::get('/admin/customer', [admin_controller::class, 'customer']);
Route::get('/admin/supplier', [admin_controller::class, 'supplier']);

// Purchase
Route::get('/admin/purchase', [admin_controller::class, 'purchase']);

// Report
Route::get('/admin/saleReport', [admin_controller::class, 'getSaleReport']);
Route::get('/admin/inventoryReport', [admin_controller::class, 'inventoryReport']);
Route::get('/admin/purchaseReport', [admin_controller::class, 'purchaseReport']);
Route::get('/admin/endOfDayClosingReport', [admin_controller::class, 'endOfDayClosingReport']);
Route::get('/admin/expenseReport', [admin_controller::class, 'expenseReport']);
Route::get('/admin/incomeReport', [admin_controller::class, 'incomeReport']);
Route::get('/admin/vatReport', [admin_controller::class, 'vatReport']);

// User
Route::get('/admin/users', [admin_controller::class, 'user']);
Route::get('/admin/addUser', [admin_controller::class, 'addUser']);

// Employee
Route::get('/admin/employee', [admin_controller::class, 'employee']);





// Cashier
Route::get('/cashier/sales', [cashier_controller::class, 'sales']);
Route::get('/cashier/saleReturn', [cashier_controller::class, 'return']);

Route::post('/testingSendData', [cashier_controller::class, 'senddata']);
Route::post('/testingSendData', [cashier_controller::class, 'senddata']);
