<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
        <div class="card card-custom border-warning">
            <div class="card-header bg-warning text-dark py-3">
                <h4 class="card-title mb-0">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Confirmar Eliminación
                </h4>
            </div>
            <div class="card-body p-4 text-center">
                <div class="mb-4">
                    <i class="bi bi-trash display-1 text-danger mb-3"></i>
                    <h5 class="fw-bold text-dark">¿Está seguro que desea eliminar esta canción?</h5>
                    <p class="text-muted">Esta acción no se puede deshacer.</p>
                </div>
                
                <div class="alert alert-warning alert-custom mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-music-note-beamed me-3 fs-4"></i>
                        <div class="text-start">
                            <h6 class="fw-bold mb-1"><?php echo htmlspecialchars($dataToView["data"]["nombre"]); ?></h6>
                            <p class="mb-0 text-muted">
                                Autor: <?php echo htmlspecialchars($dataToView["data"]["autor"]); ?> | 
                                Ritmo: <?php echo htmlspecialchars($dataToView["data"]["ritmo"]); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <form class="form" action="index.php?controller=musica&action=delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dataToView["data"]["id_musica"]; ?>"/>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <button type="submit" class="btn btn-danger btn-lg px-4">
                            <i class="bi bi-trash me-2"></i>Eliminar Definitivamente
                        </button>
                        <a class="btn btn-outline-secondary btn-lg px-4" href="index.php?controller=musica&action=list">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>