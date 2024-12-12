z<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <meta charset="utf-8">
    <title>Encuestas Pagadas - Empresas disponibles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <style>
        /* Base styles */
        body {
            font-family: Arial, sans-serif;
            font-weight: 400;
            font-size: 20px;
            color: #175e92;
            text-align: center;
            line-height: 1.4;
            letter-spacing: 0.2px;
            margin: 0;
            padding: 0;
        }

        /* Header styles */
        header {
            background: linear-gradient(295deg, #1d83c0, #005eb8);
            width: 100%;
            position: relative;
            z-index: 100;
            overflow: hidden;
        }

        .logo {
            float: left;
            margin: 10px;
            height: 40px;
            position: relative;
        }

        .logo img {
            height: 40px;
            position: relative;
            display: block;
        }

        /* Offers section */
        #offers {
            padding-bottom: 50px;
            background: #f0f9ff;
            padding-top: 0;
        }

        .client {
            display: block;
            margin: 0 auto 55px;
            padding: 20px 30px 30px;
            background: #fff;
            border-radius: 17px;
            box-shadow: 0 10px 35px rgb(170 190 209 / 81%);
            border-top: solid 10px #54baf5;
            width: calc(100% - 30px);
            max-width: 400px;
            position: relative;
            text-decoration: none;
            color: inherit;
        }

        .client img {
            padding: 10px 0;
            margin: 0 auto;
            max-height: 120px;
            display: table;
        }

        .client small {
            margin-top: 15px;
            margin-bottom: 22px;
            padding-top: 30px;
            font-size: 90%;
            display: block;
        }

        .client small b {
            font-weight: 600;
            display: block;
        }

    </style>
</head>
<body>
    <header>
        <a class="logo" href="/">
            <img src="<?= base_url('img/photos/Encuestas.png')?>" alt="Logo Encuestas Pagadas">
        </a>
        
    </header>

    <section id="offers">
        <a class="client" href="sql_server" target="_blank" >
        <img src="<?= base_url('img/sql_server/sql_server.png') ?>" alt="Logo de la Tienda" class="img-fluid mb-4" style="max-width: 300px;">
            <small>
                <b>BASE DE DATOS I</b>SQL Server es un sistema gestor de base de datos relacionales 
                (SGDB) desarrollado por Microsoft. Se caracteriza por el uso del lenguaje de base de datos Transact-SQL,
            </small>
            <button type="button" class="btn btn-info">Registrate !YA</button>
        </a>
        
        <a class="client" href="microsoft" target="_blank" >
            <img src="<?= base_url('img/photos/R.jpg')?>" alt="Microsoft" style="max-width:350px;height: auto;">
            <small>
                <b>Microsoft</b>Los productos de software más 
                conocidos de Microsoft son la línea de sistemas operativos Microsoft Windows,
            </small>
            <button type="button" class="btn btn-info">Registrate !YA</button>
        </a>

        <a class="client" href="movil" target="_blank" >
            <img src="<?= base_url('img/android_studio/logo_androidstudio.png')?>" alt="tesla logo" style="max-width:350px;height: auto;">
            <small>
                <b>DESARROLLO DE PLATAFORMAS II</b> Este formulario evalúa tus conocimientos y experiencia en el 
                desarrollo de aplicaciones móviles con Kotlin y Android Studio
            </small>
            <button type="button" class="btn btn-info">Registrate !YA</button>
        </a>
    </section>
</body>
</html>