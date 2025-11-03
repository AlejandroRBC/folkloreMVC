<?php 

class Baile {

    private $table = 'baile';
    private $conection;

    public function __construct() {}

    /* Conexión a la BD */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtener todos los bailes */
    public function getBailes(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /* Obtener baile por ID */
    public function getBaileById($id){
        if(is_null($id)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table." WHERE id_baile = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* Guardar o actualizar baile */
    public function save($param){
        $this->getConection();

        $nombre = $zona = $url_img = "";
        $exists = false;

        if(isset($param["id_baile"]) && $param["id_baile"] != ''){
            $actualBaile = $this->getBaileById($param["id_baile"]);
            if(isset($actualBaile["id_baile"])){
                $exists = true;
                $id_baile = $param["id_baile"];
                $nombre = $actualBaile["nombre"];
                $zona = $actualBaile["zona"];
                $url_img = $actualBaile["url_img"];
            }
        }

        if(isset($param["nombre"])) $nombre = $param["nombre"];
        if(isset($param["zona"])) $zona = $param["zona"];
        if(isset($param["url_img"])) $url_img = $param["url_img"];

        if($exists){
            $sql = "UPDATE ".$this->table." SET nombre=?, zona=?, url_img=? WHERE id_baile=?";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre, $zona, $url_img, $id_baile]);
        } else {
            $sql = "INSERT INTO ".$this->table." (nombre, zona, url_img) VALUES (?, ?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre, $zona, $url_img]);
            $id_baile = $this->conection->lastInsertId();
        }

        return $id_baile;
    }

    /* Eliminar baile por ID */
    public function deleteBaileById($id){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table." WHERE id_baile = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}

?>
