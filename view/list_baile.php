<div class="row">
    <div class="col-md-12 text-right">
        <a href="index.php?controller=baile&action=edit" class="btn btn-outline-primary">Agregar Baile</a>
        <hr/>
    </div>
    <?php
    if(count($dataToView["data"])>0){
        foreach($dataToView["data"] as $baile){
            ?>
            <div class="col-md-3">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"><?php echo $baile['nombre']; ?></h5>
                    <p class="card-text"><?php echo $baile['zona']; ?></p>
                    <hr class="mt-1"/>
                    <a href="index.php?controller=baile&action=edit&id=<?php echo $baile['id_baile']; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php?controller=baile&action=confirmDelete&id=<?php echo $baile['id_baile']; ?>" class="btn btn-danger">Eliminar</a>
                    console.log(<?php echo $baile['id_baile']; ?>);
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="alert alert-info">
            No existen bailes registrados.
        </div>
        <?php
    }
    ?>
</div>
