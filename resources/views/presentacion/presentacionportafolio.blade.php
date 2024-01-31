<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESENTACION DE PORTAFOLIO</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>PRESENTACION DE PORTAFOLIO</h1>
        
        <form>
           <!-- Añadir el token CSRF para protección contra ataques CSRF -->
            <!-- Sección para Caratula -->
            <div class="section">
                <div class="question">
                    <h2>Caratula</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="caratula" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="caratula" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="caratula" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Repite la estructura para otras secciones -->
            
            <!-- Sección para Carga Academica -->
            <div class="section">
                <div class="question">
                    <h2>Carga Academica</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="carga_academica" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="carga_academica" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="carga_academica" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sección para Filosofía Docente -->
            <div class="section">
                <div class="question">
                    <h2>Filosofía Docente</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="filosofia_docente" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="filosofia_docente" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="filosofia_docente" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sección para CV -->
            <div class="section">
                <div class="question">
                    <h2>CV</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="cv" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="cv" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="cv" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="question2">
                    <button type="submit" id="guardar-btn">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
