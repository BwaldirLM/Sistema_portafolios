<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTENIDO</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>CONTENIDO</h1>
        
        <form>
           <!-- Añadir el token CSRF para protección contra ataques CSRF -->
            <!-- Sección para Caratula -->
            <div class="section">
                <div class="question">
                    <h2>Silabo</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="silabo" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="silabo" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="silabo" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Repite la estructura para otras secciones -->
            
            <!-- Sección para Carga Academica -->
            <div class="section">
                <div class="question">
                    <h2>Avance</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="avance" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="avance" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="avance" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sección para Filosofía Docente -->
            <div class="section">
                <div class="question">
                    <h2>Asistencia</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="asistencia" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="asistencia" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="asistencia" value="Totalmente" checked>
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
