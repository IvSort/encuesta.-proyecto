<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Boleta de Venta</h1>
    <p><strong>Cliente:</strong> <?= esc($cliente) ?></p>
    <p><strong>Fecha:</strong> <?= date('Y-m-d') ?></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['idproductos']) ?></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td><?= esc($producto['precio']) ?></td>
                    <td><?= esc($producto['stock']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
