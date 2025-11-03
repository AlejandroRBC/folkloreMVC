<?php 

require_once 'model/musica.php';

class musicaController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_musica';
		$this->page_title = '';
		$this->musicaObj = new Musica();
	}

	/* List all music */
	public function list(){
		$this->page_title = 'Listado de música';
		return $this->musicaObj->getMusica();
	}

	/* Load music for edit */
	public function edit($id = null){
		$this->page_title = 'Editar música';
		$this->view = 'edit_musica';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->musicaObj->getMusicaById($id);
	}

	/* Create or update music */
	public function save(){
		$this->view = 'edit_musica';
		$this->page_title = 'Editar música';
		$id = $this->musicaObj->save($_POST);
		$result = $this->musicaObj->getMusicaById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar música';
		$this->view = 'confirm_delete_musica';
		return $this->musicaObj->getMusicaById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de música';
		$this->view = 'delete_musica';
		return $this->musicaObj->deleteMusicaById($_POST["id"]);
	}

}

?>