
/*
 * DEFENSA AI
 * Análisis de exposición oral.
 */

// Analizar la transcripción
function analizarTranscripcion(
    transcripcion,
    duracionSegundos,
    cantidadPausas
) {

    // Normalizar texto
    const texto = transcripcion
        .toLowerCase()
        .replace(/\s+/g, " ")
        .trim();

    // Contar palabras
    const palabras = texto.match(
        /[\p{L}\p{N}]+(?:['’][\p{L}\p{N}]+)*/gu
    ) || [];

    const cantidadPalabras = palabras.length;

    // Muletillas a detectar
    const muletillas = [
        "eh",
        "mmm",
        "este",
        "o sea",
        "pues",
        "digamos",
        "básicamente",
        "bueno"
    ];

    let cantidadMuletillas = 0;
    const detalleMuletillas = {};

    muletillas.forEach(function(muletilla) {

        const escapada = muletilla.replace(
            /[.*+?^${}()|[\]\\]/g,
            "\\$&"
        );

        const expresion = new RegExp(
            "(^|[^\\p{L}\\p{N}])" +
            escapada +
            "(?=$|[^\\p{L}\\p{N}])",
            "giu"
        );

        const coincidencias = texto.match(expresion);

        const cantidad = coincidencias
            ? coincidencias.length
            : 0;

        detalleMuletillas[muletilla] = cantidad;

        cantidadMuletillas += cantidad;

    });

    // Calcular palabras por minuto
    const minutos = duracionSegundos / 60;

    const palabrasPorMinuto = minutos > 0
        ? cantidadPalabras / minutos
        : 0;

    return {

        transcripcion: transcripcion,

        cantidad_palabras: cantidadPalabras,

        cantidad_muletillas: cantidadMuletillas,

        detalle_muletillas: detalleMuletillas,

        palabras_por_minuto: Number(
            palabrasPorMinuto.toFixed(2)
        ),

        cantidad_pausas: cantidadPausas,

        duracion: duracionSegundos

    };
}


// Mostrar resultados
function mostrarResultados(resultado) {

    document.getElementById(
        "duracionResultado"
    ).textContent = formatearTiempo(resultado.duracion);

    document.getElementById(
        "palabrasResultado"
    ).textContent = resultado.cantidad_palabras;

    document.getElementById(
        "muletillasResultado"
    ).textContent = resultado.cantidad_muletillas;

    document.getElementById(
        "ppmResultado"
    ).textContent = resultado.palabras_por_minuto;

    document.getElementById(
        "pausasResultado"
    ).textContent = resultado.cantidad_pausas;

    document.getElementById(
        "transcripcionResultado"
    ).textContent = resultado.transcripcion;

    // Mostrar detalle de muletillas
    const lista = document.getElementById(
        "detalleMuletillas"
    );

    lista.replaceChildren();

    Object.entries(resultado.detalle_muletillas)
        .forEach(function([nombre, cantidad]) {

            if (cantidad > 0) {

                const elemento = document.createElement("li");

                elemento.textContent =
                    nombre + ": " + cantidad;

                lista.appendChild(elemento);
            }
        });

    document.getElementById(
        "seccionResultados"
    ).hidden = false;
}


// Formatear tiempo MM:SS
function formatearTiempo(segundos) {

    const minutos = Math.floor(segundos / 60);

    const restantes = segundos % 60;

    return String(minutos).padStart(2, "0") +
        ":" +
        String(restantes).padStart(2, "0");
}
