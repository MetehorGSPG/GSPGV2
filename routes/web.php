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

//------------------- Cas STAGE -----------------------------------

Route::get('choixstage',[
        'as'=>'chemin_choixstage',
        'uses'=>'gererStagesController@voir'
]);
Route::post('validerChoixStage',[
        'as'=>'chemin_validerChoixStage',
        'uses'=>'gererStagesController@validerChoixStage'
]);
Route::get('afficherStages',[
        'as'=>'chemin_afficherStage',
        'uses'=>'gererStagesController@afficherStage'
]);
Route::get('modifierStages',[
        'as'=>'chemin_modifierStage',
        'uses'=>'gererStagesController@modifierStage',
]);
Route::post('enregModifStages',[
        'as'=>'chemin_enregModifStage',
        'uses'=>'gererStagesController@enregModifStage',
]);
Route::get('ajouterStages',[
        'as'=>'chemin_ajouterStage',
        'uses'=>'gererStagesController@ajouterStage'
]);
Route::post('enregAjoutStages',[
        'as'=>'chemin_enregAjoutStage',
        'uses'=>'gererStagesController@enregAjoutStage'
]);

//------------------- Cas STAGIAIRES -----------------------------------

Route::get('afficherStagiaires',[
        'as'=>'chemin_afficherStagiaire',
        'uses'=>'gererStagiairesController@afficherStagiaire'
]);
Route::get('modifierStagiaires',[
        'as'=>'chemin_modifierStagiaire',
        'uses'=>'gererStagiairesController@modifierStagiaire',
]);
Route::post('enregModifStagiaires',[
        'as'=>'chemin_enregModifStagiaire',
        'uses'=>'gererStagiairesController@enregModifStagiaire',
]);
Route::get('ajouterStagiaires',[
        'as'=>'chemin_ajouterStagiaire',
        'uses'=>'gererStagiairesController@ajouterStagiaire'
]);
Route::post('enregAjoutStagiaires',[
        'as'=>'chemin_enregAjoutStagiaire',
        'uses'=>'gererStagiairesController@enregAjoutStagiaire'
]);

//------------------- Cas ENTREPRISES -----------------------------------
Route::get('afficherEntreprises',[
        'as'=>'chemin_afficherEntreprise',
        'uses'=>'gererEntreprisesController@afficherEntreprise'
]);
Route::get('ajouterEntreprises',[
        'as'=>'chemin_ajouterEntreprise',
        'uses'=>'gererEntreprisesController@ajouterEntreprise'
]);
Route::post('enregAjoutEntreprises',[
    'as'=>'chemin_enregAjoutEntreprise',
    'uses'=>'gererEntreprisesController@enregAjoutEntreprise'
]);
Route::get('modifierEntreprises',[
        'as'=>'chemin_modifierEntreprise',
        'uses'=>'gererEntreprisesController@modifierEntreprise'
]);

Route::post('enregModifEntreprise',[
    'as'=>'chemin_enregModifEntreprise',
    'uses'=>'gererEntreprisesController@enregModifEntreprise'
]);

//------------------- Cas FORMATEURS  -----------------------------------

Route::get('afficherFormateurs',[
        'as'=>'chemin_afficherFormateurs',
        'uses'=>'gererFormateursController@afficherFormateurs',
]);

Route::get('modifierFormateurs',[
        'as'=>'chemin_modifierFormateurs',
        'uses'=>'gererFormateursController@modifierFormateurs'
]);

Route::post('enregModifFormateurs',[
        'as'=>'chemin_enregModifFormateurs',
        'uses'=>'gererFormateursController@enregModifFormateurs'
]);

Route::get('ajouterFormateurs',[
        'as'=>'chemin_ajouterFormateurs',
        'uses'=>'gererFormateursController@ajouterFormateurs'
]);

Route::post('enregAjoutFormateurs',[
        'as'=>'chemin_enregAjoutFormateurs',
        'uses'=>'gererFormateursController@enregAjoutFormateurs'
]);