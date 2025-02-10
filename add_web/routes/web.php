<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddCreateController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\MobilephoneController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;

use FontLib\Table\Type\post;
use App\Models\SubCategory;


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

/*Route::get('/', function () {
    return view('web_site.web_page.home');
}); */



Route::get('/get-subcategories', [CatergoryController::class, 'getSubcategories'])->name('get-subcategories');

Route::get('/', [WebsiteController::class, 'index'])->name('index_web');
Route::get('/addvertesmen', [WebsiteController::class, 'show'])->name('addvertesmen');

Route::get('/addvertesmen_filer', [WebsiteController::class, 'filter_web'])->name('addvertesmen_filer');

Route::get('/addvertesmen_details/{id}', [WebsiteController::class, 'addvertesmen_details'])->name('addvertesmen_details');




// routes/web.php







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Route::middleware(['auth'])->group(function (){
   // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    //admint withrak dena permition
   Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Other admin routes can go 
    Route::any('/add_category/{id}', [AdminController::class, 'store'])->name('add_category');
    Route::any('/add_hold/{id}', [AdminController::class, 'hold'])->name('add_hold');
    Route::any('/add_rejected/{id}', [AdminController::class, 'rejected'])->name('add_rejected');


    //add data view addmin dashbord function
/*
    Route::get('/view_vehicle', [VehicleController::class, 'index'])->name('view_vehicle');
    Route::get('/view_phone', [MobilephoneController::class, 'index'])->name('view_phone');
    Route::get('/view_property', [PropertyController::class, 'index'])->name('view_property');
    Route::get('/view_fashion', [FashionController::class, 'index'])->name('view_fashion');

   */
  //post view addmin
 Route::get('/view_post', [postController::class, 'index'])->name('view_post');
 Route::delete('/post_delete/{id}', [postController::class, 'destroy'])->name('post_delete');
 Route::get('/filter_post', [postController::class, 'filter'])->name('filter_post');

   //delete function eka user addmin dennataa denna ona nisa pahalin damma 
  // Route::delete('/fashion_delete/{id}', [FashionController::class, 'destroy'])->name('fashion_delete');
 //  Route::delete('/phone_delete/{id}', [MobilephoneController::class, 'destroy'])->name('phone_delete');
   //Route::delete('/property_delete/{id}', [PropertyController::class, 'destroy'])->name('property_delete');
   //Route::delete('/vehicle_delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle_delete');
   
       
    
     //catergory routes addmin only
     Route::get('/category_create', [CatergoryController::class, 'index'])->name('category_create');
     Route::post('/category_save', [CatergoryController::class, 'store'])->name('category_save');
     Route::get('/category_show', [CatergoryController::class, 'show'])->name('category_show');
     
     Route::delete('/category_delete/{id}', [CatergoryController::class, 'destroy'])->name('category_delete');
     Route::any('/category_edit/{id}', [CatergoryController::class, 'edit'])->name('category_edit');
     Route::put('/category_update/{id}', [CatergoryController::class, 'update'])->name('category_update');

     // Other admin routes can go 

     //sub catagory
     Route::get('/sub_category_create', [SubCategoryController::class, 'index'])->name('sub_category_create');
     Route::post('/sub_category_save', [SubCategoryController::class, 'store'])->name('sub_category_save');
     Route::get('/sub_category_show', [SubCategoryController::class, 'show'])->name('sub_category_show');
     
     Route::delete('/sub_category_delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category_delete');
     Route::any('/sub_category_edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category_edit');
     Route::put('/sub_category_update/{id}', [SubCategoryController::class, 'update'])->name('sub_category_update');


     });

      //user filter option
      Route::get('/filter_post_user', [postController::class, 'filter_user'])->name('filter_post_user');
      Route::get('/user_view_post', [postController::class, 'show'])->name('user_view_post');
      // post delete
      Route::delete('/user_post_delete/{id}', [postController::class, 'delete'])->name('user_post_delete');
      Route::any('/post_edit/{id}', [postController::class, 'edit'])->name('post_edit');
      Route::put('/update_post_add/{id}', [postController::class, 'update'])->name('update_post_add');



        //delete function
     Route::delete('/user_fashion_delete/{id}', [FashionController::class, 'destroy'])->name('user_fashion_delete');
     Route::delete('/user_phone_delete/{id}', [MobilephoneController::class, 'destroy'])->name('user_phone_delete');
     Route::delete('/user_property_delete/{id}', [PropertyController::class, 'destroy'])->name('user_property_delete');
     Route::delete('/user_vehicle_delete/{id}', [VehicleController::class, 'destroy'])->name('user_vehicle_delete');

     //user 

     //user view posted add
     Route::get('/user_view_vehicle', [VehicleController::class, 'show'])->name('user_view_vehicle');
     Route::get('/user_view_phone', [MobilephoneController::class, 'show'])->name('user_view_phone');
     Route::get('/user_view_property', [PropertyController::class, 'show'])->name('user_view_property');
     Route::get('/user_view_fashion', [FashionController::class, 'show'])->name('user_view_fashion');
 

    //user edit routs
     Route::any('/fashion_edit/{id}', [FashionController::class, 'edit'])->name('fashion_edit');
     Route::any('/phone_edit/{id}', [MobilephoneController::class, 'edit'])->name('phone_edit');
     Route::any('/property_edit/{id}', [PropertyController::class, 'edit'])->name('property_edit');
     Route::any('/vehicle_edit/{id}', [VehicleController::class, 'edit'])->name('vehicle_edit');

     //user update
     //Route::put('/update_post_add/{id}', [AddCreateController::class, 'update'])->name('update_post_add');





     //user dashbord view function 
     Route::get('/dashboard_user', [userController::class, 'index'])->name('dashboard_user');

     //add frome view
     Route::get('/add_create', [AddCreateController::class, 'index'])->name('add_create');
     //add strore function
     Route::post('/add_store', [AddCreateController::class, 'store'])->name('add_store');
     Route::delete('/add_delete/{id}', [AddCreateController::class, 'destroy'])->name('add_delete');

     


     //notification view
     
     Route::get('/notification_user', function () {
        return view('user.user_notification');
    })->name('notification_user');



     //Route::middleware(['auth'])->group(function () {

        Route::get('/profile_edit', function () {
            return view('profile_edit');
        })->name('profile_edit'); //});
    
  });

  
//multi authentication


 

