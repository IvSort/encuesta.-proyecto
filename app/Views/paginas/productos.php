<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Productos</h5>
                    </div>
                    <div class="card-body">
                        <!-- Botón para abrir el modal -->
                        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#productoModal">
                            <i class="bi bi-box"></i> Crear Producto
                        </button>

                        <!-- Lista de Productos -->
                        <div class="row">
                            <?php if (!empty($productos)): ?>
                                <?php foreach ($productos as $producto): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="card">
                                            <?php if (!empty($producto['imagen'])): ?>
                                                <img src="<?= base_url('uploads/' . $producto['imagen']) ?>"
                                                     style="width: 100%; height: 200px; object-fit: cover;"
                                                     alt="<?= $producto['nombre'] ?>">
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                                                <p class="card-text">Precio: S/ <?= number_format($producto['precio'], 2) ?></p>
                                                <p class="card-text">Stock: <?= $producto['stock'] ?></p>
                                                <td>
                                                    <!-- Botón Editar -->
                                                    <button class="btn btn-warning btn-sm icon-button" data-bs-toggle="modal" 
                                                        data-bs-target="#editarModal<?= $producto['idproductos'] ?>">
                                                        <i class="bi bi-pencil"></i> <!-- Ícono de lápiz -->
                                                    </button>

                                                    <!-- Botón Eliminar -->
                                                    <a href="<?= base_url('productos/eliminarProducto/' . $producto['idproductos']) ?>" 
                                                    class="btn btn-danger btn-sm icon-button" 
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                                        <i class="bi bi-trash"></i> <!-- Ícono de tachito -->
                                                    </a>
                                                </td>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para editar un producto -->
                                    <div class="modal fade" id="editarModal<?= $producto['idproductos'] ?>" tabindex="-1"
                                         aria-labelledby="editarModalLabel<?= $producto['idproductos'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= base_url('productos/actualizarProducto/' . $producto['idproductos']) ?>"
                                                      method="post" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editarModalLabel<?= $producto['idproductos'] ?>">Editar Producto
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                                                            <input type="text" class="form-control" name="nombreProducto"
                                                                   value="<?= $producto['nombre'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="precioProducto" class="form-label">Precio del Producto</label>
                                                            <input type="number" step="0.01" class="form-control"
                                                                   name="precioProducto" value="<?= $producto['precio'] ?>"
                                                                   required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stockProducto" class="form-label">Stock</label>
                                                            <input type="number" class="form-control" name="stockProducto"
                                                                   value="<?= $producto['stock'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="imagenProducto" class="form-label">Imagen del Producto</label>
                                                            <input type="file" class="form-control" name="imagenProducto">
                                                            <?php if (!empty($producto['imagen'])): ?>
                                                                <img src="<?= base_url('uploads/' . $producto['imagen']) ?>"
                                                                     alt="<?= $producto['nombre'] ?>"
                                                                     class="img-thumbnail mt-2 product-image"
                                                                     style="width: 100%; height: 200px; object-fit: cover;">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No hay productos disponibles.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- modal para crear un producto -->
<div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('productos/guardarProducto') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="productoModalLabel">Crear Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nombreProducto"
                               value="<?= old('nombreProducto') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="precioProducto" class="form-label">Precio del Producto</label>
                        <input type="number" step="0.01" class="form-control" name="precioProducto"
                               value="<?= old('precioProducto') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stockProducto" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stockProducto"
                               value="<?= old('stockProducto') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagenProducto" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" name="imagenProducto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
