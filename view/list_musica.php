<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=musica&action=edit" class="btn btn-outline-primary">Agregar música</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $musica){
			?>
			<div class="col-md-4 mb-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $musica['nombre']; ?></h5>
					<div class="card-text">
						<strong>Autor:</strong> <?php echo $musica['autor']; ?><br>
						<strong>Ritmo:</strong> <?php echo $musica['ritmo']; ?>
					</div>
					<hr class="mt-1"/>
					<a href="index.php?controller=musica&action=edit&id=<?php echo $musica['id_musica']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=musica&action=confirmDelete&id=<?php echo $musica['id_musica']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			No hay música registrada.
		</div>
		<?php
	}
	?>
</div>