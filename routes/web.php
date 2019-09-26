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

//User authentication routes.
Auth::routes();

// Registration Routes...
Route::get('registers', 'Auth\RegisterController@showRegistrationForm');


//Home and dashboard routes.
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/pusher', function(){
    return view('pusher.index');
});

//Notifications routes.
Route::get('/notifications', 'UserController@markAllAsRead')->name('markAllAsRead');
Route::get('/notifications/{id}', 'UserController@markNotificationAsRead')->name('markNotificationAsRead');


//Routes authorized for logged in users.
Route::group(['middleware' => 'checkUser'] , function(){
    //Team routes
    Route::get('{username}/team','TeamController@myTeam')->name('myTeam');
    //Project routes
    Route::get('{username}/project','ProjectController@myProject')->name('myProject');
    //Questionnaire Routes
    Route::get('{username}/questionnaires','QuestionnaireController@show')->name('viewQuestionnaires');
    Route::get('{username}/questionnaires/{id}','QuestionnaireController@showQuestionnaire')->name('answerQuestionnaire');
    Route::post('{username}/questionnaires/{id}','QuestionnaireController@submitQuestionnaire')->name('answerQuestionnaire');

});

//Routes authorized for coaches only.
Route::group(['middleware' => 'coach'], function(){
    //Team Routes
    Route::get('/teams','TeamController@index')->name('viewTeams');
    Route::get('/teams/create','TeamController@create')->name('createTeamView');
    Route::post('/teams','TeamController@store');
    //Project Routes
    Route::get('/projects','ProjectController@index')->name('viewProjects');
    Route::get('/projects/assign/{id}','ProjectController@assign');
    Route::get('/projects/create','ProjectController@create')->name('createProject');
    Route::post('/projects/create','ProjectController@store');
    Route::post('/projects/assign/{id}','ProjectController@changeID');
    //Questionnaire Routes
    Route::get('/questionnaires','QuestionnaireController@showAllQuestionnaires')->name('showAll');
    Route::get('/questionnaires/{id}', 'QuestionnaireController@showQuestionnaireStats')->name('showStats');
    Route::get('/questionnaires/create','QuestionnaireController@create')->name('createQuestionnaire');
    Route::post('/questionnaires/create','QuestionnaireController@store');
});
