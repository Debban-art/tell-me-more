
/*
 * DEFENSA AI
 * Grabación, reconocimiento de voz y detección de pausas.
 */

// ========================================
// 1. VARIABLES
// ========================================
let tiempoLimiteSegundos = 0;
let tiempoRestante = 0;

const SpeechRecognition =
    window.SpeechRecognition ||
    window.webkitSpeechRecognition;

let reconocimiento = null;

let reconociendo = false;
let exposicionActiva = false;

let transcripcionFinal = "";
let transcripcionActual = "";

let tiempoInicio = 0;
let duracionGrabacion = 0;
let intervaloCronometro = null;

// Grabación de respaldo
let streamAudio = null;
let mediaRecorder = null;
let fragmentosAudio = [];
let audioUrl = null;

// Detector de pausas
let contextoAudio = null;
let analizadorAudio = null;
let frameAnalisis = null;

let inicioSilencio = null;
let yaHablo = false;
let pausasDetectadas = 0;

const UMBRAL_SILENCIO = 0.015;
const DURACION_PAUSA = 1500;


// ========================================
// 2. ELEMENTOS HTML
// ========================================

const btnIniciar = document.getElementById("btnIniciar");
const btnDetener = document.getElementById("btnDetener");

const cronometro = document.getElementById("cronometro");

const estadoGrabacion =
    document.getElementById("estadoGrabacion");

const mensaje = document.getElementById("mensaje");

const transcripcionEnVivo =
    document.getElementById("transcripcionEnVivo");


// ========================================
// 3. VERIFICAR COMPATIBILIDAD
// ========================================

function verificarCompatibilidad() {

    if (!SpeechRecognition) {

        btnIniciar.disabled = true;

        mensaje.textContent =
            "Tu navegador no soporta Web Speech API. " +
            "Prueba con Google Chrome o Microsoft Edge actualizado.";

        return false;
    }

    if (!navigator.mediaDevices ||
        !navigator.mediaDevices.getUserMedia) {

        btnIniciar.disabled = true;

        mensaje.textContent =
            "No se puede acceder al micrófono. " +
            "Abre el proyecto desde localhost.";

        return false;
    }

    if (!window.MediaRecorder) {

        btnIniciar.disabled = true;

        mensaje.textContent =
            "Tu navegador no permite grabar audio.";

        return false;
    }

    return true;
}


// ========================================
// 4. CONFIGURAR RECONOCIMIENTO
// ========================================

function configurarReconocimiento() {

    reconocimiento = new SpeechRecognition();

    reconocimiento.lang = "es-MX";

    reconocimiento.continuous = true;

    reconocimiento.interimResults = true;

    reconocimiento.maxAlternatives = 1;


    // Cuando comienza el reconocimiento
    reconocimiento.onstart = function() {

        reconociendo = true;

        estadoGrabacion.textContent =
            "Reconociendo voz...";
    };


    // Cuando recibe resultados
    reconocimiento.onresult = function(evento) {

        let textoFinal = "";
        let textoTemporal = "";

        for (
            let i = 0;
            i < evento.results.length;
            i++
        ) {

            const resultado = evento.results[i];

            const texto = resultado[0].transcript;

            if (resultado.isFinal) {

                textoFinal += texto + " ";

            } else {

                textoTemporal += texto;
            }
        }

        transcripcionFinal = textoFinal.trim();

        transcripcionActual = (
            textoFinal + textoTemporal
        ).trim();

        // Mostrar texto en tiempo real
        transcripcionEnVivo.textContent =
            transcripcionActual ||
            "Escuchando...";

    };


    // Manejo de errores
    reconocimiento.onerror = function(evento) {

        console.error(
            "Error de reconocimiento:",
            evento.error
        );

        if (
            evento.error === "not-allowed" ||
            evento.error === "service-not-allowed" ||
            evento.error === "audio-capture"
        ) {

            exposicionActiva = false;

            detenerGrabacionFisica();

            mensaje.textContent =
                "No se pudo utilizar el micrófono o el servicio de reconocimiento.";

            estadoGrabacion.textContent =
                "Reconocimiento detenido.";
        }

        if (evento.error === "network") {

            mensaje.textContent =
                "Problema de conexión durante el reconocimiento.";
        }

        if (evento.error === "no-speech") {

            mensaje.textContent =
                "No se detectó voz. Puedes continuar hablando.";
        }
    };


    // El navegador puede detener el reconocimiento.
    // Si la exposición sigue activa, intentamos reiniciarlo.
    reconocimiento.onend = function() {

        reconociendo = false;

        if (exposicionActiva) {

            try {

                reconocimiento.start();

            } catch (error) {

                console.warn(
                    "No se pudo reiniciar el reconocimiento:",
                    error
                );
            }

        } else {

            finalizarAnalisis();
        }
    };
}


