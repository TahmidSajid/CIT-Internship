<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [\App\Http\Controllers\FrontendController::class, 'view'])->name('index');


// *********** Dashboard route Start ***********

Route::middleware('CheckAdmin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /**
     * Get the profile view.
     *
     * Add the user's profile picture.
     *
     * Change the user's name.
     *
     * Change the user's email.
     *
     * Verify the user's OTP.
     */
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile');
    Route::post('/profile/picture/add', [App\Http\Controllers\ProfileController::class, 'profile_picture'])->name('profile_picture');
    Route::post('/profile/name/change', [App\Http\Controllers\ProfileController::class, 'name_change'])->name('name_change');
    Route::post('/profile/email/change', [App\Http\Controllers\ProfileController::class, 'email_change'])->name('email_change');
    Route::post('/profile/otp/verify', [App\Http\Controllers\ProfileController::class, 'otp_verify'])->name('otp_verify');



    /**
     * Define RESTful resource routes for the CategoryController.
     *
     * This will generate the standard CRUD routes for the given controller.
     */
    Route::resource('category', CategoriesController::class);
    Route::get('/category/make/showcase/{showcase}/{category_id}', [App\Http\Controllers\CategoriesController::class, 'make_showcase'])->name('make_showcase');


    /**
     * Routes for user management functionality.
     *
     * - 'users' - Resource routes for managing users
     * - 'user/list/{role}' - Route to list users by role
     * - 'user/list/make/{role}/{id}' - Route to change a user's role
     */
    Route::resource('users', UserManagementController::class);
    Route::get('/user/list/{role}', [App\Http\Controllers\UserManagementController::class, 'list'])->name('list');
    Route::get('/user/list/make/{role}/{id}', [App\Http\Controllers\UserManagementController::class, 'change_role'])->name('change_role');

    /**
     * Define a resource route for the 'contactUs' endpoint, which maps to the ContactUsController.
     * This creates the standard set of routes for the controller, including GET, POST, PUT, DELETE, etc.
     */
    Route::resource('contactUs', ContactUsController::class);



    /**
     * Routes for the information management functionality.
     *
     * @route GET information/view
     * @name info_page
     * @controller App\Http\Controllers\InformationsController::view
     * @description Displays the information view page.
     *
     * @route GET information/add/social
     * @name add_social
     * @controller App\Http\Controllers\InformationsController::add_social
     * @description Displays the page to add a new social media link.
     *
     * @route GET information/update/social/{id}
     * @name update_social
     * @controller App\Http\Controllers\InformationsController::update_social
     * @description Displays the page to update an existing social media link.
     *
     * @route GET information/delete/social/{id}
     * @name delete_social
     * @controller App\Http\Controllers\InformationsController::delete_social
     * @description Deletes an existing social media link.
     *
     * @route POST information/logo/add
     * @name add_logo
     * @controller App\Http\Controllers\InformationsController::add_logo
     * @description Adds a new logo to the information.
     *
     * @route POST information/add
     * @name add_info
     * @controller App\Http\Controllers\InformationsController::add_info
     * @description Adds new information.
    */
    Route::get('information/view', [App\Http\Controllers\InformationsController::class, 'view'])->name('info_page');
    Route::get('information/add/social', [App\Http\Controllers\InformationsController::class, 'add_social'])->name('add_social');
    Route::get('information/update/social/{id}', [App\Http\Controllers\InformationsController::class, 'update_social'])->name('update_social');
    Route::get('information/delete/social/{id}', [App\Http\Controllers\InformationsController::class, 'delete_social'])->name('delete_social');
    Route::post('information/logo/add', [App\Http\Controllers\InformationsController::class, 'add_logo'])->name('add_logo');
    Route::post('information/add', [App\Http\Controllers\InformationsController::class, 'add_info'])->name('add_info');


    /**
     * Routes for managing post specialities.
     *
     * @route GET post/make/feature/{id}
     * @route GET post/make/editor/{id}
     * @route GET post/make/trending/{id}
     * @route GET post/delete/speciality/{id}
     */
    Route::get('post/make/feature/{id}', [App\Http\Controllers\PostsController::class, 'make_feature'])->name('make_feature');
    Route::get('post/make/editor/{id}', [App\Http\Controllers\PostsController::class, 'make_editor'])->name('make_editor');
    Route::get('post/make/trending/{id}', [App\Http\Controllers\PostsController::class, 'make_trending'])->name('make_trending');
    Route::get('post/delete/speciality/{id}', [App\Http\Controllers\PostsController::class, 'delete_speciality'])->name('delete_speciality');
});


