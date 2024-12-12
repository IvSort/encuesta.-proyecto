<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta Desarrollo de Plataformas II</title>
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
            background: linear-gradient(45deg, #006B3F, #3DDC84);
            color: white;
            border-radius: 10px 10px 0 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .subtitle {
            color: #006B3F;
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
            color: #006B3F;
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
            border-color: #3DDC84;
            box-shadow: 0 0 5px rgba(61,220,132,0.2);
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .code-block {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            margin: 10px 0;
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
            flex-wrap: wrap;
        }
        .rating-option {
            padding: 10px 20px;
            border: 2px solid #006B3F;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .rating-option:hover {
            background-color: #3DDC84;
            color: white;
        }
        .rating-option.selected {
            background-color: #006B3F;
            color: white;
        }
        .btn-submit {
            background-color: #006B3F;
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
            background-color: #3DDC84;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .kotlin-logo {
            max-width: 150px;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Desarrollo de Plataformas II</h1>
        <p class="subtitle">Evaluación de Conocimientos - Kotlin & Desarrollo Móvil</p>
    </div>
    <div class="container">
        <form id="mobileDev">
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
                    <div class="form-column">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-column">
                        <label for="codigo">Código de Estudiante:</label>
                        <input type="text" id="codigo" name="codigo" required>
                    </div>
                </div>
            </div>

            <!-- Pregunta sobre declaración de variables -->
            <div class="form-group">
                <label>1. ¿Cómo se declara correctamente una variable inmutable en Kotlin?</label>
                <div class="radio-group">
                    <input type="radio" name="varDeclaration" id="dec1" value="val" required>
                    <label for="dec1">val nombre: String = "valor"</label><br>
                    <input type="radio" name="varDeclaration" id="dec2" value="var">
                    <label for="dec2">var nombre: String = "valor"</label><br>
                    <input type="radio" name="varDeclaration" id="dec3" value="const">
                    <label for="dec3">const nombre: String = "valor"</label>
                </div>
            </div>

            <!-- Pregunta sobre Jetpack Compose -->
            <div class="form-group">
                <label>2. Seleccione los elementos fundamentales de Jetpack Compose:</label>
                <div class="radio-group">
                    <input type="checkbox" id="comp1" name="compose" value="composable">
                    <label for="comp1">@Composable functions</label><br>
                    <input type="checkbox" id="comp2" name="compose" value="state">
                    <label for="comp2">State management</label><br>
                    <input type="checkbox" id="comp3" name="compose" value="recomposition">
                    <label for="comp3">Recomposition</label><br>
                    <input type="checkbox" id="comp4" name="compose" value="modifier">
                    <label for="comp4">Modifiers</label>
                </div>
            </div>

            <!-- Pregunta sobre aspectos importantes -->
            <div class="form-group">
                <label>3. ¿Qué aspectos consideras más importantes en el desarrollo móvil?</label>
                <div class="radio-group">
                    <input type="checkbox" id="asp1" name="aspects" value="performance">
                    <label for="asp1">Rendimiento y optimización</label><br>
                    <input type="checkbox" id="asp2" name="aspects" value="ui">
                    <label for="asp2">Diseño de interfaz de usuario</label><br>
                    <input type="checkbox" id="asp3" name="aspects" value="lifecycle">
                    <label for="asp3">Ciclo de vida de la aplicación</label><br>
                    <input type="checkbox" id="asp4" name="aspects" value="storage">
                    <label for="asp4">Almacenamiento y gestión de datos</label>
                </div>
            </div>

            <!-- Pregunta sobre selección de imagen -->
            <div class="form-group">
                <label>4. Seleccione la imagen que representa correctamente una interfaz de usuario en Jetpack Compose:</label>
                <div style="display: flex; justify-content: center; gap: 15px; margin: 15px 0; flex-wrap: nowrap;">
                    <img src="img/android_studio/ic_android.png" 
                         alt="UI 1" 
                         onclick="selectUI(1)" 
                         style="width: 80px; height: 80px; border-radius: 8px; border: 2px solid #ddd; padding: 10px; cursor: pointer; transition: all 0.3s ease; object-fit: contain;">
                    <img src="img/android_studio/ic_kotlin.png" 
                         alt="UI 2" 
                         onclick="selectUI(2)" 
                         style="width: 80px; height: 80px; border-radius: 8px; border: 2px solid #ddd; padding: 10px; cursor: pointer; transition: all 0.3s ease; object-fit: contain;">
                    <img src="img/android_studio/ic_jetpackcomposable.png" 
                         alt="UI 3" 
                         onclick="selectUI(3)" 
                         style="width: 80px; height: 80px; border-radius: 8px; border: 2px solid #ddd; padding: 10px; cursor: pointer; transition: all 0.3s ease; object-fit: contain;">
                </div>
                <input type="hidden" name="selectedUI" id="selectedUI">
            </div>

            <!-- Pregunta sobre función Kotlin -->
            <div class="form-group">
                <label>5. ¿Cuál de las siguientes declaraciones de función en Kotlin es correcta?</label>
                <div class="code-samples">
                    <div class="radio-group">
                        <input type="radio" name="kotlinFunction" id="func1" required>
                        <label for="func1">
                            <div class="code-block">
                                fun calculateTotal(price: Double, quantity: Int): Double {
                                    return price * quantity
                                }
                            </div>
                        </label>
                        
                        <input type="radio" name="kotlinFunction" id="func2">
                        <label for="func2">
                            <div class="code-block">
                                function calculateTotal(price: Double, quantity: Int): Double {
                                    return price * quantity
                                }
                            </div>
                        </label>
                        
                        <input type="radio" name="kotlinFunction" id="func3">
                        <label for="func3">
                            <div class="code-block">
                                fun calculateTotal(price: Double, quantity: Int) -> Double {
                                    price * quantity
                                }
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Valoración del curso -->
            <div class="form-group">
                <label>6. ¿Cómo calificarías el curso de Desarrollo de Plataformas II?</label>
                <div class="rating-group">
                    <div class="rating-option" onclick="selectRating('excelente')">Excelente</div>
                    <div class="rating-option" onclick="selectRating('muyBueno')">Muy Bueno</div>
                    <div class="rating-option" onclick="selectRating('bueno')">Bueno</div>
                    <div class="rating-option" onclick="selectRating('regular')">Regular</div>
                    <div class="rating-option" onclick="selectRating('malo')">Malo</div>
                </div>
                <input type="hidden" name="courseRating" id="courseRating">
            </div>

            <!-- Experiencia con Kotlin y Mentores -->
            <div class="form-group">
                <label>7. Comparte tu experiencia en el desarrollo móvil:</label>
                
                <!-- Subir imagen del proyecto -->
                <div class="project-showcase">
                    <h3 class="subtitle-form">Screenshots de tu aplicación</h3>
                    <p class="helper-text">Comparte capturas de pantalla de tu aplicación o proyecto (máximo 3 imágenes)</p>
                    <div class="image-upload-container">
                        <div class="image-upload">
                            <label for="project-image-1" class="upload-label">
                                <div class="upload-placeholder">
                                    <i class="upload-icon">📱</i>
                                    <span>Click para subir imagen 1</span>
                                </div>
                            </label>
                            <input type="file" id="project-image-1" name="projectImage1" accept="image/*" class="file-input">
                        </div>
                        <div class="image-upload">
                            <label for="project-image-2" class="upload-label">
                                <div class="upload-placeholder">
                                    <i class="upload-icon">📱</i>
                                    <span>Click para subir imagen 2</span>
                                </div>
                            </label>
                            <input type="file" id="project-image-2" name="projectImage2" accept="image/*" class="file-input">
                        </div>
                        <div class="image-upload">
                            <label for="project-image-3" class="upload-label">
                                <div class="upload-placeholder">
                                    <i class="upload-icon">📱</i>
                                    <span>Click para subir imagen 3</span>
                                </div>
                            </label>
                            <input type="file" id="project-image-3" name="projectImage3" accept="image/*" class="file-input">
                        </div>
                    </div>
                </div>

                <!-- Experiencia y aprendizaje -->
                <div class="experience-section">
                    <h3 class="subtitle-form">Tu viaje de aprendizaje</h3>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="mentor">Profesor o mentor que más influyó en tu aprendizaje:</label>
                            <input type="text" id="mentor" name="mentor" placeholder="Nombre del profesor o mentor">
                        </div>
                        <div class="form-column">
                            <label for="timeSpent">Tiempo dedicado al desarrollo móvil:</label>
                            <select id="timeSpent" name="timeSpent">
                                <option value="">Selecciona una opción</option>
                                <option value="0-3">0-3 meses</option>
                                <option value="3-6">3-6 meses</option>
                                <option value="6-12">6-12 meses</option>
                                <option value="12+">Más de 1 año</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="learning-experience">
                        <label>¿Qué recursos te ayudaron más en tu aprendizaje?</label>
                        <div class="checkbox-group">
                            <input type="checkbox" id="resource1" name="resources" value="clases">
                            <label for="resource1">Clases presenciales</label>
                            
                            <input type="checkbox" id="resource2" name="resources" value="documentacion">
                            <label for="resource2">Documentación oficial</label>
                            
                            <input type="checkbox" id="resource3" name="resources" value="videos">
                            <label for="resource3">Videos tutoriales</label>
                            
                            <input type="checkbox" id="resource4" name="resources" value="proyectos">
                            <label for="resource4">Proyectos prácticos</label>
                        </div>
                    </div>

                    <label for="experience-detail">Describe tu experiencia y aprendizajes más importantes:</label>
                    <textarea id="experience-detail" name="experienceDetail" placeholder="Comparte tu experiencia aprendiendo Kotlin y Jetpack Compose. ¿Cuáles fueron tus mayores desafíos? ¿Qué proyectos realizaste? ¿Qué consejos darías a otros estudiantes?" rows="6"></textarea>
                </div>
            </div>

            <style>
                .subtitle-form {
                    color: #006B3F;
                    margin: 15px 0;
                    font-size: 1.1em;
                }
                .helper-text {
                    color: #666;
                    font-size: 0.9em;
                    margin-bottom: 10px;
                }
                .image-upload-container {
                    display: flex;
                    gap: 15px;
                    margin: 15px 0;
                    flex-wrap: wrap;
                }
                .image-upload {
                    flex: 1;
                    min-width: 200px;
                }
                .upload-label {
                    cursor: pointer;
                    display: block;
                }
                .upload-placeholder {
                    border: 2px dashed #006B3F;
                    padding: 20px;
                    text-align: center;
                    border-radius: 8px;
                    background: #f8f8f8;
                    transition: all 0.3s ease;
                }
                .upload-placeholder:hover {
                    background: #e8f5e9;
                }
                .upload-icon {
                    font-size: 24px;
                    display: block;
                    margin-bottom: 10px;
                }
                .file-input {
                    display: none;
                }
                .checkbox-group {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 10px;
                    margin: 10px 0;
                }
                .checkbox-group label {
                    font-weight: normal;
                }
                .learning-experience {
                    margin: 20px 0;
                }
                select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                }
                .experience-section {
                    margin-top: 25px;
                }
            </style>

            <!-- Comentarios adicionales -->
            <div class="form-group">
                <label>8. Comentarios adicionales o sugerencias para mejorar el curso:</label>
                <textarea name="additionalComments" placeholder="Escribe tus comentarios adicionales aquí..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Enviar Encuesta</button>
        </form>
    </div>

    <script>
        function selectUI(uiNumber) {
            document.querySelectorAll('.logo-options img').forEach(img => {
                img.style.border = '2px solid transparent';
            });
            event.target.style.border = '2px solid #006B3F';
            document.getElementById('selectedUI').value = uiNumber;
        }

        function selectRating(rating) {
            document.querySelectorAll('.rating-option').forEach(option => {
                option.classList.remove('selected');
            });
            event.target.classList.add('selected');
            document.getElementById('courseRating').value = rating;
        }

        document.getElementById('mobileDev').onsubmit = function(e) {
            e.preventDefault();
            alert('¡Gracias por completar la encuesta!');
        }
    </script>
</body>
</html>