<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Controllers\Agent\WishlistController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/current-time', function () {
    return view('current-time');
});

//User Frontend All Routes
Route::get('/', [UserController::class, 'Index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::get('user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::post('user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
    Route::get('user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
});

require __DIR__ . '/auth.php';

//Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
});



Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);





//Admin Middleware Group for Property Type
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Admin Route Group for Property Type
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('all/type', 'AllType')->name('all.type');
        Route::get('add/type', 'AddType')->name('add.type');
        //Storing Property Name Data
        Route::post('store/type', 'StoreType')->name('store.type');
        //Editing Property Name Data
        Route::get('edit/type/{id}', 'EditType')->name('edit.type');
        Route::get('delete/type/{id}', 'DeleteType')->name('delete.type');
        Route::post('update/type', 'UpdateType')->name('update.type');
    });

    //Admin Route Group for Amenitie Type
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('add/amenities', 'AddAmenities')->name('add.amenities');
        //Storing Amenitie Name Data
        Route::post('store/amenities', 'StoreAmenities')->name('store.amenities');
        //Editing Amenitie Name Data
        Route::get('edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::post('update/amenities', 'UpdateAmenities')->name('update.amenities');
        Route::get('delete/amenities/{id}', 'DeleteAmenities')->name('delete.amenities');
    });

    //Admin Route Group for Properties
    Route::controller(PropertyController::class)->group(function () {
        Route::get('all/property', 'AllProperty')->name('all.property');
        Route::get('add/property', 'AddProperty')->name('add.property');
        Route::post('store/property', 'StoreProperty')->name('store.property');
        Route::get('edit/property/{id}', 'EditProperty')->name('edit.property');
        Route::post('update/property', 'UpdateProperty')->name('update.property');
        Route::post('update/property/thumbnail', 'UpdatePropertyThumbnail')->name('update.property.thumbnail');
        Route::post('update/property/multiimage', 'UpdatePropertyMultiimage')->name('update.property.multiimage');
        Route::get('property/multiimage/delete/{id}', 'PropertyMultiimageDelete')->name('property.multiimage.delete');
        Route::post('store/new/multiimage', 'StoreNewMultiimage')->name('store.new.multiimage');
        Route::post('update/property/facilities', 'UpdatePropertyFacilities')->name('update.property.facilities');
        Route::get('delete/property/{id}', 'DeleteProperty')->name('delete.property');
        Route::get('details/property/{id}', 'DetailsProperty')->name('details.property');
        Route::post('inactive/property', 'InactiveProperty')->name('inactive.property');
        Route::post('active/property', 'ActiveProperty')->name('active.property');
        //messages
        Route::get('admin/property/message', 'AdminPropertyMessage')->name('admin.property.message');
        Route::get('admin/message/details/{id}', 'AdminMessageDetails')->name('admin.message.details');
    });
});


//Agents Group Middleware
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::post('agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
    Route::post('agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password');
});

Route::get('agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');



//controller to show and add agents from admin dashboard
Route::controller(AdminController::class)->group(function () {
    Route::get('all/agent', 'AllAgent')->name('all.agent');
    Route::get('add/agent', 'AddAgent')->name('add.agent');
    Route::post('store/agent', 'StoreAgent')->name('store.agent');
    Route::get('edit/agent/{id}', 'EditAgent')->name('edit.agent');
    Route::post('update/agent', 'UpdateAgent')->name('update.agent');
    Route::get('delete/agent/{id}', 'DeleteAgent')->name('delete.agent');
    //toggling agent status from admin dashboard
    Route::get('/changeStatus', 'changeStatus');
});



//Agents Group Middleware for Agent Dahboard
Route::middleware(['auth', 'role:agent'])->group(function () {
    //group controller for agent to add property
    Route::controller(AgentPropertyController::class)->group(function () {
        Route::get('agent/all/property', 'AgentAllProperty')->name('agent.all.property');
        Route::get('agent/add/property', 'AgentAddProperty')->name('agent.add.property');
        Route::post('agent/store/property', 'AgentStoreProperty')->name('agent.store.property');
        Route::get('agent/edit/property/{id}', 'AgentEditProperty')->name('agent.edit.property');
        Route::post('agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');
        Route::post('agent/update/property/thumbnail', 'AgentUpdatePropertyThumbnail')->name('agent.update.property.thumbnail');
        Route::post('agent/update/property/multiimage', 'AgentUpdatePropertyMultiimage')->name('agent.update.property.multiimage');
        Route::get('/agent/property/multiimg/delete/{id}', 'AgentPropertyMultiimgDelete')->name('agent.property.multiimage.delete');
        Route::post('agent/store/new/multiimage', 'AgentStoreNewMultiimage')->name('agent.store.new.multiimage');
        Route::post('agent/update/property/facilities', 'AgentUpdatePropertyFacilities')->name('agent.update.property.facilities');

        Route::get('agent/delete/property/{id}', 'AgentDeleteProperty')->name('agent.delete.property');
        Route::get('agent/details/property/{id}', 'AgentDetailsProperty')->name('agent.details.property');


        //messages
        Route::get('agent/property/message', 'AgentPropertyMessage')->name('agent.property.message');
        Route::get('agent/message/details/{id}', 'AgentMessageDetails')->name('agent.message.details');
    });
});


 // State  All Route 
 Route::controller(StateController::class)->group(function(){
    Route::get('/all/state', 'AllState')->name('all.state'); 

});


//display rent, buy and property types
Route::get('rent/property', [IndexController::class, 'RentProperty'])-> name('rent.property');
Route::get('buy/property', [IndexController::class, 'BuyProperty'])-> name('buy.property');
Route::get('property/type/{id}', [IndexController::class, 'PropertyType'])-> name('property.type');



//Universal Middleware (Everyone Can Access)
Route::get('property/details/{id}/{slug}', [IndexController::class, 'PropertyDetails']);
//Wishlist routings
Route::post('/add-to-wishList/{property_id}', [WishlistController::class, 'AddToWishList']);

//message sending route(from property detail page)
Route::post('/property/message', [IndexController::class, 'PropertyMessage'])->name('property.message');

//message sending route(from agent detail page)
Route::post('/agent/details/message', [IndexController::class, 'AgentDetailsMessage'])->name('agent.details.message');

//agent details view
Route::get('/agent/details/{id}', [IndexController::class, 'AgentDetails'])->name('agent.details');

//buy search option homepage
Route::post('/buy/property/search', [IndexController::class, 'BuyPropertySeach'])->name('buy.property.search');
Route::post('/rent/property/search', [IndexController::class, 'RentPropertySeach'])->name('rent.property.search');
