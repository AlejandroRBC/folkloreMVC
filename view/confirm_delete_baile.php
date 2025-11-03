<div class="row">
	<form class="form" action="index.php?controller=baile&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id_baile"]; ?>"/>
		
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar este baile?:</b>
            <br>
			<i><?php echo $dataToView["data"]["nombre"]; ?></i>
		</div>

		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=baile&action=list">Cancelar</a>
	</form>
</div>