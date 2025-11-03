<div class="row">
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="fw-bold text-primary">Gestión de Música</h3>
            <a href="index.php?controller=musica&action=edit" class="btn btn-custom-primary">
                <i class="bi bi-music-note-beamed me-2"></i>Agregar Música
            </a>
        </div>
        <hr class="my-4">
    </div>
    
    <?php if(count($dataToView["data"]) > 0): ?>
        <?php foreach($dataToView["data"] as $musica): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-custom h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title fw-bold text-primary"><?php echo htmlspecialchars($musica['nombre']); ?></h5>
                            <span class="badge bg-info text-dark"><?php echo htmlspecialchars($musica['ritmo']); ?></span>
                        </div>
                        
                        <div class="card-text">
                            <p class="text-muted mb-2">
                                <i class="bi bi-person me-2"></i>
                                <strong>Autor:</strong> <?php echo htmlspecialchars($musica['autor']); ?>
                            </p>
                            <p class="text-muted mb-3">
                                <i class="bi bi-music-note-list me-2"></i>
                                <strong>Ritmo:</strong> <?php echo htmlspecialchars($musica['ritmo']); ?>
                            </p>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?controller=musica&action=edit&id=<?php echo $musica['id_musica']; ?>" 
                               class="btn btn-outline-primary btn-sm me-md-2">
                                <i class="bi bi-pencil me-1"></i>Editar
                            </a>
                            <a href="index.php?controller=musica&action=confirmDelete&id=<?php echo $musica['id_musica']; ?>" 
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
                <i class="bi bi-music-note-beamed display-4 d-block mb-3"></i>
                <h4>No hay música registrada</h4>
                <p class="mb-0">Comienza agregando la primera canción a la colección.</p>
                <a href="index.php?controller=musica&action=edit" class="btn btn-custom-primary mt-3">
                    <i class="bi bi-plus-circle me-2"></i>Agregar Primera Canción
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>