// *********** Dashboard route end ***********



// *********** Front end route Start ***********

/**
 * User authentication routes.
 *
 * - 'user/' - Show login view
 * - 'user/register' - Handle user registration
 * - 'user/login' - Handle user login
 * - 'user/logout' - Log user out
 */
Route::get('user/', [App\Http\Controllers\UsersController::class, 'login_view'])->name('login_view');
Route::post('user/register', [App\Http\Controllers\UsersController::class, 'user_register'])->name('user_register');
Route::post('user/login', [App\Http\Controllers\UsersController::class, 'user_login'])->name('user_login');
Route::get('user/logout', [App\Http\Controllers\UsersController::class, 'user_logout'])->name('user_logout');


/**
 * User profile routes.
 *
 * - 'user/profile' - Show user profile view
 * - 'user/picture/add' - Handle user profile picture upload
 * - 'user/name/change' - Handle user name change
 * - 'user/email/change' - Handle user email change
 * - 'user/otp/verify' - Verify OTP for user profile changes
 */
Route::get('user/profile', [App\Http\Controllers\UserProfileController::class, 'user_profile'])->name('user_profile');
Route::post('/user/picture/add', [App\Http\Controllers\UserProfileController::class, 'profile_picture'])->name('user_profile_picture');
Route::post('/user/name/change', [App\Http\Controllers\UserProfileController::class, 'name_change'])->name('user_name_change');
Route::post('/user/email/change', [App\Http\Controllers\UserProfileController::class, 'email_change'])->name('user_email_change');
Route::post('/user/otp/verify', [App\Http\Controllers\UserProfileController::class, 'otp_verify'])->name('user_otp_verify');




/**
 * Define routes for the Posts resource.
 *
 * @route POST|PUT|GET|DELETE post
 * @controller App\Http\Controllers\PostsController
 *
 * @route GET post/single/view/{id}
 * @controller App\Http\Controllers\PostsController
 * @method single_view
 * @name post_view
 */
Route::resource('post', PostsController::class)->middleware('CheckWritter');
Route::get('post/single/view/{id}', [App\Http\Controllers\PostsController::class, 'single_view'])->name('post_view');



/**
 * Defines the routes for the comments resource, allowing for standard CRUD operations.
 */
Route::resource('comment', CommentsController::class);



/**
 * Route to view posts for a specific category.
 *
 * @param int $category_id The ID of the category to view posts for.
 * @param string $category_name The name of the category to view posts for.
 * @return \Illuminate\Http\Response
 */
Route::get('category/post/{category_id}/{category_name}', [App\Http\Controllers\CategoryPostController::class, 'view'])->name('category_post');



/**
 * Defines two routes for the contact page functionality:
 * 1. `contact/page` - Handles the view for the contact page.
 * 2. `contact/page/from` - Handles the submission of the contact form.
 */
Route::get('contact/page', [App\Http\Controllers\ContactController::class, 'view'])->name('contact_page');
Route::post('contact/page/from', [App\Http\Controllers\ContactController::class, 'contact_form'])->name('contact_form');


/**
 * Handle a search request.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
Route::post('search/', [App\Http\Controllers\SearchController::class, 'search'])->name('search');



/**
 * Route to view a special post.
 *
 * @param  \App\Models\SpecialPost  $special
 * @return \Illuminate\Http\Response
 */
Route::get('special/post/{special}', [App\Http\Controllers\SpecialPostController::class, 'view'])->name('special_post');
Route::get('posts/all', [App\Http\Controllers\FrontendController::class, 'post_all'])->name('post_all');


/**
 * View a notification.
 *
 * @param int $id The ID of the notification to view.
 * @return \Illuminate\Http\Response
 */
Route::get('notification/view/{id}', [App\Http\Controllers\NotificationController::class, 'view'])->name('notifi_view');



// *********** Front end route End ***********
