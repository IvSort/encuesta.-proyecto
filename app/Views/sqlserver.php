<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta SQL Server</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            color: #1a365d;
            font-size: 2.5em;
            text-transform: uppercase;
            margin: 0;
            padding: 20px;
            background: linear-gradient(45deg, #1a365d, #2c5282);
            color: white;
            border-radius: 10px 10px 0 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .subtitle {
            color: #2c5282;
            font-size: 1.2em;
            margin-top: 10px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 25px;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }
        .form-column {
            flex: 1;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #2c5282;
        }
        input[type="text"], 
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="text"]:focus, 
        input[type="email"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            outline: none;
            border-color: #2c5282;
            box-shadow: 0 0 5px rgba(44,82,130,0.2);
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .radio-group {
            margin: 10px 0;
            padding: 5px 0;
        }
        .radio-group label {
            font-weight: normal;
            margin-left: 5px;
        }
        .rating-group {
            display: flex;
            gap: 15px;
            margin: 10px 0;
        }
        .rating-option {
            padding: 10px 20px;
            border: 2px solid #2c5282;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .rating-option:hover {
            background-color: #2c5282;
            color: white;
        }
        .rating-option.selected {
            background-color: #2c5282;
            color: white;
        }
        .btn-submit {
            background-color: #2c5282;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1em;
            transition: all 0.3s ease;
            display: block;
            margin: 30px auto 0;
        }
        .btn-submit:hover {
            background-color: #1a365d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .logo-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 15px 0;
        }
        .logo-options img {
            width: 100px;
            padding: 5px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        .logo-options img:hover {
            border-color: #2c5282;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">BASE DE DATOS I</h1>
        <p class="subtitle">Encuesta de Satisfacción</p>
    </div>
    <div class="container">
        <form id="sqlSurvey" action="<?= base_url('/respuestas/registrar') ?>" method="POST">
        <!-- Información de contacto -->
        <div class="form-group">
            <h2>Información de Contacto</h2>
            <div class="form-row">
                <div class="form-column">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-column">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column" style="margin-top:40px;">
                    <label>Correo Electrónico:<span style="color:black;"> <?= session()->get('email'); ?></label>
                </div>
                <div class="form-column">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono">
                </div>
            </div>
        </div>
        <button type="submit" class="btn-submit">Enviar Encuesta</button>
        </form>
        <!-- Pregunta de opción múltiple -->
        <div class="form-group">
            <label>1. ¿Qué es SQL Server?</label>
            <div class="radio-group">
                <input type="radio" name="numrespuesta" id="def1" value="sgbd" required>
                <label for="def1">Sistema Gestor de Base de Datos relacional</label><br>
                <input type="radio" name="numrespuesta" id="def2" value="programming">
                <label for="def2">Lenguaje de programación</label><br>
                <input type="radio" name="numrespuesta" id="def3" value="web">
                <label for="def3">Servidor web</label>
            </div>
        </div>

        <!-- Pregunta de selección múltiple -->
        <div class="form-group">
            <label>2. Seleccione los componentes principales de SQL Server:</label>
            <div class="radio-group">
                <input type="checkbox" id="comp1" name="numrespuestados[]" value="database">
                <label for="comp1">Motor de base de datos</label><br>
                <input type="checkbox" id="comp2" name="numrespuestados[]" value="analysis">
                <label for="comp2">Servicios de análisis</label><br>
                <input type="checkbox" id="comp3" name="numrespuestados[]" value="reporting">
                <label for="comp3">Servicios de reportes</label><br>
                <input type="checkbox" id="comp4" name="numrespuestados[]" value="integration">
                <label for="comp4">Servicios de integración</label>
            </div>
        </div>

        <!-- Selección de logo -->
        <div class="form-group">
            <label>3. Seleccione el logo correcto de SQL Server:</label>
            <div class="logo-options">
                <img src="<?= base_url('img/sql_server/server.png') ?>" alt="Logo 1" onclick="selectLogo('server')">
                <img src="<?= base_url('img/sql_server/ic_xammp.png') ?>" alt="Logo 2" onclick="selectLogo('xammp')">
                <img src="<?= base_url('img/sql_server/icon_heidi.png') ?>" alt="Logo 3" onclick="selectLogo('heidi')">
            </div>
            <input type="hidden" name="imagen" id="selectedLogo">
        </div>

        <!-- Nueva pregunta de valoración del curso -->
        <div class="form-group">
            <label>4. ¿Cómo calificarías el curso de base de datos con SQL Server?</label>
            <div class="rating-group">
                <div class="rating-option" onclick="selectRating('excelente')">Excelente</div>
                <div class="rating-option" onclick="selectRating('muyBueno')">Muy Bueno</div>
                <div class="rating-option" onclick="selectRating('bueno')">Bueno</div>
                <div class="rating-option" onclick="selectRating('regular')">Regular</div>
                <div class="rating-option" onclick="selectRating('malo')">Malo</div>
            </div>
            <input type="hidden" name="courseRating" id="courseRating">
        </div>

        <!-- Campo de experiencia -->
        <div class="form-group">
            <label>5. ¿Qué experiencia tiene con SQL Server? Comparta sus comentarios:</label>
            <textarea name="respuesta" placeholder="Escriba sobre su experiencia con SQL Server..."></textarea>
        </div>


    </div>

    <script>
        function selectLogo(logoNumber) {
            document.querySelectorAll('.logo-options img').forEach(img => {
                img.style.border = '2px solid transparent';
            });
            event.target.style.border = '2px solid #2c5282';
            document.getElementById('selectedLogo').value = logoNumber;
        }

        function selectRating(rating) {
            document.querySelectorAll('.rating-option').forEach(option => {
                option.classList.remove('selected');
            });
            event.target.classList.add('selected');
            document.getElementById('courseRating').value = rating;
        }
        document.getElementById('sqlSurvey').onsubmit = function(e) {
            // El formulario se enviará de forma tradicional, así que no necesitas evitar la acción predeterminada
            // e.preventDefault();  // Elimina esta línea para permitir el comportamiento tradicional

            // El formulario se enviará automáticamente al hacer clic en el botón de submit,
            // sin necesidad de usar JavaScript para manejar el envío.
        };


    </script>
</body>
</html>