<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/tomar_lista.css">
    <title>Tomar Lista</title>
</head>

<body>
    <header>
        <h1>Tomar Lista</h1>
        <a href="">Cerrar Sesion</a>
    </header>
    <div class="container">
        <div class="fichas">
            <div class="label-ficha">
                <label for="ficha">Fichas:</label>
            </div>
            <select name="ficha" id="ficha">
                <option value="2873707">2873707</option>
                <option value="2873711">2873711</option>
            </select>
        </div>

        <div class="lista">
            <div class="grupo">
                <h1>ADSO: 2873707</h1>
                <button type="button">Todos Asistieron</button>
            </div>

            <!-- <div class="aprendiz">
                <h3>Andres Felipe Rivera</h3>
            </div>

            <div class="aprendiz">
                <h3>Daniel Salazar Loaiza</h3>
            </div>

            <div class="aprendiz">
                <h3>Miguel Angel Jaramillo Garzón</h3>
            </div> -->

            <div class="aprendiz">
                <h3>Daniel Salazar Loaiza</h3>
                <div class="radio">
                    <input type="radio" name="asistio" id="asistio">
                    <ul>
                        asistio
                    </ul>
                </div>
                <div class="radio">
                    <input type="radio" name="excusa" id="excusa">
                    <ul>
                        excusa
                    </ul>
                </div>
                <div class="radio">
                    <input type="radio" name="falta" id="falta">
                    <ul>
                        falta
                    </ul>
                </div>
                <div class="horas-falta">
                    <h3>Horas de Falta:</h3>
                    <h2>10</h2>
                </div>
            </div>
            <div class="aprendiz">
                <h3>Miguel Angel Jaramillo Garzón</h3>
                <div class="radio">
                    <input type="radio" name="asistio" id="asistio">
                    <ul>
                        asistio
                    </ul>
                </div>
                <div class="radio">
                    <input type="radio" name="excusa" id="excusa">
                    <ul>
                        excusa
                    </ul>
                </div>
                <div class="radio">
                    <input type="radio" name="falta" id="falta">
                    <ul>
                        falta
                    </ul>
                </div>
                <div class="horas-falta">
                    <h3>Horas de Falta:</h3>
                    <h2>15</h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>