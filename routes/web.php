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

        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);
Route::get('choixstage',[
        'as'=>'chemin_choixstage',
        'uses'=>'gererStagiairesController@voir'
]);
Route::post('validerChoixStage',[
        'as'=>'chemin_validerChoixStage',
        'uses'=>'gererStagiairesController@validerChoixStage'
]);
Route::get('afficherStages',[
        'as'=>'chemin_afficherStage',
        'uses'=>'gererStagiairesController@afficherStage'
]);
Route::get('modifierStages',[
        'as'=>'chemin_modifierStage',
        'uses'=>'gererStagiairesController@modifierStage',
]);
        
