<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Questionnaire controller
Route::get('/questionnaires/create', 'QuestionnaireController@create');          // Formulaire pour ajouter un formulaire
Route::post('/questionnaires', 'QuestionnaireController@store');                 // Enregistre dans la DB
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');   // Affiche 1 questionnaire{id}

// Question controller
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');   // Formulaire pour ajouter une question au questionnaire
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');           // Enregistre dans la DB
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy'); // Supprime une question

// Survey controller
Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');         // Affiche les questions + choix de réponse du sondage
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');       // Enregistre le nom du participant + ses réponses dans la DB

