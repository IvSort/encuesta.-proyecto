
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Top asignaturas preferidas</h5>
                    </div>
                    <div class="card-body">
                    <table id="topVentasTable" class="display">
                     <thead>
                        <tr>
                            <th>Nombre del Producto</th>
                            <th>Cantidad Vendida</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($topventas as $venta): ?>
                            <tr>
                                <td><?= $venta['producto_nombre'] ?></td>
                                <td><?= $venta['cantidad_vendida'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                     </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
     $(document).ready(function() {
    $('#topVentasTable').DataTable({
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
        $('#topVentasTable').DataTable();
    });
</script>
