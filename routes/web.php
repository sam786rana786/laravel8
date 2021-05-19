<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

// Home Route
Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('services')->get();
    $multipics = DB::table('multipics')->paginate(5);
    return view('home', compact('brands', 'abouts', 'services', 'multipics'));
});


Route::get('/about', function () {
    return view('about');
});
//Logout Route
Route::get('/logout', [CategoryController::class, 'Logout'])->name('logout');

// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

// Brand Routes
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'AddImage'])->name('store.image');

//Home Admin Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/slider/store', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);

// Admin About Controller
Route::get('/home/about', [AboutController::class, 'About'])->name('home.about');
Route::get('/home/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/about/store', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);
Route::post('/about/update/{id}', [AboutController::class, 'Update']);
Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);

// Admin Services Controller
Route::get('/home/service', [ServiceController::class, 'Service'])->name('home.services');
Route::post('/service/store', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'Edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'Update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'Delete']);

// Frontend Routes
Route::get('/portfolio', [FrontendController::class, 'Portfolio'])->name('portfolio');
Route::get('/contact', [FrontendController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [FrontendController::class, 'ContactForm'])->name('contact.form');



// Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'Contact'])->name('admin.contact');
Route::post('/contact/store', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'Edit']);
Route::post('/contact/update/{id}', [ContactController::class, 'Update']);
Route::get('/contact/delete/{id}', [ContactController::class, 'Delete']);

//Admin Contact Form Routes
Route::get('/admin/contact/form', [ContactController::class, 'ContactForm'])->name('admin.contactform');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('admin.index', compact('users'));
})->name('dashboard');
