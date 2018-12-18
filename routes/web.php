<?php

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
            return view('index');
        });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'api'], function() {
            Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
            Route::post('authenticate', 'AuthenticateController@authenticate');
            Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
        });
Route::post('api/user/store', 'UsersController@store');
Route::post('api/user/storeBusinessUser', 'UsersController@storeBusinessUser');
Route::post('api/user/sendemail', 'UsersController@sendemail');
Route::post('api/user/store_two', 'UsersController@store_two');
Route::post('api/user/store_one', 'UsersController@store_one');
Route::post('api/user/check_unique_username_email', 'UsersController@check_unique_username_email');
Route::post('api/user/upload_profile_pic', 'UsersController@upload_profile_pic');
Route::get('api/user/users', 'UsersController@index');
Route::post('api/user/verify_user_registration_token', 'UsersController@verify_user_registration_token');
Route::post('api/user/retrieve_password', 'UsersController@retrieve_password');
Route::post('api/user/set_new_password', 'UsersController@set_new_password');

Route::post('api/projects/store', 'ProjectsController@store');
Route::get('api/projects', 'ProjectsController@index');
Route::post('api/projects/allProjects', 'ProjectsController@allProjects' )->name('allProjects');
Route::get('api/projects/get_type_of_projects', 'ProjectsController@get_type_of_projects');
Route::get('api/projects/get_all_technologies', 'ProjectsController@get_all_technologies');
Route::get('api/projects/get_all_equivalent_relevant_skills', 'ProjectsController@get_all_equivalent_relevant_skills');
Route::get('api/projects/get_all_certificates', 'ProjectsController@get_all_certificates');
Route::get('api/projects/get_all_freelancer_skills', 'ProjectsController@get_all_freelancer_skills');

Route::get('api/countries/get_all_countries', 'CountriesController@get_all_countries');
Route::post('api/states/get_country_state', 'StatesController@get_country_state');
Route::post('api/cities/get_state_city', 'CitiesController@get_state_city');

Route::get('api/primary_skills/get_all_primary_skills', 'PrimarySkillsController@get_all_primary_skills');
Route::get('api/secondary_skills/get_all_secondary_skills', 'SecondarySkillsController@secondary_skills_array');
Route::get('api/qualification_degrees/get_all_qualification_degrees', 'QualificationDegreesController@get_all_qualification_degrees');
Route::get('api/banks/get_all_banks', 'BanksController@get_all_banks');



Route::get('api/admin/get_all_employee', 'AdminController@get_all_employee');