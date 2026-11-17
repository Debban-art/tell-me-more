<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4">Registro de Proyecto - Speech AI</h2>
                <form id="formProyecto" action="api/guardar_proyecto.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Estudiante</label>
                        <input type="text" class="form-control" name="nombre_estudiante" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Título del Proyecto</label>
                        <input type="text" class="form-control" name="titulo_proyecto" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Objetivo</label>
                        <textarea class="form-control" name="objetivo" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metodología</label>
                        <textarea class="form-control" name="metodologia" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnologías Utilizadas</label>
                        <input type="text" class="form-control" name="tecnologias" placeholder="Ej: PHP, MySQL, Flutter, OpenAI">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resultados Esperados / Obtenidos</label>
                        <textarea class="form-control" name="resultados" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar y Continuar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>