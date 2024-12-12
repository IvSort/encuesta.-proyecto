<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <img src="<?= base_url('img/photos/formulario.jpg') ?>" alt="Logo de la Tienda" class="img-fluid mb-4" style="max-width: 300px;">
                            <h1 class="h2">Bienvenido</h1>
                            <p class="lead">
                                Inicie sesión para continuar
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                <?php if (session()->getFlashdata('msg')): ?>
                                    <?php 
                                    $tipo = session()->getFlashdata('msg_type') ?? 'info'; 
                                    ?>
                                    <div class="alert alert-<?= $tipo ?> text-center p-3" style="background-color: <?= $tipo === 'danger' ? '#f8d7da' : ($tipo === 'info' ? '#d1ecf1' : 'white') ?>; color: <?= $tipo === 'danger' ? '#721c24' : ($tipo === 'info' ? '#0c5460' : 'black') ?>;">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                <?php endif; ?>

                                    <form action="<?= base_url('/login/auth') ?>" method="post">
                                        <div class="mb-3">
                                            <label class="form-label" for="usuario">Usuario</label>
                                            <input class="form-control form-control-lg" type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="contraseña">Contraseña</label>
                                            <div class="input-group">
                                                <input class="form-control form-control-lg" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" required />
                                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Iniciar sesión</button>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/registro') ?>" method="get" class="text-center">
                                    <div class="text-center mt-3">
                                        <p class="mb-0">¿No tienes una cuenta? 
                                            <a href="<?= base_url('/registro') ?>" class="text-primary fw-bold">Regístrate ya</a>
                                        </p>
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

    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('contraseña');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            togglePassword.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });
    </script>
</body>


</html>
