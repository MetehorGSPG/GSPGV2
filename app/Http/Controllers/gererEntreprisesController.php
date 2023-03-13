<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererEntreprisesController extends Controller
{

    function afficherEntreprise()
    {
        if (session('gestionnaire') != null) {

            $entreprises = PdoGspg::getEntreprises();
            $view = view('afficherEntreprises')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('entreprises', $entreprises);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
    function modifierEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $entreprise = PdoGspg::getEntrepriseById($id);
            $nom = $entreprise['nom'];
            $adresse = $entreprise['adresse'];
            $ville = $entreprise['ville'];
            $mail = $entreprise['mail'];
            $tel = $entreprise['tel'];
            $nomTuteurStage = $entreprise['nomTuteurStage'];
            $telTuteurStage = $entreprise['telTuteurStage'];
            $message = "";
            $erreurs[] = "";
            $view = view('modifierEntreprises')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage)
                ->with('id', $id)
                ->with('message', null)
                ->with('erreurs', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregModifEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {
            $nom = $request['nom'];
            $adresse = $request['adresse'];
            $ville = $request['ville'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $nomTuteurStage = $request['nomTuteurStage'];
            $telTuteurStage = $request['telTuteurStage'];
            $id = $request['id'];
            $message = "";
            $ok = 1;
            $view = view('modifierEntreprises')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage)
                ->with('id', $id);
            if (strlen($tel) != 10) {
                $erreurs[] = "Numero de téléphone de l'entreprise invalide";
                $ok = 0;
            }
            if (strlen($telTuteurStage) != 10) {
                $erreurs[] = "Numero de téléphone du tuteur invalide";
                $ok = 0;
            }
            if ($ok == 1) {
                PdoGspg::majEntreprises($id, $nom, $adresse, $ville, $mail, $tel, $nomTuteurStage, $telTuteurStage);
                $message = "Votre entreprise a été mise à jour";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
    function ajouterEntreprise()
    {
        if (session('gestionnaire') != null) {
            $message = "";
            $erreurs[] = "";
            $view = view('ajouterEntreprises')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('message', null)
                ->with('erreurs', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
    function enregAjoutEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {
            $nom = $request['nom'];
            $adresse = $request['adresse'];
            $ville = $request['ville'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $nomTuteurStage = $request['nomTuteurStage'];
            $telTuteurStage = $request['telTuteurStage'];
            $ok = 1;
            $message = "";
            $view = view('ajouterEntreprises')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage);
            if (strlen($tel) != 10) {
                $erreurs[] = "Numero de téléphone de l'entreprise invalide";
                $ok = 0;
            }
            if (strlen($telTuteurStage) != 10) {
                $erreurs[] = "Numero de téléphone du tuteur invalide";
                $ok = 0;
            }
            if ($ok == 1) {
                PdoGspg::ajouterEntreprises($nom, $adresse, $ville, $mail, $tel, $nomTuteurStage, $telTuteurStage);
                $message = "Votre entreprise a été ajoutée";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
