<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Reporte de Ventas</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?= base_url('rventas/generarPdf') ?>" class="btn btn-danger">
                                <i class="bi bi-file-earmark-pdf"></i> Generar PDF</a>
                            <a href="<?= base_url('rventas/generarExcel') ?>" class="btn btn-success">
                            <i class="bi bi-file-earmark-excel"></i>Generar Excel</a>
                        </div>
                        <div class="table-responsive">
                            <table id="ventasTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre del Cliente</th>
                                        <th>RUC</th>
                                        <th>Fecha</th>
                                        <th>Dirección</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ventas as $venta): ?>
                                        <tr>
                                            <td><?= $venta['id'] ?></td>
                                            <td><?= $venta['nombreCliente'] ?></td>
                                            <td><?= $venta['ruc'] ?></td>
                                            <td><?= $venta['fecha'] ?></td>
                                            <td><?= $venta['direccion'] ?></td>
                                            <td><?= $venta['total'] ?></td>
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
    $('#ventasTable').DataTable({
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
    $(document).ready(function () {
        $('#ventasTable').DataTable();
    });
</script>