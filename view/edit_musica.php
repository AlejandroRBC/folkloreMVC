<?php
$id = $nombre = $autor = $ritmo = "";

if(isset($dataToView["data"]["id_musica"])) $id = $dataToView["data"]["id_musica"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["autor"])) $autor = $dataToView["data"]["autor"];
if(isset($dataToView["data"]["ritmo"])) $ritmo = $dataToView["data"]["ritmo"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=musica&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=musica&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" required />
		</div>
		<div class="form-group">
			<label>Autor</label>
			<input class="form-control" type="text" name="autor" value="<?php echo $autor; ?>" required />
		</div>
		<div class="form-group mb-2">
			<label>Ritmo</label>
			<input class="form-control" type="text" name="ritmo" value="<?php echo $ritmo; ?>" required />
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=musica&action=list">Cancelar</a>
	</form>
</div>