<div class="row">
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="fw-bold text-primary">Gestión de Bailes</h3>
            <a href="index.php?controller=baile&action=edit" class="btn btn-custom-primary">
                <i class="bi bi-plus-circle me-2"></i>Agregar Baile
            </a>
        </div>
        <hr class="my-4">
    </div>
    
    <?php if(count($dataToView["data"]) > 0): ?>
        <?php foreach($dataToView["data"] as $baile): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-custom h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title fw-bold text-primary"><?php echo htmlspecialchars($baile['nombre']); ?></h5>
                            <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($baile['zona']); ?></span>
                        </div>
                        
                        <div class="card-text">
                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt me-2"></i>
                                Zona: <?php echo htmlspecialchars($baile['zona']); ?>
                            </p>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?controller=baile&action=edit&id=<?php echo $baile['id_baile']; ?>" 
                               class="btn btn-outline-primary btn-sm me-md-2">
                                <i class="bi bi-pencil me-1"></i>Editar
                            </a>
                            <a href="index.php?controller=baile&action=confirmDelete&id=<?php echo $baile['id_baile']; ?>" 
                               class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash me-1"></i>Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info alert-custom text-center py-5">
                <i class="bi bi-info-circle display-4 d-block mb-3"></i>
                <h4>No existen bailes registrados</h4>
                <p class="mb-0">Comienza agregando el primer baile a la colección.</p>
                <a href="index.php?controller=baile&action=edit" class="btn btn-custom-primary mt-3">
                    <i class="bi bi-plus-circle me-2"></i>Agregar Primer Baile
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>