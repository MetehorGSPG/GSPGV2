<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;
use PDF;
use Symfony\Component\VarDumper\VarDumper;


class gererConventionsController extends Controller
{

    function afficherConvention()
    {
        if (session('gestionnaire') != null) {

            $libelle = session('lstStage');
            $option =  session('lstOption');
            $existeConventions = PdoGspg::stagiaireConventions($libelle, $option);
            $promotion = substr($libelle, 0, 4);
            $sansConventions = PdoGspg::stagiaireSansConventions($promotion, $libelle, $option);
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

    function pdf(Request $request)
    {
        $id = $request['id'];
        $libelle = session('lstStage');
        $ligne = PdoGspg::getInfosConvention($libelle, $id);
        if (session('gestionnaire') != null) {
            $data = [
                'title' => 'Convention au format pdf',
                'date' => date('m/d/Y'),
                'stage' => session('lstStage'),
                'option' => session('lstOption'),
                'nomStagiaire' => $ligne['nomStagiaire'],
                'prenomStagiaire' => $ligne['prenomStagiaire'],
                'nomEntreprise' => $ligne['nomEntreprise'],
                'nomFormateur' => $ligne['nomFormateur']
            ];
            view()->share('data', $data);
            $pdf = PDF::loadView('PdfConventions', $data);
            return $pdf->download("convention" . $data['nomStagiaire'] . ".pdf");
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function ajouterConvention(Request $request)
    {
        if (session('gestionnaire') != null) {
            $entreprises = PdoGspg::getEntreprises();
            $formateurs = PdoGspg::getFormateurs();
            $stages = PdoGspg::getStages();
            $id = $request['id'];
            $stagiaire = PdoGspg::getStagiaireById($id);
            $nomStagiaire = $stagiaire['nom'];
            $message = "";
            $view = view('ajouterConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('entreprises', $entreprises)
                ->with('formateurs', $formateurs)
                ->with('stages', $stages)
                ->with('id', $id)
                ->with('nomStagiaire', $nomStagiaire)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregAjoutConvention(Request $request)
    {
        if (session('gestionnaire') != null) {
            $libelle = session('lstStage');
            $entreprises = PdoGspg::getEntreprises();
            $formateurs = PdoGspg::getFormateurs();
            $id = $request['idStagiaire'];
            $stagiaire = PdoGspg::getStagiaireById($id);
            $nomStagiaire = $stagiaire['nom'];
            $idEntreprise = $request['entreprise'];
            $idFormateur = $request['formateur'];
            $idStage = session('lstStage');
            $idStagiaire = $request['idStagiaire'];
            $message = "";
            $rs = PdoGspg::ajouterConvention($idStagiaire, $idEntreprise, $idFormateur, $libelle);
            $view = view('ajouterConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('entreprises', $entreprises)
                ->with('formateurs', $formateurs)
                ->with('nomStagiaire', $nomStagiaire)
                ->with('idEntreprise', $idEntreprise)
                ->with('idFormateur', $idFormateur)
                ->with('id', $id)
                ->with('idStage', $idStage)
                ->with('idStagiaire', $idStagiaire)
                ->with('rs', $rs);
            if ($rs != null) {
                $message = "Convention ajoutée";
            } else {
                $message = "Veuillez réessayer plus tard";
            }
            return $view->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }



    function modifierConvention(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $entreprises = PdoGspg::getEntreprises();
            $formateurs = PdoGspg::getFormateurs();
            $convention = PdoGspg::getConventionById($id);
            $idEntreprise = $convention['idEntreprise'];
            $idFormateur = $convention['idFormateur'];
            $message = "";
            $erreurs[] = "";
            $view = view('modifierConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('formateurs', $formateurs)
                ->with('entreprises', $entreprises)
                ->with('id', $id)
                ->with('idEntreprise', $idEntreprise)
                ->with('idFormateur', $idFormateur)
                ->with('erreurs', null)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregModifConvention(Request $request)
    {
        if (session('gestionnaire') != null) {
            $entreprises = PdoGspg::getEntreprises();
            $formateurs = PdoGspg::getFormateurs();
            $id = $request['id'];
            $idEntreprise = $request['entreprise'];
            $idFormateur = $request['formateur'];
            $message = "";
            $rs = PdoGspg::majConvention($id, $idEntreprise, $idFormateur);
            $view = view('modifierConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('entreprises', $entreprises)
                ->with('formateurs', $formateurs)
                ->with('idEntreprise', $idEntreprise)
                ->with('idFormateur', $idFormateur)
                ->with('id', $id)
                ->with('rs', $rs);
            if ($rs != null) {
                $message = "Convention modifiée";
            } else {
                $message = "Veuillez réessayer plus tard";
            }
            var_dump($rs);
            return $view->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function afficherConventionSigne()
    {
        if (session('gestionnaire') != null) {
            $libelle = session('lstStage');
            $option =  session('lstOption');
            $conventionSignes = PdoGspg::conventionSigne($libelle, $option);
            $view = view('afficherConventionSigne')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('conventionSignes', $conventionSignes);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function majConventionSigne(Request $request)
    {
        if (session('gestionnaire') != null) {
            dd($_REQUEST);
            $libelle = session('lstStage');
            $option =  session('lstOption');
            $conventionSignes = PdoGspg::conventionSigne($libelle, $option);
            $view = view('afficherConventionSigne')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('conventionSignes', $conventionSignes);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
