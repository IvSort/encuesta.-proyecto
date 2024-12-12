<div class="main-content container-fluid">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Clientes
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createClienteModal">
                    <i class="bi bi-person-plus"></i> Crear Cliente
                </button>
            </div>
            <div class="card-body">
                <table id="clientesTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>RUC</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['idcliente'] ?></td>
                            <td><?= $cliente['nombre'] ?></td>
                            <td><?= $cliente['ruc'] ?></td>
                            <td><?= $cliente['direccion'] ?></td>
                            <td>

                            <button class="btn btn-warning icon-button" data-bs-toggle="modal" data-bs-target="#editClienteModal" 
                                data-id="<?= $cliente['idcliente'] ?>" data-nombre="<?= $cliente['nombre'] ?>" 
                                data-ruc="<?= $cliente['ruc'] ?>" data-direccion="<?= $cliente['direccion'] ?>">
                                <i class="bi bi-pencil"></i> 
                            </button>
                            
                            <a href="<?= base_url('clientes/delete/' . $cliente['idcliente']) ?>" class="btn btn-danger icon-button" 
                                onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?')">
                                <i class="bi bi-trash"></i>
                                
                            </a>
                        </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal para crear cliente -->
<div class="modal fade" id="createClienteModal" tabindex="-1" aria-labelledby="createClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClienteModalLabel">Crear Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('clientes/store') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" required>
                        <span id="errorRuc" class="text-danger" style="display: none;">RUC inválido. Debe ser un número de 11 dígitos y empezar con 10 o 20.</span>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar cliente -->
<div class="modal fade" id="editClienteModal" tabindex="-1" aria-labelledby="editClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClienteModalLabel">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('clientes/update') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="editId" name="idcliente">
                    <div class="form-group">
                        <label for="editNombre">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="editRuc">RUC</label>
                        <input type="text" class="form-control" id="editRuc" name="ruc" required>
                    </div>
                    <div class="form-group">
                        <label for="editDireccion">Dirección</label>
                        <input type="text" class="form-control" id="editDireccion" name="direccion" required>
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

<!-- Incluye jQuery y DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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

    $('#editClienteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nombre = button.data('nombre');
        var ruc = button.data('ruc');
        var direccion = button.data('direccion');

        var modal = $(this);
        modal.find('#editId').val(id);
        modal.find('#editNombre').val(nombre);
        modal.find('#editRuc').val(ruc);
        modal.find('#editDireccion').val(direccion);
    });
});
document.getElementById('ruc').addEventListener('input', function() {
        const ruc = this.value;
        const errorRuc = document.getElementById('errorRuc');
        
        // Expresión regular para validar el RUC
        const regexRuc = /^(10|20)\d{9}$/;
        
        // Validación del RUC
        if (!regexRuc.test(ruc)) {
            errorRuc.style.display = 'block';
        } else {
            errorRuc.style.display = 'none';
        }
    });
</script>
