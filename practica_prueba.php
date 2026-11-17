
<?php
// practica.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPEECH AI - Práctica</title>
</head>
<body>

    <main class="container">

        <h1>Practica tu exposición</h1>

        <p>
            Permite el acceso al micrófono e inicia tu exposición.
            Al terminar podrás consultar tu transcripción y métricas.
        </p>

        <!-- Estado -->
        <p id="estadoGrabacion" role="status">
            Estado: esperando
        </p>

        <!-- Cronómetro -->
        <!-- <h2 id="cronometro">00:00</h2> -->
         <section>
            <h2>Tiempo restante de exposición</h2>

            <h1 id="cronometro">00:00</h1>

            <p id="estadoGrabacion">
                Listo para iniciar
            </p>
        </section>

        <!-- Controles -->
        <button type="button" id="btnIniciar">
            Iniciar exposición
        </button>

        <button type="button" id="btnDetener" disabled>
            Finalizar exposición
        </button>

        <p id="mensaje" role="status"></p>

        <!-- Transcripción en tiempo real -->
        <section>
            <h2>Transcripción en tiempo real</h2>

            <div
                id="transcripcionEnVivo"
                aria-live="polite"
                style="min-height:100px; border:1px solid #ccc; padding:12px;"
            >
                Aquí aparecerá lo que vas diciendo...
            </div>
        </section>

        <!-- Audio grabado -->
        <section id="seccionAudio" hidden>
            <h2>Grabación de respaldo</h2>

            <audio id="audioGrabado" controls></audio>

            <br>

            <a
                id="descargarAudio"
                href="#"
                download="exposicion.webm"
            >
                Descargar grabación
            </a>
        </section>

        <!-- Resultados -->
        <section id="seccionResultados" hidden>

            <h2>Resultados de tu exposición</h2>

            <p>
                Duración:
                <strong id="duracionResultado">00:00</strong>
            </p>

            <p>
                Palabras:
                <strong id="palabrasResultado">0</strong>
            </p>

            <p>
                Muletillas:
                <strong id="muletillasResultado">0</strong>
            </p>

            <p>
                Palabras por minuto:
                <strong id="ppmResultado">0</strong>
            </p>

            <p>
                Pausas:
                <strong id="pausasResultado">0</strong>
            </p>

            <h3>Transcripción final</h3>

            <div
                id="transcripcionResultado"
                style="white-space:pre-wrap;"
            ></div>

            <h3>Detalle de muletillas</h3>

            <ul id="detalleMuletillas"></ul>

        </section>

    </main>

    <script src="assets/js/analisis.js"></script>
    <script src="assets/js/grabacion.js"></script>

</body>
</html>
