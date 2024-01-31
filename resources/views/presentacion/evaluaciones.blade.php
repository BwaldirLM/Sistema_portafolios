<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVALUACIONES</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>EVALUACIONES</h1>
        
        <form>
           <!-- Añadir el token CSRF para protección contra ataques CSRF -->
            <!-- Sección para Caratula -->
            <div class="section">
                <div class="question">
                    <h2>Examen Entrada</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="entrada" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="entrada" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="entrada" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Repite la estructura para otras secciones -->
            
            <!-- Sección para Carga Academica -->
            <div class="section">
                <div class="question">
                    <h2>1er Parcial</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="primera" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="primera" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="primera" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sección para Filosofía Docente -->
            <div class="section">
                <div class="question">
                    <h2>2da Parcial</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="segunda" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="segunda" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="segunda" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sección para CV -->
            <div class="section">
                <div class="question">
                    <h2>3ra Parcial</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="tercera" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="tercera" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="tercera" value="Totalmente" checked>
                            Totalmente
                        </label>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="question">
                    <h2>Sustitutorio</h2>
                    <div class="options">
                        <label>
                            <input type="radio" name="susti" value="No">
                            No
                        </label>
                        <label>
                            <input type="radio" name="susti" value="Parcialmente">
                            Parcialmente
                        </label>
                        <label>
                            <input type="radio" name="susti" value="Totalmente" checked>
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
