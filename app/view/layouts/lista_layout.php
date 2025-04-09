<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomar Lista</title>
    <link rel="stylesheet" href="/css/tomar_lista/reset.css">
    <link rel="stylesheet" href="/css/tomar_lista/tomar_lista.css">
</head>
<body>
    <header>
        <h1>Tomar Lista</h1>
        <a href="#">Cerrar Sesión</a>
    </header>

    <div class="container">
        <div class="fichas">
            <label for="ficha">Fichas:</label>
            <select name="ficha" id="ficha">
                <option value="2873707">2873707</option>
                <option value="2873711">2873711</option>
            </select>
        </div>

        <div class="lista">
            <div class="grupo">
                <h1>ADSO: 2873707</h1>
                <button class="todos-btn" onclick="marcarTodos()">⭐ Todos Asistieron</button>
            </div>

            <!-- Aprendiz 1 -->
            <div class="aprendiz">
                <h3>Danna Gabriela Leon Ortega</h3>
                <div class="estado">
                    <label><input type="radio" name="danna" class="asistio"><span class="asistio-dot"></span>Asistió</label>
                    <label><input type="radio" name="danna" class="excusa"><span class="excusa-dot"></span>Excusa</label>
                    <label><input type="radio" name="danna" class="falta"><span class="falta-dot"></span>Falta</label>
                </div>
                <div class="horas-falta">
                    <span>Horas de Falta</span>
                    <input type="number" value="0" />
                </div>
            </div>

            <!-- Aprendiz 2 -->
            <div class="aprendiz">
                <h3>Julian David Marulanda Leon</h3>
                <div class="estado">
                    <label><input type="radio" name="julian" class="asistio"><span class="asistio-dot"></span>Asistió</label>
                    <label><input type="radio" name="julian" class="excusa"><span class="excusa-dot"></span>Excusa</label>
                    <label><input type="radio" name="julian" class="falta"><span class="falta-dot"></span>Falta</label>
                </div>
                <div class="horas-falta">
                    <span>Horas de Falta</span>
                    <input type="number" value="0" />
                </div>
            </div>

            <!-- Aprendiz 3 -->
            <div class="aprendiz">
                <h3>Ferney Arias Franco</h3>
                <div class="estado">
                    <label><input type="radio" name="ferney" class="asistio"><span class="asistio-dot"></span>Asistió</label>
                    <label><input type="radio" name="ferney" class="excusa"><span class="excusa-dot"></span>Excusa</label>
                    <label><input type="radio" name="ferney" class="falta"><span class="falta-dot"></span>Falta</label>
                </div>
                <div class="horas-falta">
                    <span>Horas de Falta</span>
                    <input type="number" value="10" />
                </div>
            </div>

            <!-- Aprendiz 4 -->
            <div class="aprendiz">
                <h3>Mario Alberto Gallego Arias</h3>
                <div class="estado">
                    <label><input type="radio" name="mario" class="asistio"><span class="asistio-dot"></span>Asistió</label>
                    <label><input type="radio" name="mario" class="excusa"><span class="excusa-dot"></span>Excusa</label>
                    <label><input type="radio" name="mario" class="falta"><span class="falta-dot"></span>Falta</label>
                </div>
                <div class="horas-falta">
                    <span>Horas de Falta</span>
                    <input type="number" value="10" />
                </div>
            </div>

            <!-- Aprendiz 5 -->
            <div class="aprendiz">
                <h3>Popelle Marino Maradona</h3>
                <div class="estado">
                    <label><input type="radio" name="popelle" class="asistio"><span class="asistio-dot"></span>Asistió</label>
                    <label><input type="radio" name="popelle" class="excusa"><span class="excusa-dot"></span>Excusa</label>
                    <label><input type="radio" name="popelle" class="falta"><span class="falta-dot"></span>Falta</label>
                </div>
                <div class="horas-falta">
                    <span>Horas de Falta</span>
                    <input type="number" value="0" />
                </div>
            </div>

        </div>
    </div>
</body>
</html>
