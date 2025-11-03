<?php
$id = $nombre = $zona = $url_img = "";
if(isset($dataToView["data"]["id_baile"])) $id = $dataToView["data"]["id_baile"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["zona"])) $zona = $dataToView["data"]["zona"];
if(isset($dataToView["data"]["url_img"])) $url_img = $dataToView["data"]["url_img"];
?>
<div class="row">
    <?php if(isset($_GET["response"]) && $_GET["response"] === true){ ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="index.php?controller=baile&action=list">Volver al listado</a>
        </div>
    <?php } ?>
    <form class="form" action="index.php?controller=baile&action=save" method="POST">
        <input type="hidden" name="id_baile" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
        </div>
        <div class="form-group mb-2">
            <label>Zona</label>
            <input class="form-control" type="text" name="zona" value="<?php echo $zona; ?>" />
        </div>
        
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a class="btn btn-outline-danger" href="index.php?controller=baile&action=list">Cancelar</a>
    </form>
</div>
