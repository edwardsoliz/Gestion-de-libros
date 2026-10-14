<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $libro->getIdLibro() ? 'Editar Libro' : 'Nuevo Libro'; ?></title>
    <!-- Enlazamos tu CSS -->
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<div class="container">
    <h1><?php echo $libro->getIdLibro() ? 'Editar Libro' : 'Registrar Nuevo Libro'; ?></h1>

    <!-- El formulario apunta a guardar o actualizar según corresponda -->
    <form action="index.php?action=<?php echo $libro->getIdLibro() ? 'actualizar' : 'guardar'; ?>" method="POST">
        
        <?php if ($libro->getIdLibro()): ?>
            <!-- Campo oculto para saber qué ID estamos actualizando -->
            <input type="hidden" name="id_libro" value="<?php echo $libro->getIdLibro(); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $libro->getTitulo(); ?>" required>
        </div>

        <div class="form-group">
            <label for="genero">Género:</label>
            <input type="text" name="genero" id="genero" value="<?php echo $libro->getGenero(); ?>">
        </div>

        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" value="<?php echo $libro->getAutor(); ?>" required>
        </div>

        <div class="form-group">
            <label for="editorial">Editorial:</label>
            <input type="text" name="editorial" id="editorial" value="<?php echo $libro->getEditorial(); ?>">
        </div>

        <div class="form-group">
            <label for="fotoportada">URL de la Portada (Imagen):</label>
            <!-- Como en tu BD es VARCHAR, aquí va el texto/enlace de la imagen -->
            <input type="text" name="fotoportada" id="fotoportada" value="<?php echo $libro->getFotoportada(); ?>">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-guardar">Guardar</button>
            <a href="index.php" class="btn btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>