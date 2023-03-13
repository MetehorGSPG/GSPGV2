<?php

namespace App\MyApp;

use PDO;
use Illuminate\Support\Facades\Config;

class PdoGspg
{
	private static $serveur;
	private static $bdd;
	private static $user;
	private static $mdp;
	private  $monPdo;

	/**
	 * crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */
	public function __construct()
	{

		self::$serveur = 'mysql:host=' . Config::get('database.connections.mysql.host');
		self::$bdd = 'dbname=' . Config::get('database.connections.mysql.database');
		self::$user = Config::get('database.connections.mysql.username');
		self::$mdp = Config::get('database.connections.mysql.password');
		$this->monPdo = new PDO(self::$serveur . ';' . self::$bdd, self::$user, self::$mdp);
		$this->monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct()
	{
		$this->monPdo = null;
	}


	/**
	 * Retourne les informations d'un gestionnaire
 
	 * @param $login 
	 * @param $mdp
	 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
	 */
	public function getInfosGestionnaire($login, $mdp)
	{
		$req = "select id, nom, prenom from gestionnaire 
        where login='" . $login . "' and mdp='" . $mdp . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	// Cas STAGES --------------------------------------------------------------------------

	public function getStages()
	{
		$req = "select * from stage";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function getAfficherStages($promotion)
	{
		$req = "select id, libelle, dateDebut, dateFin, promotion, numero from stage WHERE promotion ='" . $promotion . "'";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}


	public function getStageById($id)
	{
		$req = "select id, libelle, dateDebut, dateFin, promotion, numero from stage WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function getMajStages($id, $libelle, $dateDebut, $dateFin, $promotion, $numero)
	{
		$req = "update stage set libelle = '$libelle', dateDebut = '$dateDebut', dateFin = '$dateFin', promotion = '$promotion', numero = '$numero'";
		$req .= "where id = '$id'";
		// dd($req);
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	public function ajouterStages($libelle, $dateDebut, $dateFin, $promotion, $numero)
	{
		$req = "insert into stage (libelle,dateDebut,dateFin,promotion,numero) VALUES('$libelle','$dateDebut','$dateFin','$promotion','$numero')";
		$rs = $this->monPdo->query($req);
		return $rs;
	}

	// Cas STAGIAIRES -----------------------------------------------------------------

	public function getStagiaires()
	{
		$req = "select * from stagiaire";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function ajouterStagiaires($nom, $prenom, $adresse, $mail, $tel, $promotion, $choixOption)
	{
		$req = "insert into stagiaire (nom,prenom,adresse,mail,tel,promotion,choixOption) VALUES('$nom','$prenom','$adresse','$mail','$tel','$promotion','$choixOption')";
		$rs = $this->monPdo->query($req);
		return $rs;
	}

	public function getStagiaireById($id)
	{
		$req = "select id,nom,prenom,adresse,mail,tel,promotion,choixOption from stagiaire WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function majStagiaires($id, $nom, $prenom, $adresse, $mail, $tel, $promotion, $choixOption)
	{
		$req = "update stagiaire set nom = '$nom', prenom = '$prenom', adresse = '$adresse', mail = '$mail', tel = '$tel', promotion = '$promotion', choixOption = '$choixOption' ";
		$req .= "where id = '$id'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}


	// Cas ENTREPRISES ----------------------------------------------------------------------

	public function getEntreprises()
	{
		$req = "select * from entreprise";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function ajouterEntreprises($nom, $adresse, $ville, $mail, $tel, $nomTuteurStage, $telTuteurStage)
	{
		$req = "insert into entreprise (nom,adresse,ville,mail,tel,nomTuteurStage,telTuteurStage) VALUES('$nom', '$adresse', '$ville', '$mail', '$tel', '$nomTuteurStage', '$telTuteurStage')";
		$rs = $this->monPdo->query($req);
		return $rs;
	}

	public function getEntrepriseById($id)
	{
		$req = "select id,nom,adresse,ville,mail,tel,nomTuteurStage,telTuteurStage from entreprise WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function majEntreprises($id, $nom, $adresse, $ville, $mail, $tel, $nomTuteurStage, $telTuteurStage)
	{
		$req = "update entreprise set nom = '$nom', adresse = '$adresse', ville = '$ville', mail = '$mail', tel = '$tel', nomTuteurStage = '$nomTuteurStage', telTuteurStage = '$telTuteurStage' ";
		$req .= "where id = '$id'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	// Cas FORMATEURS ---------------------------------------------------------------------

	public function getFormateurs()
	{
		$req = "select * from formateur";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function ajouterFormateurs($nom, $prenom, $mail, $tel)
	{
		$req = "insert into formateur (nom,prenom,mail,tel) VALUES('$nom', '$prenom', '$mail', '$tel')";
		$rs = $this->monPdo->query($req);
		return $rs;
	}

	public function getFormateurById($id)
	{
		$req = "select id,nom,prenom,mail,tel from formateur WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function majFormateurs($id, $nom, $prenom, $mail, $tel)
	{
		$req = "update formateur set nom = '$nom', prenom = '$prenom', mail = '$mail', tel = '$tel' ";
		$req .= "where id = '$id'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	// Cas CONVENTIONS ---------------------------------------------------------------------

	public function stagiaireConventions($libelle, $option)
	{
		$req = "SELECT stageStagiaire.id AS id,nom, prenom from stagiaire, stageStagiaire, stage WHERE stagiaire.id = stageStagiaire.idStagiaire and stageStagiaire.idStage = stage.id and stage.libelle = '$libelle' and stagiaire.choixOption = '$option'";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function stagiaireSansConventions($promotion, $libelle, $option)
	{
		$req = "select stagiaire.id,stagiaire.nom,stagiaire.prenom FROM stagiaire 
		WHERE promotion = '$promotion'
		and stagiaire.choixOption = '$option' 
		and stagiaire.id 
		not in (select stagestagiaire.idStagiaire from stagestagiaire, stage, stagiaire 
				where stagestagiaire.idStage = stage.id and stageStagiaire.idStagiaire = stagiaire.id 
				and stage.libelle ='$libelle'
				and stagiaire.choixOption = '$option')";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function getConventionById($id)
	{
		$req = "select id,idStagiaire,idEntreprise,idFormateur,idStage from stageStagiaire WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function ajouterConvention($idStagiaire, $idEntreprise, $idFormateur, $libelle)
	{
		$req = "insert into stageStagiaire (idStagiaire,idEntreprise,idFormateur,idStage) VALUES('$idStagiaire', '$idEntreprise', '$idFormateur', (SELECT id FROM stage WHERE stage.libelle = '$libelle'))";
		$rs = $this->monPdo->query($req);
		var_dump($req);
		return $rs;
	}

	public function getInfosConvention($libelle, $id){
		$req = "select stagiaire.nom as nomStagiaire, stagiaire.prenom as prenomStagiaire, stagiaire.adresse as adresseStagiaire, stagiaire.tel as telStagiaire, stagiaire.mail as mailStagiaire, 
		entreprise.nom as nomEntreprise, entreprise.adresse as adresseEntreprise, entreprise.ville as villeEntreprise, entreprise.mail as mailEntreprise, entreprise.tel as telEntreprise, entreprise.nomTuteurStage as nomTuteurStage, entreprise.telTuteurStage as telTuteurStage, 
		formateur.nom as nomFormateur, formateur.prenom as prenomFormateur, formateur.tel as telFormateur,
		stage.dateDebut as dateDebutStage, stage.dateFin as dateFinStage
		from stageStagiaire, stagiaire, entreprise, formateur, stage
		where stageStagiaire.idFormateur = formateur.id 
		and stageStagiaire.idEntreprise = entreprise.id
		and stageStagiaire.idStagiaire = stagiaire.id
		and stageStagiaire.idStage = stage.id
		and stageStagiaire.id = '" . $id . "' 
		and stage.libelle = '" . $libelle . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function majConvention($id, $idEntreprise, $idFormateur)
	{
		$req = "update stageStagiaire set idEntreprise = '$idEntreprise', idFormateur = '$idFormateur'";
		$req .= "where id = '$id'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	// Cas PRODUCTIONS ÉTATS ---------------------------------------------------------------------

	public function conventionSigne($libelle, $option)
	{
		$req = "SELECT stageStagiaire.id as idConvention, stageStagiaire.conventionSigne AS conventionSigne,nom, prenom from stagiaire, stageStagiaire, stage
		WHERE stagiaire.id = stageStagiaire.idStagiaire and stageStagiaire.idStage = stage.id 
		and stage.libelle = '$libelle' and stagiaire.choixOption = '$option'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}

	
	public function conventionSigneMaj($idConvention, $signe)
	{
		$req = "update stageStagiaire set conventionSigne = '$signe'";
		$req .= "where id = '$idConvention'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	public function getInfosEtat($lesCases, $promotion){
		$req = "select entreprise.nom as nomEntreprise ";
		$okToutesPromotions = 'off';
		foreach ($lesCases as $cle => $value) {
			
			if($value == 'chkNomStagiaire'){
				$req .=  ", stagiaire.nom as nomStagiaire ";
			}
			if($value == 'chkPrenomStagiaire'){
				$req .=  ", stagiaire.prenom as prenomStagiaire ";
			}
			if($value == 'chkAdresseEntreprise'){
				$req .=  ", entreprise.adresse as adresseEntreprise " ;
			}
			if($value == 'chkToutesLesPromotions'){
				$okToutesPromotions = 'on';
			}
		}
		$req .= "from stageStagiaire, stagiaire, entreprise, stage ";
		$req .= "where stageStagiaire.idEntreprise = entreprise.id ";
		$req .= "and stageStagiaire.idStagiaire = stagiaire.id ";
		$req .= "and stageStagiaire.idStage = stage.id ";
		if($okToutesPromotions == 'off'){
			$req .= "and stagiaire.promotion = '$promotion'";
		}
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}
}
