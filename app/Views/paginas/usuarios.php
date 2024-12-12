<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Usuarios</h5>
                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createUsuarioModal"><i class="bi bi-person-plus"></i>Crear Usuario</button>
                    </div>
                    <div class="card-body">
                        <table id="usuariosTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario): ?>
                                    <tr>
                                        <td><?= $usuario['id_usuarios'] ?></td>
                                        <td><?= $usuario['usuario'] ?></td>
                                        <td><?= $usuario['email'] ?></td>
                                        <td>
                                            <button class="btn btn-warning icon-button" data-bs-toggle="modal" data-bs-target="#editUsuarioModal" 
                                                data-id="<?= $usuario['id_usuarios'] ?>" data-usuario="<?= $usuario['usuario'] ?>" data-email="<?= $usuario['email'] ?>">
                                                <i class="bi bi-pencil"></i> <!-- Ícono de lápiz -->
                                            </button>

                                            <a href="<?= base_url('usuarios/delete/' . $usuario['id_usuarios']) ?>" class="btn btn-danger icon-button" 
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
                                                <i class="bi bi-trash"></i> <!-- Ícono de tachito -->
                                            </a>
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

    <!-- Modal para crear un nuevo usuario -->
    <div class="modal fade" id="createUsuarioModal" tabindex="-1" aria-labelledby="createUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('usuarios/store') ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUsuarioLabel">Crear Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar un usuario -->
    <div class="modal fade" id="editUsuarioModal" tabindex="-1" aria-labelledby="editUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('usuarios/update') ?>" method="post">
                    <input type="hidden" name="id" id="editId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUsuarioLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="editUsuario" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editContraseña" class="form-label">Nueva Contraseña (opcional)</label>
                            <input type="password" class="form-control" id="editContraseña" name="contraseña">
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
</main>

<script>
    // Script para cargar los datos del usuario en el modal de edición
    document.addEventListener('DOMContentLoaded', function() {
        var editUsuarioModal = document.getElementById('editUsuarioModal');
        editUsuarioModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var usuario = button.getAttribute('data-usuario');
            var email = button.getAttribute('data-email');

            var modal = editUsuarioModal.querySelector('form');
            modal.querySelector('#editId').value = id;
            modal.querySelector('#editUsuario').value = usuario;
            modal.querySelector('#editEmail').value = email;
        });
    });
</script>
