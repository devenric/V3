<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form method="POST">
        Id:<br>
        <input type="text" name="id" value="<?= $producto->getId() ?>" required><br><br>

        Nombre:<br>
        <input type="text" name="nombre" value="<?= $producto->getNombre() ?>" required><br><br>
        Formato:<br>
        <input type="text"  name="formato" value="<?= $producto->getFormato() ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>
