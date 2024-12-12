<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro - Microsoft 365</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #00a4ef 0%, #0078d4 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .header-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .header h1 {
            margin-bottom: 15px;
            font-size: 2.2em;
        }

        .header p {
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-container {
            padding: 30px;
        }

        .section {
            margin-bottom: 40px;
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .section-title {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #00a4ef;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #00a4ef;
            font-size: 1.2em;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-column {
            flex: 1;
            min-width: 250px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #00a4ef;
            box-shadow: 0 0 0 3px rgba(0,164,239,0.1);
            background-color: #fff;
        }

        .plans-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .plan-card {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .plan-card:hover {
            border-color: #00a4ef;
            transform: translateY(-2px);
        }

        .plan-card.selected {
            border-color: #00a4ef;
            background-color: rgba(0,164,239,0.05);
        }

        .plan-icon {
            font-size: 2em;
            margin-bottom: 10px;
            color: #00a4ef;
        }

        .plan-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .plan-price {
            color: #666;
            font-size: 0.9em;
        }

        .apps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .app-option {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .app-option:hover {
            border-color: #00a4ef;
            background-color: rgba(0,164,239,0.05);
        }

        .app-option.selected {
            border-color: #00a4ef;
            background-color: rgba(0,164,239,0.1);
        }

        .app-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        .feature-list {
            margin: 20px 0;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 6px;
            background-color: #f8f9fa;
        }

        .feature-icon {
            color: #00a4ef;
        }

        .submit-button {
            background: linear-gradient(135deg, #00a4ef 0%, #0078d4 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1em;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-column {
                min-width: 100%;
            }

            .plans-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <h1>Microsoft 365</h1>
                <p>Complete el siguiente formulario para registrarse en Microsoft 365 y descubra todas las herramientas que potenciarán su productividad.</p>
            </div>
        </div>
        
        <div class="form-container">
            <form id="microsoftForm" onsubmit="event.preventDefault(); handleSubmit();">
                <!-- Información Personal -->
                <div class="section">
                    <h2 class="section-title">
                        <i>👤</i>
                        Información Personal
                    </h2>
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="nombre">Nombre Completo*</label>
                                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Juan Pérez">
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="email">Email Corporativo*</label>
                                <input type="email" id="email" name="email" required placeholder="nombre@empresa.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="telefono">Teléfono*</label>
                                <input type="tel" id="telefono" name="telefono" required placeholder="+51 999 999 999">
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="empresa">Nombre de la Empresa</label>
                                <input type="text" id="empresa" name="empresa" placeholder="Nombre de su organización">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Planes -->
                <div class="section">
                    <h2 class="section-title">
                        <i>📦</i>
                        Seleccione su Plan
                    </h2>
                    <div class="plans-container">
                        <div class="plan-card" onclick="selectPlan('personal')">
                            <div class="plan-icon">👤</div>
                            <div class="plan-title">Personal</div>
                            <div class="plan-price">$6.99/mes</div>
                        </div>
                        <div class="plan-card" onclick="selectPlan('familia')">
                            <div class="plan-icon">👨‍👩‍👧‍👦</div>
                            <div class="plan-title">Familia</div>
                            <div class="plan-price">$9.99/mes</div>
                        </div>
                        <div class="plan-card" onclick="selectPlan('business')">
                            <div class="plan-icon">💼</div>
                            <div class="plan-title">Business</div>
                            <div class="plan-price">$12.99/usuario/mes</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usuarios">Número de Usuarios*</label>
                        <select id="usuarios" name="usuarios" required>
                            <option value="">Seleccione el número de usuarios</option>
                            <option value="1">1 usuario</option>
                            <option value="2-5">2-5 usuarios</option>
                            <option value="6-10">6-10 usuarios</option>
                            <option value="11-25">11-25 usuarios</option>
                            <option value="26+">26+ usuarios</option>
                        </select>
                    </div>
                </div>

                <!-- Aplicaciones -->
                <div class="section">
                    <h2 class="section-title">
                        <i>📱</i>
                        Aplicaciones de Interés
                    </h2>
                    <div class="apps-grid">
                        <div class="app-option" onclick="selectApp('word')">
                            <img src="img/microsoft/ic_word.png" alt="Word" class="app-icon">
                            <div>Word</div>
                        </div>
                        <div class="app-option" onclick="selectApp('excel')">
                            <img src="img/microsoft/ic_excel.png" alt="Excel" class="app-icon">
                            <div>Excel</div>
                        </div>
                        <div class="app-option" onclick="selectApp('powerpoint')">
                            <img src="img/microsoft/ic_powepoint.png" alt="PowerPoint" class="app-icon">
                            <div>PowerPoint</div>
                        </div>
                        <div class="app-option" onclick="selectApp('teams')">
                            <img src="img/microsoft/ic_teams.png" alt="Teams" class="app-icon">
                            <div>Teams</div>
                        </div>
                    </div>

                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span>Almacenamiento en la nube con OneDrive</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span>Colaboración en tiempo real</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span>Soporte técnico 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- Encuesta sobre Microsoft -->
                <div class="section">
                    <h2 class="section-title">
                        <i>📋</i>
                        Encuesta Microsoft
                    </h2>
                    
                    <div class="form-group">
                        <label>¿Cómo conociste Microsoft?</label>
                        <div class="radio-options">
                            <div class="radio-option">
                                <input type="radio" id="conocimiento1" name="conocimiento">
                                <label for="conocimiento1">En el trabajo</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="conocimiento2" name="conocimiento">
                                <label for="conocimiento2">En la universidad/escuela</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="conocimiento3" name="conocimiento">
                                <label for="conocimiento3">Por recomendación</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="conocimiento4" name="conocimiento">
                                <label for="conocimiento4">Publicidad</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>¿Quién fundó Microsoft?</label>
                        <div style="display: flex; justify-content: center; gap: 15px; margin: 15px 0; flex-wrap: nowrap;">
                            <div style="text-align: center; padding: 10px; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; width: 100px; transition: all 0.3s ease;" onclick="selectFounder('gates')">
                                <img src="img/microsoft/ic_bill.png" alt="Bill Gates" style="width: 50px; height: 50px; border-radius: 50%; margin-bottom: 8px; object-fit: cover;">
                                <div style="font-size: 0.9em; font-weight: 500;">Bill Gates</div>
                            </div>
                            <div style="text-align: center; padding: 10px; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; width: 100px; transition: all 0.3s ease;" onclick="selectFounder('allen')">
                                <img src="img/microsoft/ic_paull.png" alt="Paul Allen" style="width: 50px; height: 50px; border-radius: 50%; margin-bottom: 8px; object-fit: cover;">
                                <div style="font-size: 0.9em; font-weight: 500;">Paul Allen</div>
                            </div>
                            <div style="text-align: center; padding: 10px; border: 2px solid #ddd; border-radius: 8px; cursor: pointer; width: 100px; transition: all 0.3s ease;" onclick="selectFounder('jobs')">
                                <img src="img/microsoft/ic_stevejobs.png" alt="Steve Jobs" style="width: 50px; height: 50px; border-radius: 50%; margin-bottom: 8px; object-fit: cover;">
                                <div style="font-size: 0.9em; font-weight: 500;">Steve Jobs</div>
                            </div>
                        </div>
                        <input type="hidden" id="selectedFounder" name="selectedFounder">
                    </div>

                    <div class="form-group">
                        <label>¿Qué productos de Microsoft has utilizado anteriormente?</label>
                        <div class="checkbox-grid">
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto1" name="productos">
                                <label for="producto1">Windows</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto2" name="productos">
                                <label for="producto2">Office</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto3" name="productos">
                                <label for="producto3">Xbox</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto4" name="productos">
                                <label for="producto4">Skype</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto5" name="productos">
                                <label for="producto5">Azure</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="producto6" name="productos">
                                <label for="producto6">Teams</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>¿Cuántos años llevas usando productos Microsoft?</label>
                        <div class="experience-slider">
                            <input type="range" min="0" max="20" value="5" class="slider" id="experienceSlider">
                            <div class="slider-value"><span id="experienceValue">5</span> años</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>¿Qué característica de Microsoft 365 te parece más útil?</label>
                        <div class="feature-cards">
                            <div class="feature-card" onclick="selectFeature('cloud')">
                                <i class="feature-icon">☁️</i>
                                <div class="feature-name">Almacenamiento en la nube</div>
                            </div>
                            <div class="feature-card" onclick="selectFeature('collab')">
                                <i class="feature-icon">👥</i>
                                <div class="feature-name">Colaboración en tiempo real</div>
                            </div>
                            <div class="feature-card" onclick="selectFeature('apps')">
                                <i class="feature-icon">📱</i>
                                <div class="feature-name">Aplicaciones integradas</div>
                            </div>
                            <div class="feature-card" onclick="selectFeature('security')">
                                <i class="feature-icon">🔒</i>
                                <div class="feature-name">Seguridad avanzada</div>
                            </div>
                        </div>
                        <input type="hidden" id="selectedFeature" name="selectedFeature">
                    </div>
                </div>

                <!-- Estilos adicionales -->
                <style>
                    .radio-options {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                        gap: 15px;
                        margin-top: 10px;
                    }

                    .radio-option {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        padding: 10px;
                        border: 1px solid #ddd;
                        border-radius: 6px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .radio-option:hover {
                        border-color: #00a4ef;
                        background-color: rgba(0,164,239,0.05);
                    }

                    .founder-options {
                        display: flex;
                        justify-content: center;
                        gap: 20px;
                        margin: 20px 0;
                        flex-wrap: wrap;
                    }

                    .founder-card {
                        text-align: center;
                        padding: 15px;
                        border: 2px solid #ddd;
                        border-radius: 8px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .founder-card:hover {
                        border-color: #00a4ef;
                        transform: translateY(-2px);
                    }

                    .founder-card.selected {
                        border-color: #00a4ef;
                        background-color: rgba(0,164,239,0.05);
                    }

                    .founder-img {
                        border-radius: 50%;
                        margin-bottom: 10px;
                    }

                    .founder-name {
                        font-weight: 500;
                    }

                    .checkbox-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                        gap: 15px;
                        margin-top: 10px;
                    }

                    .checkbox-option {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        padding: 10px;
                        border: 1px solid #ddd;
                        border-radius: 6px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .checkbox-option:hover {
                        border-color: #00a4ef;
                        background-color: rgba(0,164,239,0.05);
                    }

                    .experience-slider {
                        margin: 20px 0;
                        text-align: center;
                    }

                    .slider {
                        width: 100%;
                        height: 10px;
                        border-radius: 5px;
                        background: #ddd;
                        outline: none;
                        -webkit-appearance: none;
                    }

                    .slider::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        background: #00a4ef;
                        cursor: pointer;
                    }

                    .slider-value {
                        margin-top: 10px;
                        font-weight: 500;
                        color: #00a4ef;
                    }

                    .feature-cards {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                        gap: 20px;
                        margin-top: 15px;
                    }

                    .feature-card {
                        text-align: center;
                        padding: 20px;
                        border: 2px solid #ddd;
                        border-radius: 8px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .feature-card:hover {
                        border-color: #00a4ef;
                        transform: translateY(-2px);
                    }

                    .feature-card.selected {
                        border-color: #00a4ef;
                        background-color: rgba(0,164,239,0.05);
                    }

                    .feature-icon {
                        font-size: 2em;
                        margin-bottom: 10px;
                        display: block;
                    }

                    .feature-name {
                        font-weight: 500;
                    }
                </style>

                <!-- Comentarios -->
                <div class="section">
                    <h2 class="section-title">
                        <i>💭</i>
                        Comentarios Adicionales
                    </h2>
                    <div class="form-group">
                        <label for="comentarios">¿Tiene alguna pregunta o sugerencia? comentanos en este espacio.</label>
                        <textarea id="comentarios" name="comentarios" rows="4" placeholder="Escriba sus comentarios aquí..."></textarea>
                    </div>
                </div>

                <button type="submit" class="submit-button">Completar Registro</button>
            </form>
        </div>
    </div>

    <script>
        function selectPlan(planId) {
            document.querySelectorAll('.plan-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.target.closest('.plan-card').classList.add('selected');
        }

        function selectApp(appId) {
            const appElement = event.target.closest('.app-option');
            appElement.classList.toggle('selected');
        }

        function selectFounder(founderId) {
            document.querySelectorAll('.founder-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.target.closest('.founder-card').classList.add('selected');
            document.getElementById('selectedFounder').value = founderId;
        }

        function selectFeature(featureId) {
            document.querySelectorAll('.feature-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.target.closest('.feature-card').classList.add('selected');
            document.getElementById('selectedFeature').value = featureId;
        }

        // Actualizar el valor del slider
        document.getElementById('experienceSlider').addEventListener('input', function() {
            document.getElementById('experienceValue').textContent = this.value;
        });

        function handleSubmit() {
            // Aquí puedes agregar la lógica de envío del formulario
            alert('¡Gracias por registrarte! Pronto recibirás un correo con los siguientes pasos.');
        }
    </script>
</body>
</html>