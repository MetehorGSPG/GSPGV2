<?php
namespace App\MyApp;
use PDO;
use Illuminate\Support\Facades\Config;
class PdoGspg{
        private static $serveur;
        private static $bdd;
        private static $user;
        private static $mdp;
        private  $monPdo;
	
/**
 * crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	public function __construct(){
        
        self::$serveur='mysql:host=' . Config::get('database.connections.mysql.host');
        self::$bdd='dbname=' . Config::get('database.connections.mysql.database');
        self::$user=Config::get('database.connections.mysql.username') ;
        self::$mdp=Config::get('database.connections.mysql.password');	  
        $this->monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
  		$this->monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		$this->monPdo =null;
	}
	

/**
 * Retourne les informations d'un gestionnaire
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getInfosGestionnaire($login, $mdp){
		$req = "select id, nom, prenom from gestionnaire 
        where login='" . $login . "' and mdp='" . $mdp ."'";
    	$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	// CAS STAGE --------------------------------------------------------------

	public function getStages(){
		$req = "select * from stage";
		$rs = $this->monPdo->query($req);
		$lignes= $rs->fetchAll();
		return $lignes;
	}

	public function getAfficherStages($promotion)
	{
		$req = "select id, libelle, dateDebut, dateFin, promotion, numero from stage WHERE promotion ='" . $promotion . "'";
		$rs = $this->monPdo->query($req);
		$lignes= $rs->fetchAll();
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



}
