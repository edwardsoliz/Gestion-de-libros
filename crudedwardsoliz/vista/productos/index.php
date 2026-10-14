<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>
    <!-- Enlazamos tu CSS en minúscula -->
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<div class="container">
    <h1>Gestión de Libros</h1>
    
    <!-- Botón para agregar un nuevo libro -->
    <a href="index.php?action=nuevo" class="btn btn-nuevo">+ Nuevo Libro</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Portada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><?php echo $libro->getIdLibro(); ?></td>
                        <td><?php echo $libro->getTitulo(); ?></td>
                        <td><?php echo $libro->getGenero(); ?></td>
                        <td><?php echo $libro->getAutor(); ?></td>
                        <td><?php echo $libro->getEditorial(); ?></td>
                        
                        <!-- AQUÍ ESTÁ LA MAGIA PARA MOSTRAR LA IMAGEN -->
                        <td>
                            <?php if ($libro->getFotoportada()): ?>
                                <img src="<?php echo $libro->getFotoportada(); ?>" alt="Portada" style="width: 80px; height: auto; border-radius: 4px; display: block; margin: 0 auto;">
                            <?php else: ?>
                                <span style="color: #999; font-size: 12px; display: block; text-align: center;">Sin imagen</span>
                            <?php endif; ?>
                        </td>
                        <!-- FIN DE LA MAGIA -->

                        <td>
                            <!-- Enlaces para editar y eliminar -->
                            <a href="index.php?action=editar&id=<?php echo $libro->getIdLibro(); ?>" class="btn btn-editar">Editar</a>
                            <a href="index.php?action=eliminar&id=<?php echo $libro->getIdLibro(); ?>" class="btn btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No hay libros registrados aún.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>