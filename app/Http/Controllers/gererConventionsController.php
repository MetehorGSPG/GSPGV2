<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererConventionsController extends Controller
{
    
    function afficherConvention()
    {
        if (session('gestionnaire') != null) {
            
            $libelle = session('lstStage'); 
            $option =  session('lstOption');
            $existeConventions = PdoGspg::stagiaireConventions($libelle,$option);
            $annee = date('Y');
            $sansConventions = PdoGspg::stagiaireSansConventions($annee, $libelle, $option);
            $view = view('afficherConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('existeConventions', $existeConventions)
                ->with('sansConventions', $sansConventions);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}