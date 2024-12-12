<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <link rel="stylesheet" href="<?= base_url('path/to/datatables/css') ?>">
    <script src="<?= base_url('path/to/jquery') ?>"></script>
    <script src="<?= base_url('path/to/datatables/js') ?>"></script>
</head>
<body>
<main class="content">
    <div class="main-content container-fluid">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Historial
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <button onclick="window.location.href='<?= site_url('rhistorial/exportPdf') ?>'"
                            class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> Generar PDF</button>
                        <button onclick="window.location.href='<?= site_url('rhistorial/exportExcel') ?>'"
                            class="btn btn-success"><i class="bi bi-file-earmark-excel"></i>Generar Excel</button>
                    </div>
                    <table id="historialTable" class="display">
                        <thead>
                            <tr>
                                <th>ID Historial</th>
                                <th>Nombre del Cliente</th>
                                <th>Nombre del Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historial as $item): ?>
                                <tr>
                                    <td><?= $item['idhistorial'] ?></td>
                                    <td><?= $item['cliente_nombre'] ?></td>
                                    <td><?= $item['producto_nombre'] ?></td>
                                    <td><?= $item['precio'] ?></td>
                                    <td><?= $item['cantidad'] ?></td>
                                    <td><?= $item['importe'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
     $(document).ready(function() {
    $('#historialTable').DataTable({
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
        $('#historialTable').DataTable();
    });
</script>
</body>
</html>
