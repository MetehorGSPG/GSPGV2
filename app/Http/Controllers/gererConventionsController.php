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
                'title' => 'Convention de stage en entreprise',
                'date' => date('d/m/Y'),
                'stage' => session('lstStage'),
                'option' => session('lstOption'),
                'nomStagiaire' => $ligne['nomStagiaire'],
                'prenomStagiaire' => $ligne['prenomStagiaire'],
                'adresseStagiaire' => $ligne['adresseStagiaire'],
                'mailStagiaire' => $ligne['mailStagiaire'],
                'telStagiaire' => $ligne['telStagiaire'],
                'nomEntreprise' => $ligne['nomEntreprise'],
                'adresseEntreprise' => $ligne['adresseEntreprise'],
                'villeEntreprise' => $ligne['villeEntreprise'],
                'mailEntreprise' => $ligne['mailEntreprise'],
                'telEntreprise' => $ligne['telEntreprise'],
                'nomTuteurStage' => $ligne['nomTuteurStage'],
                'telTuteurStage' => $ligne['telTuteurStage'],
                'nomFormateur' => $ligne['nomFormateur'],
                'prenomFormateur' => $ligne['prenomFormateur'],
                'telFormateur' => $ligne['telFormateur'],
                'dateDebutStage' => $ligne['dateDebutStage'],
                'dateFinStage' => $ligne['dateFinStage']
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
            foreach ($_REQUEST as $cle => $value) {

                $signe = 0;

                //var_dump($cle);

                if ($debut = substr($cle, 0, 2) == "id") {

                    $idConvention = substr($cle, 3);

                    if (isset($_REQUEST["chk_" . $idConvention])) {

                        $signe = 1;
                    }

                    PdoGspg::conventionSigneMaj($idConvention, $signe);
                }
            }
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

    function productionEtatConvention()
    {
        if (session('gestionnaire') != null) {

            $view = view('EtatConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'));
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function afficherEtatConvention()
    {
        if (session('gestionnaire') != null) {
            $lesCases = array();
            $libelle = session('lstStage');
            $promotion = substr($libelle, 0, 4);
            if (isset($_REQUEST['chkNomStagiaire']))
                $lesCases[] = 'chkNomStagiaire';
            if (isset($_REQUEST['chkPrenomStagiaire']))
                $lesCases[] = 'chkPrenomStagiaire';
            if (isset($_REQUEST['chkNomEntreprise']))
                $lesCases[] = 'chkNomEntreprise';
            if (isset($_REQUEST['chkAdresseEntreprise']))
                $lesCases[] = 'chkAdresseEntreprise';
            if (isset($_REQUEST['chkToutesLesPromotions']))
                $lesCases[] = 'chkToutesLesPromotions';
            $infos = Pdogspg::getInfosEtat($lesCases, $promotion);
            $view = view('afficherEtatConventions')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('infos', $infos)
                ->with('promotion', $promotion)
                ->with('lesCases', $lesCases);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function afficherEtatConventionPdf(Request $request)
    {
        if (session('gestionnaire') != null) {
            $lesCases = $request['lesCases'];
            $libelle = session('lstStage');
            $promotion = substr($libelle, 0, 4);
            $lignes = Pdogspg::getInfosEtat($lesCases, $promotion);
            $data = [
                'title' => 'Etat des conventions au format pdf',
                'date' => date('d/m/Y'),
                'lignes' => $lignes,
                'lesCases' => $lesCases,
                'promotion' => $promotion
            ];
            view()->share('data', $data);
            $pdf = PDF::loadView('PdfEtatConventions', $data);
            return $pdf->download("etatDesConventions" . ".pdf");
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
}
