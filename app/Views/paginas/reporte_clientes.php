<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Reporte de encuestados</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?= base_url('rclientes/generarPdf') ?>" class="btn btn-danger">
                                <i class="bi bi-file-earmark-pdf"></i> Generar PDF
                            </a>
                            <a href="<?= base_url('rclientes/generarExcel') ?>" class="btn btn-success">
                                <i class="bi bi-file-earmark-excel"></i> Generar Excel
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="clientesTable" class="display">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <tr>
                                            <td><?= $cliente['idcliente'] ?></td>
                                            <td><?= $cliente['nombre'] ?></td>
                                            <td><?= $cliente['ruc'] ?></td>
                                            <td><?= $cliente['direccion'] ?></td>
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
    $('#clientesTable').DataTable({
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
    $(document).ready(function () {  $('#clientesTable').DataTable();  });
</script>