// ========================================
// 5. INICIAR EXPOSICIÓN
// ========================================

// async function iniciarGrabacion() {

//     if (exposicionActiva) {
//         return;
//     }

//     try {

//         mensaje.textContent =
//             "Solicitando permiso para utilizar el micrófono...";

//         // Obtener micrófono
//         streamAudio =
//             await navigator.mediaDevices.getUserMedia({
//                 audio: true
//             });

//         // Reiniciar variables
//         transcripcionFinal = "";
//         transcripcionActual = "";

//         fragmentosAudio = [];

//         pausasDetectadas = 0;
//         inicioSilencio = null;
//         yaHablo = false;

//         duracionGrabacion = 0;

//         transcripcionEnVivo.textContent =
//             "Escuchando...";

//         // Crear reconocimiento nuevo
//         configurarReconocimiento();

//         // Iniciar grabación de respaldo
//         iniciarGrabacionFisica();

//         // Iniciar detector de pausas
//         iniciarDetectorPausas(streamAudio);

//         // Iniciar cronómetro
//         tiempoInicio = Date.now();

//         exposicionActiva = true;

//         iniciarCronometro();

//         // Iniciar reconocimiento de voz
//         reconocimiento.start();

//         btnIniciar.disabled = true;
//         btnDetener.disabled = false;

//         estadoGrabacion.textContent =
//             "Exposición en curso.";

//         mensaje.textContent =
//             "Puedes comenzar a hablar.";

//     } catch (error) {

//         console.error(error);

//         exposicionActiva = false;

//         detenerGrabacionFisica();

//         detenerDetectorPausas();

//         liberarMicrofono();

//         btnIniciar.disabled = false;
//         btnDetener.disabled = true;

//         mensaje.textContent =
//             "No fue posible iniciar la grabación: " +
//             error.message;
//     }
// }


async function iniciarGrabacion() {

    if (exposicionActiva) {
        return;
    }

    // Obtener tiempo guardado al registrar el proyecto
    // const tiempoMinutos = Number(
    //     localStorage.getItem("tiempo_exposicion")
    // );
    const tiempoMinutos = 5;

    if (
        !Number.isFinite(tiempoMinutos) ||
        tiempoMinutos <= 0
    ) {

        mensaje.textContent =
            "No se encontró un tiempo válido de exposición. " +
            "Regresa al formulario del proyecto.";

        return;
    }

    tiempoLimiteSegundos = tiempoMinutos * 60;

    tiempoRestante = tiempoLimiteSegundos;

    cronometro.textContent =
        formatearTiempo(tiempoRestante);

    try {

        mensaje.textContent =
            "Solicitando permiso para utilizar el micrófono...";

        streamAudio =
            await navigator.mediaDevices.getUserMedia({
                audio: true
            });

        transcripcionFinal = "";
        transcripcionActual = "";

        fragmentosAudio = [];

        pausasDetectadas = 0;
        inicioSilencio = null;
        yaHablo = false;

        duracionGrabacion = 0;

        transcripcionEnVivo.textContent =
            "Escuchando...";

        configurarReconocimiento();

        iniciarGrabacionFisica();

        iniciarDetectorPausas(streamAudio);

        tiempoInicio = Date.now();

        exposicionActiva = true;

        iniciarCronometro();

        reconocimiento.start();

        btnIniciar.disabled = true;
        btnDetener.disabled = false;

        estadoGrabacion.textContent =
            "Exposición en curso.";

        mensaje.textContent =
            "¡Comienza tu exposición!";

    } catch (error) {

        console.error(error);

        exposicionActiva = false;

        detenerGrabacionFisica();

        detenerDetectorPausas();

        liberarMicrofono();

        btnIniciar.disabled = false;
        btnDetener.disabled = true;

        mensaje.textContent =
            "No fue posible iniciar la grabación: " +
            error.message;
    }
}



// ========================================
// 6. MEDIA RECORDER
// ========================================

function iniciarGrabacionFisica() {

    fragmentosAudio = [];

    const formatos = [
        "audio/webm;codecs=opus",
        "audio/webm",
        "audio/ogg;codecs=opus",
        "audio/ogg"
    ];

    let formato = "";

    for (const tipo of formatos) {

        if (MediaRecorder.isTypeSupported(tipo)) {

            formato = tipo;
            break;
        }
    }

    mediaRecorder = formato
        ? new MediaRecorder(streamAudio, {
            mimeType: formato
        })
        : new MediaRecorder(streamAudio);


    mediaRecorder.ondataavailable = function(evento) {

        if (evento.data && evento.data.size > 0) {

            fragmentosAudio.push(evento.data);
        }
    };


    mediaRecorder.onstop = function() {

        const tipoAudio = mediaRecorder.mimeType ||
            "audio/webm";

        const audio = new Blob(fragmentosAudio, {
            type: tipoAudio
        });

        if (audioUrl) {

            URL.revokeObjectURL(audioUrl);
        }

        audioUrl = URL.createObjectURL(audio);

        document.getElementById(
            "audioGrabado"
        ).src = audioUrl;

        const enlace = document.getElementById(
            "descargarAudio"
        );

        enlace.href = audioUrl;

        enlace.download = tipoAudio.includes("ogg")
            ? "exposicion.ogg"
            : "exposicion.webm";

        document.getElementById(
            "seccionAudio"
        ).hidden = false;

        liberarMicrofono();
    };

    mediaRecorder.start();
}


