<?php 

require_once 'model/baile.php';

class baileController {
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'list_baile';
        $this->page_title = '';
        $this->baileObj = new Baile();
    }

    /* Listar todos los bailes */
    public function list(){
        $this->page_title = 'Listado de Bailes';
        return $this->baileObj->getBailes();
    }

    /* Editar o crear un baile */
    public function edit($id = null){
        $this->page_title = 'Editar Baile';
        $this->view = 'edit_baile';
        if(isset($_GET["id"])) $id = $_GET["id"];
        return $this->baileObj->getBaileById($id);
    }

    /* Guardar baile */
    public function save(){
        $this->view = 'edit_baile';
        $this->page_title = 'Editar Baile';
        $id = $this->baileObj->save($_POST);
        $result = $this->baileObj->getBaileById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirmar eliminación */
    public function confirmDelete(){
        $this->page_title = 'Eliminar Baile';
        $this->view = 'confirm_delete_baile';
        return $this->baileObj->getBaileById($_GET["id"]);
    }

    /* Eliminar baile */
    public function delete(){
        $this->page_title = 'Listado de Bailes';
        $this->view = 'delete_baile';
        return $this->baileObj->deleteBaileById($_POST["id"]);
    }
}

?>
