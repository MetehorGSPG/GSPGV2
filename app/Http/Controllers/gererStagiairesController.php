<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererStagiairesController extends Controller
{

    function voir()
    {
        if (session('gestionnaire') != null) {

            $stages = PdoGspg::getStages();
            $lstStage = "";
            $lstOption = "";
            $view = view('choixStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('stages', $stages)
                ->with('lstStage', $lstStage)
                ->with('lstOption', $lstOption);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function validerChoixStage(Request $request)
    {
        if (session('gestionnaire') != null) {
            $lstStage = $request['lstStage'];
            $lstOption = $request['lstOption'];
            session(['lstOption' => $lstOption]);
            session(['lstStage' => $lstStage]);
            $view = view('sommaire')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', $lstStage)
                ->with('lstOption', $lstOption);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function afficherStage()
    {
        if (session('gestionnaire') != null) {
            $annee = date('Y');
            $stages = PdoGspg::getAfficherStages($annee);
            $view = view('afficherStages')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('stages', $stages);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function modifierStage(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $stage = PdoGspg::getStageById($id);
            dd($stage);
            $libelle = $stage['libelle'];
            $dateDebut = $stage['dateDebut'];
            $dateFin = $stage['dateFin'];
            $promotion = $stage['promotion'];
            $numero = $stage['numero'];
            $view = view('modifierStages')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('libelle', $libelle)
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
                ->with('promotion', $promotion)
                ->with('numero', $numero);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