// ========================================
// 7. DETECTOR DE PAUSAS
// ========================================

function iniciarDetectorPausas(stream) {

    contextoAudio = new AudioContext();

    const fuente =
        contextoAudio.createMediaStreamSource(stream);

    analizadorAudio = contextoAudio.createAnalyser();

    analizadorAudio.fftSize = 2048;

    fuente.connect(analizadorAudio);

    const datos = new Uint8Array(
        analizadorAudio.fftSize
    );


    function analizarNivel() {

        if (!analizadorAudio) {
            return;
        }

        analizadorAudio.getByteTimeDomainData(datos);

        let suma = 0;

        for (let i = 0; i < datos.length; i++) {

            const muestra =
                (datos[i] - 128) / 128;

            suma += muestra * muestra;
        }

        const rms = Math.sqrt(
            suma / datos.length
        );

        const ahora = Date.now();

        if (rms >= UMBRAL_SILENCIO) {

            // Detectamos que volvió a hablar
            if (
                inicioSilencio !== null &&
                ahora - inicioSilencio >= DURACION_PAUSA
            ) {

                pausasDetectadas++;
            }

            inicioSilencio = null;

            yaHablo = true;

        } else if (
            yaHablo &&
            inicioSilencio === null
        ) {

            inicioSilencio = ahora;
        }

        frameAnalisis = requestAnimationFrame(
            analizarNivel
        );
    }

    analizarNivel();
}


function detenerDetectorPausas() {

    // No contamos el silencio final de la exposición
    // como una pausa entre frases.

    if (frameAnalisis !== null) {

        cancelAnimationFrame(frameAnalisis);

        frameAnalisis = null;
    }

    analizadorAudio = null;

    if (contextoAudio) {

        contextoAudio.close();

        contextoAudio = null;
    }
}


// ========================================
// 8. CRONÓMETRO
// ========================================

// function iniciarCronometro() {

//     clearInterval(intervaloCronometro);

//     intervaloCronometro = setInterval(function() {

//         const segundos = Math.floor(
//             (Date.now() - tiempoInicio) / 1000
//         );

//         cronometro.textContent =
//             formatearTiempo(segundos);

//     }, 500);
// }


// function detenerCronometro() {

//     clearInterval(intervaloCronometro);

//     cronometro.textContent =
//         formatearTiempo(duracionGrabacion);
// }

function iniciarCronometro() {

    clearInterval(intervaloCronometro);

    // Mostrar el tiempo inicial
    cronometro.textContent =
        formatearTiempo(tiempoLimiteSegundos);

    intervaloCronometro = setInterval(function() {

        const tiempoTranscurrido = Math.floor(
            (Date.now() - tiempoInicio) / 1000
        );

        tiempoRestante = Math.max(
            0,
            tiempoLimiteSegundos - tiempoTranscurrido
        );

        cronometro.textContent =
            formatearTiempo(tiempoRestante);

        // El tiempo se terminó
        if (tiempoRestante <= 0) {

            detenerGrabacion(true);
        }

    }, 250);
}


function detenerCronometro() {

    clearInterval(intervaloCronometro);

    intervaloCronometro = null;
}



// ========================================
// 9. DETENER EXPOSICIÓN
// ========================================

// function detenerGrabacion() {

//     if (!exposicionActiva) {
//         return;
//     }

//     exposicionActiva = false;

//     duracionGrabacion = Math.round(
//         (Date.now() - tiempoInicio) / 1000
//     );

//     detenerCronometro();

//     detenerDetectorPausas();

//     btnDetener.disabled = true;

//     btnIniciar.disabled = true;

//     estadoGrabacion.textContent =
//         "Finalizando exposición...";

//     mensaje.textContent =
//         "Procesando resultados...";

//     // Detener grabación de respaldo
//     detenerGrabacionFisica();

//     // Detener reconocimiento.
//     // onend ejecutará finalizarAnalisis().
//     if (reconocimiento && reconociendo) {

//         reconocimiento.stop();

//     } else {

//         finalizarAnalisis();
//     }
// }

