<?php
$id = $nombre = $autor = $ritmo = "";

if(isset($dataToView["data"]["id_musica"])) $id = $dataToView["data"]["id_musica"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["autor"])) $autor = $dataToView["data"]["autor"];
if(isset($dataToView["data"]["ritmo"])) $ritmo = $dataToView["data"]["ritmo"];
?>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <?php if(isset($_GET["response"]) && $_GET["response"] === true): ?>
            <div class="alert alert-success alert-custom d-flex align-items-center mb-4">
                <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                <div>
                    <h5 class="mb-1">¡Operación exitosa!</h5>
                    <p class="mb-0">La canción ha sido guardada correctamente.</p>
                </div>
                <a href="index.php?controller=musica&action=list" class="btn btn-sm btn-outline-success ms-auto">
                    Volver al listado
                </a>
            </div>
        <?php endif; ?>
        
        <div class="card card-custom">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="card-title mb-0">
                    <i class="bi bi-<?php echo $id ? 'pencil' : 'plus-circle'; ?> me-2"></i>
                    <?php echo $id ? 'Editar Canción' : 'Nueva Canción'; ?>
                </h4>
            </div>
            <div class="card-body p-4">
                <form class="form" action="index.php?controller=musica&action=save" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre de la Canción</label>
                            <input class="form-control" type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" 
                                   placeholder="Ingrese el nombre de la canción" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Autor/Compositor</label>
                            <input class="form-control" type="text" name="autor" value="<?php echo htmlspecialchars($autor); ?>" 
                                   placeholder="Nombre del autor" required />
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ritmo o Género</label>
                        <input class="form-control" type="text" name="ritmo" value="<?php echo htmlspecialchars($ritmo); ?>" 
                               placeholder="Ej: Cumbia, Salsa, Rock, etc." required />
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <a class="btn btn-outline-secondary" href="index.php?controller=musica&action=list">
                            <i class="bi bi-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-custom-primary">
                            <i class="bi bi-check-circle me-2"></i>
                            <?php echo $id ? 'Actualizar' : 'Guardar'; ?> Canción
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>