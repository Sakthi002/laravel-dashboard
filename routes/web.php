<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {

    $brands = DB::table('brands')->get();
    $slides = DB::table('sliders')->get();
    $about = DB::table('abouts')->first();
    $services = DB::table('services')->get();
    $images = Multipic::all();

    return view('home',compact('brands', 'slides', 'about', 'services', 'images'));
});

Route::get('/home',function(){
    echo "This is home page";
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/category/all', [CategoryController::class,'allCategories'])->name('category.all');

Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory']);

Route::get('/category/trash/{id}', [CategoryController::class, 'moveToTrash']);

Route::get('/category/restore/{id}', [CategoryController::class, 'restoreCategory']);

Route::get('/category/delete/{id}',[CategoryController::class, 'deleteCategory']);

// BRAND ROUTES
Route::get('/brand/all', [BrandController::class, 'index'])->name('brand.all');

Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);

Route::post('/brand/update/{id}',[BrandController::class, 'updateBrand']);

Route::get('/brand/delete/{id}', [BrandController::class, 'deleteCategory']);
// END BRAND ROUTES==============================================================

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //ELOQUENT ORM METHOD//
    // $users = User::all();

    //QYERY BUILDER METHOD//
    $users = DB::table('users')->get();

    return view('admin.index');

})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'logOut'])->name('user.logout');

// SLIDER ROUTES==========================================================================
Route::get('/slider/all', [SliderController::class, 'index'])->name('slider.all');

Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.add');

Route::post('/slider/add', [SliderController::class, 'addSlide'])->name('store.slide');

Route::get('/slider/edit/{id}', [SliderController::class, 'edit']);

Route::post('/slider/update/{id}', [SliderController::class, 'updateSlide']);

Route::get('/slider/delete/{id}', [SliderController::class, 'deleteSlide']);
// END SLIDER ROUTES===========================================================

// ABOUT ROUTES=========================================================================
Route::get('/about/all', [AboutController::class, 'index'])->name('about.all');

Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');

Route::get('/about/edit/{id}', [AboutController::class, 'edit']);

Route::post('/about/add', [AboutController::class, 'addAbout'])->name('store.about');

Route::post('/about/update/{id}', [AboutController::class, 'updateAbout']);

Route::get('/about/delete/{id}', [AboutController::class, 'deleteAbout']);
//END ABOUT ROUTES============================================================

// SERVICE ROUTES==============================================================================
Route::get('/services/all',[ServiceController::class, 'index'])->name('services.all');
Route::get('/service/create',[ServiceController::class, 'create'])->name('service.create');
Route::get('/service/edit/{id}',[ServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/add',[ServiceController::class, 'addService'])->name('store.service');
Route::post('/service/update/{id}',[ServiceController::class, 'updateService'])->name('update.service');
Route::get('/service/delete/{id}',[ServiceController::class, 'deleteService'])->name('delete.service');
// END SERVICE ROUTES============================================================================================

// MULTI IMAGE ROUTES================================================================================
Route::get('/portfolio', [BrandController::class, 'multiImage'])->name('portfolio');

Route::post('/upload/images', [BrandController::class, 'storeImages'])->name('store.images');
// END PORTFOLIO ROUTES================================================================================

// CLIENT PANEL ROUTES
Route::get('/client/portfolio', [ClientController::class, 'portfolioPage'])->name('client.portfolio');

Route::get('/client/services', [ClientController::class, 'servicesPage'])->name('client.services');

Route::get('/client/about', [ClientController::class, 'aboutPage'])->name('client.about');

// ADMIN CONTACT ROUTES
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.admin');

Route::get('/admin/contact/create', [ContactController::class, 'create'])->name('contact.admin.create');

Route::post('/admin/contact/add',[ContactController::class, 'addContact'])->name('store.admin.contact');

Route::get('/admin/contact/edit/{id}',[ContactController::class, 'edit'])->name('edit.admin.contact');

Route::post('/admin/contact/update/{id}',[ContactController::class, 'updateContact'])->name('update.admin.contact');

Route::get('/admin/contact/delete/{id}',[ContactController::class, 'deleteContact'])->name('delete.admin.contact');

Route::get('/admin/contact/messages',[ContactController::class, 'contactMessages'])->name('contact.messages.admin');

Route::get('/admin/contact/message/delete/{id}', [ContactController::class, 'deleteContactMessage']);
// END ADMIN CONTACT ROUTES

// CLIENT CONTACT ROUTES
Route::get('/client/contact', [ClientController::class, 'contactPage'])->name('contact.client');

Route::post('/client/contact/form', [ClientController::class, 'contactForm']);
// END CLIENT CONTACT ROUTES

// ADMIN CHANGE PASSWORD|PROFILE ROUTES
Route::get('/admin/password', [ProfileController::class, 'password'])->name('admin.change.password');

Route::post('/admin/update/password', [ProfileController::class, 'updatePassword'])->name('admin.update.password');

Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.change.profile');

Route::post('/admin/update/profile', [ProfileController::class, 'updateProfile'])->name('admin.update.profile');



