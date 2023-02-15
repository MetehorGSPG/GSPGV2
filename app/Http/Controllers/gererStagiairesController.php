<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererStagiairesController extends Controller
{


    function afficherStagiaire()
    {
        if (session('gestionnaire') != null) {

            $stagiaires = PdoGspg::getStagiaires();
            $view = view('afficherStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('stagiaires', $stagiaires);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function modifierStagiaire(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $stagiaire = PdoGspg::getStagiaireById($id);
            $nom = $stagiaire['nom'];
            $prenom = $stagiaire['prenom'];
            $adresse = $stagiaire['adresse'];
            $mail = $stagiaire['mail'];
            $tel = $stagiaire['tel'];
            $promotion = $stagiaire['promotion'];
            $choixOption = $stagiaire['choixOption'];
            $message = "";
            $erreurs[] = "";
            $view = view('modifierStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('adresse', $adresse)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('promotion', $promotion)
                ->with('choixOption', $choixOption)
                ->with('id', $id)
                ->with('erreurs', null)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }


    function enregModifStagiaire(Request $request)
    {
        if (session('gestionnaire') != null) {
            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $adresse = $request['adresse'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $promotion = $request['promotion'];
            $choixOption = $request['choixOption'];
            $id = $request['id'];
            $ok = 1;
            $message = "";
            $view = view('modifierStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('adresse', $adresse)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('promotion', $promotion)
                ->with('choixOption', $choixOption)
                ->with('id', $id);
                if (strlen($choixOption) != 4) {
                    $erreurs[] = "Option non conforme";
                    $ok = 0;
                }
                if (strlen($promotion) != 4) {
                    $erreurs[] = "Promotion non conforme";
                    $ok = 0;
                }
                if (strlen($tel) != 10) {
                    $erreurs[] = "Numero de téléphone du stagiaire invalide";
                    $ok = 0;
                }
                if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/i', $mail)) {
                    $erreurs[] =  "le mail n'est pas valide";
                    $ok = 0;
                }
            if ($ok == 1) {
                PdoGspg::majStagiaires($id, $nom, $prenom, $adresse, $mail, $tel, $promotion, $choixOption);
                $message = "Votre stagiaire a été mise à jour";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function ajouterStagiaire()
    {
        if (session('gestionnaire') != null) {
            $message = "";
            $erreurs[] = "";
            $view = view('ajouterStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('erreurs', null)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregAjoutStagiaire(Request $request)
    {
        if (session('gestionnaire') != null) {

            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $adresse = $request['adresse'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $promotion = $request['promotion'];
            $choixOption = $request['choixOption'];
            $message = "";
            $ok = 1;
            $view = view('ajouterStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('adresse', $adresse)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('promotion', $promotion)
                ->with('choixOption', $choixOption);
            if (strlen($choixOption) != 4) {
                $erreurs[] = "Option non conforme";
                $ok = 0;
            }
            if (strlen($promotion) != 4) {
                $erreurs[] = "Promotion non conforme";
                $ok = 0;
            }
            if (strlen($tel) != 10) {
                $erreurs[] = "Numero de téléphone du stagiaire invalide";
                $ok = 0;
            }
            if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/i', $mail)) {
                $erreurs[] =  "le mail n'est pas valide";
                $ok = 0;
            }
            if ($ok == 1) {
                 PdoGspg::ajouterStagiaires($nom, $prenom, $adresse, $mail, $tel, $promotion, $choixOption);
                $message = "Votre stagiaire a été ajouté";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
