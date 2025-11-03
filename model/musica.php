<?php 

class Musica {

	private $table = 'musica';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all music */
	public function getMusica(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get music by id */
	public function getMusicaById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id_musica = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save music */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$nombre = $autor = $ritmo = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualMusica = $this->getMusicaById($param["id"]);
			if(isset($actualMusica["id_musica"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$nombre = $actualMusica["nombre"];
				$autor = $actualMusica["autor"];
				$ritmo = $actualMusica["ritmo"];
			}
		}

		/* Received values */
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["autor"])) $autor = $param["autor"];
		if(isset($param["ritmo"])) $ritmo = $param["ritmo"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET nombre=?, autor=?, ritmo=? WHERE id_musica=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$nombre, $autor, $ritmo, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (nombre, autor, ritmo) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$nombre, $autor, $ritmo]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	
	}

	/* Delete music by id */
	public function deleteMusicaById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id_musica = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>