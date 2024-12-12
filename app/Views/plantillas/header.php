<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="<?= base_url('img/icons/image.png'); ?>" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>FORMULARIO</title>

    <link href="<?= base_url('css/app.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .product-image {
            width: 100%;
            height: 200px;
            /* Ajusta la altura según tus necesidades */
            object-fit: cover;
        }


        .icon-button {
            background-color: transparent;  
            border: none;                   
            padding: 5px;                  
            color: black;               
        }

        .icon-button:hover {
            background-color: #6c757d; 
            color: white;              
        }

        .icon-button i {
            font-size: 1.5rem;  
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="<?= base_url('principal'); ?>">
                <img src="<?= base_url('img/photos/formulario.jpg'); ?>" alt="Logo de la Tienda" class="img-fluid mb-3" style="max-width: 210px;">
                    <span class="align-middle">FORMULARIO</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                    <h5 style="color:white" >Encuesta</h5>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('principal'); ?>">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Principal</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('ventas/create'); ?>">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Formulario</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        <h5 style="color:white" >Gestionar</h5>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('usuarios'); ?>">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuarios</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('clientes'); ?>">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Encuestados</span>
                        </a>
                    </li>

                   <!-- <li class="sidebar-item"> -->
                        <!-- <a class="sidebar-link" href="<?= base_url('productos'); ?>"> -->
                            <!-- <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Productos</span> -->
                        <!-- </a> -->
                    <!-- </li> -->

                    <li class="sidebar-header">
                    <h5 style="color:white" >Reportes</h5>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('rclientes/reporte'); ?>">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span
                                class="align-middle">Encuestados</span>
                        </a>
                    </li>

                    <!-- <li class="sidebar-item"> -->
                        <!-- <a class="sidebar-link" href="<?= base_url('rproductos/reporte'); ?>"> -->
                            <!-- <i class="align-middle" data-feather="bar-chart-2"></i> <span -->
                                <!-- class="align-middle">Productos</span> -->
                        <!-- </a> -->
                    <!-- </li> -->

                    <!-- <li class="sidebar-item"> -->
                        <!-- <a class="sidebar-link" href="<?= base_url('rventas/reporte'); ?>"> -->
                            <!-- <i class="align-middle" data-feather="bar-chart-2"></i> <span -->
                                <!-- class="align-middle">Ventas</span> -->
                        <!-- </a> -->
                    <!-- </li> -->

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('topventas'); ?>">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Top asignaturas
                                preferidas</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('topclientes'); ?>">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Top curiosidades</span>
                        </a>
                    </li>

                    <!-- <li class="sidebar-item"> -->
                        <!-- <a class="sidebar-link" href="<?= base_url('rhistorial'); ?>"> -->
                            <!-- <i class="align-middle" data-feather="bar-chart-2"></i> <span -->
                                <!-- class="align-middle">Historial</span> -->
                        <!-- </a> -->
                    <!-- </li> -->
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="<?= base_url('img/avatars/user.jpg'); ?>"
                                    class="avatar img-fluid rounded me-1" alt="Usuario" /> <span class="text-dark">Hola,
                                    <?= session()->get('usuario'); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                    <i class="align-middle me-1" data-feather="user"></i> Mi perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('login/logout'); ?>">
                                    <i class="align-middle me-1" data-feather="log-out"></i> Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Modal de perfil -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Mi perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Usuario:</strong> <?= session()->get('usuario'); ?></p>
                            <p><strong>Email:</strong> <?= session()->get('email'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>