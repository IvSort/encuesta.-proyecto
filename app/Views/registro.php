<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <img src="<?= base_url('img/photos/formulario.jpg') ?>" alt="Logo de la Tienda" class="img-fluid mb-4" style="max-width: 300px;">
                            <h1 class="h2">Regístrate</h1>
                            <p class="lead">
                                Crea una cuenta para comenzar
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form id="formulario" action="<?= base_url('/registro') ?>" method="post" onsubmit="return validarFormulario()">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Nombre de Usuario</label>
                                            <input class="form-control form-control-lg" type="text" name="usuario" id="username" placeholder="Ingrese su nombre de usuario" required />
                                            <span id="errorUsuario" class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Correo Electrónico</label>
                                            <input class="form-control form-control-lg" type="email" name="email" id="email" placeholder="Ingrese su correo" required />
                                            <span id="errorEmail" class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-lg" type="password" name="contraseña" id="password" placeholder="Cree una contraseña" required />
                                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                            <span id="errorPassword" class="text-danger"></span>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Registrarse</button>
                                        </div>
                                    </form>
                                    <form action="<?= base_url('/login') ?>" method="get" class="text-center mt-3">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-secondary">Volver a Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function validarFormulario() {
            let esValido = true;

            const usuario = document.getElementById('username').value;
            const errorUsuario = document.getElementById('errorUsuario');
            if (usuario.length < 3) {
                errorUsuario.textContent = "El nombre de usuario debe tener al menos 3 caracteres.";
                esValido = false;
            } else {
                errorUsuario.textContent = "";
            }

            const email = document.getElementById('email').value;
            const errorEmail = document.getElementById('errorEmail');
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexEmail.test(email)) {
                errorEmail.textContent = "Ingrese un correo electrónico válido.";
                esValido = false;
            } else {
                errorEmail.textContent = "";
            }

            const password = document.getElementById('password').value;
            const errorPassword = document.getElementById('errorPassword');
            const regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; 
            if (!regexPassword.test(password)) {
                errorPassword.textContent = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra y un número.";
                esValido = false;
            } else {
                errorPassword.textContent = "";
            }

            return esValido; 
        }
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            togglePassword.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });
    </script>
</body>

</html>