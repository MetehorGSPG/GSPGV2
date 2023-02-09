<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererStagesController extends Controller
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

    function enregModifStage(Request $request)
    {
        if (session('gestionnaire') != null) {

            $libelle = $request['libelle'];
            $dateDebut = $request['dateDebut'];
            $dateFin = $request['dateFin'];
            $promotion = $request['promotion'];
            $numero = $request['numero'];
            $id = $request['id'];
            var_dump($libelle);
            var_dump($id);
            $ok = 1;
            $view = view('modifierStages')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('libelle', $libelle)
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
                ->with('promotion', $promotion)
                ->with('numero', $numero)
                ->with('method', $request->method());
            if (strlen($libelle) != 6) {
                $erreurs[] =  "Libelle invalide";
                $ok = 0;
            }
            if ($dateFin < $dateDebut) {
                $erreurs[] = "Année non conforme";
                $ok = 0;
            }
            if ($ok == 1) {
                $req = PdoGspg::getMajStages($id, $libelle, $dateDebut, $dateFin, $promotion, $numero);
                var_dump($req);
                $message = "Votre stage a été mise à jour";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function ajouterStage()
    {
        if (session('gestionnaire') != null) {

            $view = view('ajouterStages')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'));
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregAjoutStage(Request $request)
    {
        if (session('gestionnaire') != null) {

            $libelle = $request['libelle'];
            $dateDebut = $request['dateDebut'];
            $dateFin = $request['dateFin'];
            $promotion = $request['promotion'];
            $numero = $request['numero'];
            $message = "";
            $erreurs[] = "";
            $ok = 1;
            $view = view('ajouterStages')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('libelle', $libelle)
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
                ->with('promotion', $promotion)
                ->with('numero', $numero)
                ->with('method', $request->method());
            if (strlen($libelle) != 6) {
                $erreurs[] =  "Libelle invalide";
                $ok = 0;
            }
            if ($dateFin < $dateDebut) {
                $erreurs[] = "Année non conforme";
                $ok = 0;
            }
            if ($ok == 1) {
                $req = PdoGspg::ajouterStages($libelle, $dateDebut, $dateFin, $promotion, $numero);
                var_dump($req);
                $message = "Votre stage a été ajouté";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
