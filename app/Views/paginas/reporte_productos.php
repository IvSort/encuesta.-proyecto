<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Reporte de Productos</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?= base_url('rproductos/generarPdf') ?>" class="btn btn-danger">
                                <i class="bi bi-file-earmark-pdf"></i> Generar PDF
                            </a>
                            <a href="<?= base_url('rproductos/generarExcel') ?>" class="btn btn-success">
                                <i class="bi bi-file-earmark-excel"></i> Generar Excel
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="productosTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                        <tr>
                                            <td><?= $producto['idproductos'] ?></td>
                                            <td><?= $producto['nombre'] ?></td>
                                            <td><?= $producto['precio'] ?></td>
                                            <td><?= $producto['stock'] ?></td>
                                            <td><img src="<?= base_url('uploads/' . $producto['imagen']) ?>" width="50"
                                                    height="50">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


<script>
     $(document).ready(function() {
    $('#productosTable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron resultados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    })
    $(document).ready(function () {$('#productosTable').DataTable(); });
</script>