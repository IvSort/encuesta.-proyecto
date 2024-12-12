
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Top curiosidades</h5>
                    </div>
                    <div class="card-body">
                    <table id="topClientesTable" class="display">
                    <thead>
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Cantidad de Compras</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topclientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['cliente_nombre'] ?></td>
                                <td><?= $cliente['cantidad'] ?></td>
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

<script>
     $(document).ready(function() {
    $('#topClientesTable').DataTable({
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
        $('#topClientesTable').DataTable();
    });
</script>