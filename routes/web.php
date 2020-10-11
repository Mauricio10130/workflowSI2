<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('clientes', 'CustomersController');
Route::resource('empleados', 'EmployeesController');
Route::resource('administradores', 'AdministratorController');
Route::resource('roles', 'RoleController');
<<<<<<< HEAD
=======
Route::resource('departamentos', 'DepartmentsController');
>>>>>>> Mauricio