function detenerGrabacion(porTiempo = false) {

    if (!exposicionActiva) {
        return;
    }

    exposicionActiva = false;

    // Calcular duración real de la exposición
    duracionGrabacion = Math.min(
        tiempoLimiteSegundos,
        Math.round((Date.now() - tiempoInicio) / 1000)
    );

    detenerCronometro();

    detenerDetectorPausas();

    btnDetener.disabled = true;
    btnIniciar.disabled = true;

    if (porTiempo) {

        cronometro.textContent = "00:00";

        mensaje.textContent =
            "¡Se terminó tu tiempo de exposición! " +
            "Estamos procesando tus resultados.";

    } else {

        mensaje.textContent =
            "Exposición finalizada. Procesando resultados.";
    }

    estadoGrabacion.textContent =
        "Finalizando exposición...";

    // Detener grabación de respaldo
    detenerGrabacionFisica();

    // Detener reconocimiento de voz
    if (reconocimiento && reconociendo) {

        reconocimiento.stop();

    } else {

        finalizarAnalisis();
    }
}


// ========================================
// 10. DETENER MEDIA RECORDER
// ========================================

function detenerGrabacionFisica() {

    if (
        mediaRecorder &&
        mediaRecorder.state === "recording"
    ) {

        mediaRecorder.stop();

    } else {

        liberarMicrofono();
    }
}


function liberarMicrofono() {

    if (streamAudio) {

        streamAudio.getTracks().forEach(
            function(track) {
                track.stop();
            }
        );

        streamAudio = null;
    }
}


// ========================================
// 11. FINALIZAR ANÁLISIS
// ========================================

let analisisFinalizado = false;

function finalizarAnalisis() {

    if (analisisFinalizado) {
        return;
    }

    analisisFinalizado = true;

    const texto = transcripcionFinal.trim();

    if (!texto) {

        estadoGrabacion.textContent =
            "No se obtuvo una transcripción.";

        mensaje.textContent =
            "Intenta nuevamente y verifica que el micrófono funcione.";

        btnIniciar.disabled = false;

        btnDetener.disabled = true;

        return;
    }

    // Calcular métricas
    const resultado = analizarTranscripcion(
        texto,
        duracionGrabacion,
        pausasDetectadas
    );

    // Mostrar resultados
    mostrarResultados(resultado);

    // Guardar temporalmente
    sessionStorage.setItem(
        "resultado_exposicion",
        JSON.stringify(resultado)
    );

    // Enviar datos al frontend para su integración
    window.dispatchEvent(
        new CustomEvent(
            "defensa:transcripcionLista",
            {
                detail: resultado
            }
        )
    );

    estadoGrabacion.textContent =
        "Exposición finalizada.";

    mensaje.textContent =
        "Tu análisis está listo.";

    btnIniciar.disabled = false;

    btnDetener.disabled = true;
}


// ========================================
// 12. EVENTOS
// ========================================

btnIniciar.addEventListener(
    "click",
    function() {

        if (!verificarCompatibilidad()) {
            return;
        }

        analisisFinalizado = false;

        iniciarGrabacion();
    }
);


btnDetener.addEventListener(
    "click",
    detenerGrabacion
);


// ========================================
// 13. INICIALIZACIÓN
// ========================================

if (!verificarCompatibilidad()) {

    estadoGrabacion.textContent =
        "Navegador no compatible.";

} else {

    estadoGrabacion.textContent =
        "Listo para iniciar.";

}


async function guardarSesion(resultado) {

    const idProyecto = localStorage.getItem("id_proyecto");

    if (!idProyecto) {

        console.warn(
            "No se encontró el ID del proyecto."
        );

        return;
    }

    const datos = {
        id_proyecto: Number(idProyecto),
        duracion: resultado.duracion,
        transcripcion: resultado.transcripcion,
        cantidad_palabras: resultado.cantidad_palabras,
        cantidad_muletillas: resultado.cantidad_muletillas,
        cantidad_pausas: resultado.cantidad_pausas,
        palabras_por_minuto: resultado.palabras_por_minuto,
        retroalimentacion: ""
    };

    try {

        const respuesta = await fetch(
            "api/guardar_sesion.php",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(datos)
            }
        );

        const respuestaJSON = await respuesta.json();

        if (!respuesta.ok || !respuestaJSON.success) {

            throw new Error(
                respuestaJSON.message ||
                "No fue posible guardar la sesión."
            );
        }

        console.log(
            "Sesión guardada correctamente:",
            respuestaJSON
        );

        sessionStorage.setItem(
            "id_sesion",
            respuestaJSON.data.id_sesion
        );

        mensaje.textContent =
            "Exposición analizada y guardada correctamente.";

    } catch (error) {

        console.error("Error al guardar:", error);

        mensaje.textContent =
            "El análisis terminó, pero no se pudo guardar la sesión.";
    }
}
