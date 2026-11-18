<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tell Me More | Asesor virtual</title>
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="app">
<aside class="sidebar">
 <div class="brand"><div class="brand-mark">✦</div><div><strong>Tell Me More</strong><small>Tu ensayo, tu confianza</small></div></div>
 <div><div class="nav-label">Espacio de trabajo</div><nav class="nav">
  <button class="active" data-page="inicio"><span class="ico">⌂</span><span class="navtext">Inicio</span></button>
  <button data-page="proyecto"><span class="ico">▤</span><span class="navtext">Mi proyecto</span></button>
  <button data-page="practica"><span class="ico">◉</span><span class="navtext">Practicar exposición</span></button>
  <button data-page="simulador"><span class="ico">☷</span><span class="navtext">Simular sinodales</span></button>
  <button data-page="resultados"><span class="ico">▥</span><span class="navtext">Mis resultados</span></button>
 </nav></div>
 <div class="sidebar-note"><b>Un paso a la vez</b>Practicar no significa hacerlo perfecto. Significa descubrir cómo hacerlo mejor.</div>
</aside>
<main class="main">
<header class="topbar"><div class="crumb">Espacio del estudiante / <b id="crumb">Inicio</b></div><div class="user"><span>Mi espacio</span><div class="avatar">A</div></div></header>
<div class="content">
<section class="page active" id="page-inicio">
 <div class="eyebrow">Bienvenido a Tell Me More</div><div class="heading"><div><h1>Prepara tu defensa con confianza.</h1><p>Practica tu presentación, fortalece tus argumentos y prepárate para las preguntas de tus sinodales.</p></div><button class="btn primary" onclick="go('proyecto')">Configurar mi proyecto →</button></div>
 <div class="card welcome"><div><div class="eyebrow" style="color:#d4caff">TU ASESOR VIRTUAL</div><h2 id="welcomeTitle">Tu proyecto merece ser bien explicado.</h2><p id="welcomeDesc">Cuéntanos de qué trata tu proyecto para generar prácticas y preguntas que realmente tengan que ver con tu trabajo.</p><button class="btn" onclick="go('proyecto')">Comenzar configuración <span>→</span></button></div><div class="welcome-art">✧</div></div>
 <div class="section-title"><h2>Tu preparación</h2><span class="muted small">Resumen de actividad</span></div>
 <div class="grid cols3">
  <div class="card stat"><div class="stat-icon">◷</div><div><strong id="statSessions">0</strong><span>Prácticas realizadas</span></div></div>
  <div class="card stat"><div class="stat-icon">✎</div><div><strong id="statWords">0</strong><span>Palabras transcritas</span></div></div>
  <div class="card stat"><div class="stat-icon">◎</div><div><strong id="statQuestions">0</strong><span>Preguntas practicadas</span></div></div>
 </div>
 <div class="section-title"><h2>¿Qué quieres entrenar hoy?</h2></div>
 <div class="grid cols3">
  <div class="card feature"><div class="stat-icon">🎙</div><div><h3>Expresión oral</h3><p>Identifica muletillas, pausas y velocidad al hablar.</p><div class="progress"><i style="width:65%"></i></div></div></div>
  <div class="card feature"><div class="stat-icon">✦</div><div><h3>Argumentación</h3><p>Aprende a justificar decisiones y explicar resultados.</p><div class="progress"><i style="width:40%"></i></div></div></div>
  <div class="card feature"><div class="stat-icon">⚖</div><div><h3>Preguntas de sinodales</h3><p>Enfréntate a preguntas basadas en tu proyecto.</p><div class="progress"><i style="width:25%"></i></div></div></div>
 </div>
 <!-- <p class="footer-note">Prototipo funcional de demostración. La evaluación inteligente se simula localmente; conecta tu API para obtener análisis generados por IA.</p> -->
</section>

<section class="page" id="page-proyecto">
 <div class="eyebrow">Primero, conozcamos tu trabajo</div><div class="heading"><div><h1>Contexto de mi proyecto</h1><p>Mientras mejor conozca tu proyecto el asesor, más útiles y personalizadas serán tus prácticas.</p></div></div>
 <div class="card">
  <div class="form-grid">
   <div class="field"><label>Nombre del estudiante</label><input id="estudiante" placeholder="Tu nombre"></div>
   <div class="field"><label>Carrera / programa académico</label><input id="carrera" placeholder="Ej. Ingeniería en Sistemas"></div>
   <div class="field full"><label>Título del proyecto *</label><input id="titulo" placeholder="Ej. Sistema inteligente de gestión de inventarios"></div>
   <div class="field full"><label>Descripción del proyecto *</label><textarea id="descripcion" placeholder="¿Qué desarrollaste? ¿Cómo funciona? ¿A quién está dirigido?"></textarea></div>
   <div class="field"><label>Problemática que atiende</label><textarea id="problematica" placeholder="¿Qué problema busca resolver?"></textarea></div>
   <div class="field"><label>Objetivo general</label><textarea id="objetivo" placeholder="¿Qué quieres lograr?"></textarea></div>
   <div class="field"><label>Justificación</label><textarea id="justificacion" placeholder="¿Por qué es importante tu proyecto?"></textarea></div>
   <div class="field"><label>Metodología</label><textarea id="metodologia" placeholder="¿Cómo lo desarrollaste?"></textarea></div>
   <div class="field"><label>Tecnologías / herramientas</label><textarea id="tecnologias" placeholder="Ej. PHP, MySQL, JavaScript..."></textarea></div>
   <div class="field"><label>Resultados obtenidos</label><textarea id="resultadosProyecto" placeholder="¿Qué resultados conseguiste?"></textarea></div>
   <div class="field"><label>Tiempo disponible para exponer</label><select id="duracion"><option value="3">3 minutos</option><option value="5" selected>5 minutos</option><option value="10">10 minutos</option><option value="15">15 minutos</option><option value="20">20 minutos</option></select></div>
   <div class="field"><label>¿Qué te preocupa más?</label><select id="preocupacion"><option>Quedarme en blanco</option><option>No saber responder preguntas</option><option>Hablar demasiado rápido</option><option>No justificar mis decisiones</option><option>No terminar a tiempo</option></select></div>
  </div>
  <div class="actions"><button class="btn primary" onclick="saveProject()">Guardar contexto del proyecto →</button></div>
 </div>
</section>

<section class="page" id="page-practica">
 <div class="eyebrow">Entrenamiento de expresión oral</div><div class="heading"><div><h1>Practica tu exposición</h1><p>Expón como si estuvieras frente al comité. El temporizador finalizará automáticamente cuando se agote el tiempo.</p></div><span class="tag" id="speechStatus">LISTO PARA PRACTICAR</span></div>
 <div class="practice-layout">
  <div class="card timer-card">
   <div class="timer-label"><span class="record-dot" id="recDot"></span><span id="timerState">TIEMPO DISPONIBLE</span></div>
   <div class="timer" id="timer">05:00</div>
   <div class="field" style="max-width:190px;margin:0 auto 17px;text-align:left"><label>Duración de la práctica</label><select id="timerSelect" onchange="setDuration()"><option value="3">3 minutos</option><option value="5" selected>5 minutos</option><option value="10">10 minutos</option><option value="15">15 minutos</option></select></div>
   <div style="display:flex;gap:9px;justify-content:center;flex-wrap:wrap"><button class="btn primary" id="startBtn" onclick="startPractice()">● Iniciar práctica</button><button class="btn danger" id="stopBtn" onclick="stopPractice(false)" disabled>■ Finalizar</button></div>
   <p class="hint" id="micHint" style="margin-top:14px">Se solicitará permiso para utilizar tu micrófono.</p>
  </div>
  <div class="card"><h3>Indicadores en vivo</h3><p class="muted small">Se actualizan durante tu exposición.</p>
   <div class="metric-row" style="grid-template-columns:1fr 1fr"><div class="metric"><b id="liveWords">0</b><span>Palabras</span></div><div class="metric"><b id="liveFillers">0</b><span>Muletillas</span></div></div>
   <div class="feedback-item"><b>Consejo de práctica</b><p id="practiceTip">Habla con naturalidad. No intentes memorizar cada palabra: enfócate en comunicar tus ideas.</p></div>
   <div class="feedback-item"><b>Muletillas detectadas</b><p id="fillerList">Aún no hay transcripción.</p></div>
  </div>
 </div>
 <div class="card" style="margin-top:18px"><div class="section-title" style="margin:0 0 12px"><h2>Transcripción de tu exposición</h2><span class="muted small" id="transcriptState">Esperando el inicio...</span></div><div class="transcript" id="transcript">Tu transcripción aparecerá aquí mientras hablas. Si tu navegador no soporta reconocimiento de voz, puedes pegar tu texto para probar el análisis.</div>
  <div class="field" style="margin-top:12px"><label>O pega aquí tu transcripción (modo demostración)</label><textarea id="manualTranscript" placeholder="Pega lo que dijiste durante tu exposición..." rows="3"></textarea></div>
  <div class="actions"><button class="btn secondary" onclick="analyzeManual()">Analizar texto de prueba</button></div>
 </div>
</section>

<section class="page" id="page-simulador">
 <div class="eyebrow">Entrenamiento de argumentación</div><div class="heading"><div><h1>Simulación de sinodales</h1><p>Practica con preguntas relacionadas con tu proyecto. Elige el perfil del sinodal y responde como si estuvieras en tu defensa.</p></div></div>
 <div class="card" style="margin-bottom:18px"><div class="form-grid">
  <div class="field"><label>Tipo de sinodal</label><select id="perfil"><option value="Técnico">Sinodal técnico</option><option value="Metodológico">Sinodal metodológico</option><option value="Crítico">Sinodal crítico</option><option value="General">Sinodal general</option></select></div>
  <div class="field"><label>Nivel de dificultad</label><select id="dificultad"><option>Básico</option><option selected>Intermedio</option><option>Avanzado</option></select></div>
 </div><div class="actions"><button class="btn primary" onclick="generateQuestions()">Generar preguntas personalizadas ✦</button></div></div>
 <div class="grid cols2">
  <div class="card"><div class="section-title" style="margin:0 0 12px"><h2>Pregunta del sinodal</h2><span class="tag" id="qCounter">SIN INICIAR</span></div><div id="questionArea" class="empty">Configura tu proyecto y genera preguntas para comenzar la simulación.</div><div id="answerArea" style="display:none"><div class="field"><label>Tu respuesta</label><textarea id="answer" rows="5" placeholder="Explica tu respuesta con tus propias palabras..."></textarea></div><div class="actions"><button class="btn primary" onclick="evaluateAnswer()">Evaluar mi respuesta</button></div></div></div>
  <div class="card"><h3>Retroalimentación del asesor</h3><div id="answerFeedback" class="empty">Cuando respondas una pregunta, aquí recibirás observaciones para fortalecer tu argumento.</div></div>
 </div>
</section>

<section class="page" id="page-resultados">
 <div class="eyebrow">Tu evolución</div><div class="heading"><div><h1>Resultados de práctica</h1><p>Revisa tus indicadores y descubre qué puedes mejorar para tu siguiente ensayo.</p></div><button class="btn secondary" onclick="go('practica')">Nueva práctica →</button></div>
 <div class="grid cols3">
  <div class="card"><span class="muted small">Palabras por minuto</span><div class="score" id="resPpm">—</div><div class="hint">Ritmo aproximado de exposición</div></div>
  <div class="card"><span class="muted small">Muletillas detectadas</span><div class="score" id="resFillers">—</div><div class="hint">Expresiones repetitivas</div></div>
  <div class="card"><span class="muted small">Duración</span><div class="score" id="resDuration">—</div><div class="hint">Tiempo de exposición</div></div>
 </div>
 <div class="grid cols2" style="margin-top:18px">
  <div class="card"><h3>Diagnóstico de tu exposición</h3><div id="diagnosis"><div class="empty">Aún no has analizado una exposición. Realiza una práctica para obtener resultados.</div></div></div>
  <div class="card"><h3>Tu siguiente objetivo</h3><div id="nextGoal" class="empty">Tus recomendaciones aparecerán aquí después del análisis.</div></div>
 </div>
 <p class="footer-note">Las métricas de voz son aproximaciones. El análisis de este prototipo utiliza reglas locales y no representa una evaluación académica definitiva.</p>
</section>
</div></main></div><div class="toast" id="toast"></div>
<script>

/* ==========================================================
   TELL ME MORE — DEMO LOCAL PARA GITHUB PAGES
   Sin PHP, sin MySQL y sin APIs externas.
   ========================================================== */

const $ = id => document.getElementById(id);

/* =========================
   ESTADO LOCAL
========================= */

let project = JSON.parse(localStorage.getItem('defensaProject') || '{}');

let stats = JSON.parse(
    localStorage.getItem('defensaStats') ||
    '{"sessions":0,"words":0,"questions":0}'
);

let currentMetrics = JSON.parse(
    localStorage.getItem('defensaLast') || 'null'
);

let recognition = null;
let running = false;
let remaining = 300;
let total = 300;
let ticker = null;
let startedAt = 0;
let transcript = '';
let questions = [];
let qIndex = 0;
let currentQuestion = null;

/* =========================
   UTILIDADES
========================= */

function toast(message) {
    const element = $('toast');

    element.textContent = message;
    element.style.display = 'block';

    clearTimeout(element.toastTimeout);

    element.toastTimeout = setTimeout(() => {
        element.style.display = 'none';
    }, 3000);
}

function escapeHTML(value) {
    return String(value ?? '').replace(/[&<>"']/g, char => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    })[char]);
}

function saveLocalData() {
    localStorage.setItem('defensaProject', JSON.stringify(project));
    localStorage.setItem('defensaStats', JSON.stringify(stats));

    if (currentMetrics) {
        localStorage.setItem('defensaLast', JSON.stringify(currentMetrics));
    }
}

/* =========================
   NAVEGACIÓN
========================= */

function go(page) {
    document.querySelectorAll('.page').forEach(element => {
        element.classList.remove('active');
    });

    const selectedPage = $('page-' + page);

    if (!selectedPage) return;

    selectedPage.classList.add('active');

    document.querySelectorAll('.nav button').forEach(button => {
        button.classList.toggle('active', button.dataset.page === page);
    });

    const pageNames = {
        inicio: 'Inicio',
        proyecto: 'Mi proyecto',
        practica: 'Practicar exposición',
        simulador: 'Simular sinodales',
        resultados: 'Mis resultados'
    };

    $('crumb').textContent = pageNames[page] || 'Inicio';

    if (page === 'resultados') renderStats();
    if (page === 'inicio') renderHome();

    window.scrollTo({ top: 0, behavior: 'smooth' });
}

document.querySelectorAll('.nav button').forEach(button => {
    button.addEventListener('click', () => go(button.dataset.page));
});

/* =========================
   PROYECTO
========================= */

function saveProject() {
    project = {
        nombre_estudiante: $('estudiante').value.trim(),
        carrera: $('carrera').value.trim(),
        titulo: $('titulo').value.trim(),
        descripcion: $('descripcion').value.trim(),
        problematica: $('problematica').value.trim(),
        objetivo: $('objetivo').value.trim(),
        justificacion: $('justificacion').value.trim(),
        metodologia: $('metodologia').value.trim(),
        tecnologias: $('tecnologias').value.trim(),
        resultados: $('resultadosProyecto').value.trim(),
        duracion: parseInt($('duracion').value, 10),
        preocupacion: $('preocupacion').value
    };

    if (!project.titulo || !project.descripcion) {
        toast('Completa el título y la descripción de tu proyecto.');
        return;
    }

    saveLocalData();

    renderHome();

    toast('Proyecto guardado en este navegador.');

    go('inicio');
}

function loadProject() {
    if (!project || Object.keys(project).length === 0) return;

    $('estudiante').value = project.nombre_estudiante || '';
    $('carrera').value = project.carrera || '';
    $('titulo').value = project.titulo || '';
    $('descripcion').value = project.descripcion || '';
    $('problematica').value = project.problematica || '';
    $('objetivo').value = project.objetivo || '';
    $('justificacion').value = project.justificacion || '';
    $('metodologia').value = project.metodologia || '';
    $('tecnologias').value = project.tecnologias || '';
    $('resultadosProyecto').value = project.resultados || '';
    $('duracion').value = project.duracion || 5;
    $('preocupacion').value = project.preocupacion || 'Quedarme en blanco';

    renderHome();
}

function renderHome() {
    $('statSessions').textContent = stats.sessions || 0;
    $('statWords').textContent = stats.words || 0;
    $('statQuestions').textContent = stats.questions || 0;

    if (project.titulo) {
        $('welcomeTitle').textContent = project.titulo;
        $('welcomeDesc').textContent =
            'Tu proyecto está configurado. Practica tu exposición o responde preguntas de tus sinodales.';
    }
}

/* =========================
   TEMPORIZADOR
========================= */

function setDuration() {
    if (running) return;

    total = parseInt($('timerSelect').value, 10) * 60;
    remaining = total;

    updateTimer();
}

function updateTimer() {
    const minutes = Math.floor(remaining / 60);
    const seconds = remaining % 60;

    $('timer').textContent =
        String(minutes).padStart(2, '0') + ':' +
        String(seconds).padStart(2, '0');
}

/* =========================
   RECONOCIMIENTO DE VOZ
========================= */

function startPractice() {
    if (running) return;

    transcript = '';

    $('transcript').textContent = '';
    $('manualTranscript').value = '';
    $('liveWords').textContent = '0';
    $('liveFillers').textContent = '0';
    $('fillerList').textContent = 'Escuchando...';

    remaining = parseInt($('timerSelect').value, 10) * 60;
    total = remaining;
    startedAt = Date.now();
    running = true;

    $('startBtn').disabled = true;
    $('stopBtn').disabled = false;
    $('recDot').classList.add('live');
    $('timerState').textContent = 'EXPOSICIÓN EN CURSO';
    $('speechStatus').textContent = 'GRABANDO';
    $('transcriptState').textContent = 'Reconociendo voz...';

    updateTimer();

    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        recognition = new SpeechRecognition();

        recognition.lang = 'es-MX';
        recognition.continuous = true;
        recognition.interimResults = true;

        recognition.onresult = event => {
            let finalText = '';
            let interimText = '';

            for (let i = event.resultIndex; i < event.results.length; i++) {
                const result = event.results[i];

                if (result.isFinal) {
                    finalText += result[0].transcript + ' ';
                } else {
                    interimText += result[0].transcript;
                }
            }

            if (finalText) transcript += finalText;

            $('transcript').textContent = transcript + interimText;

            updateLive(transcript + interimText);
        };

        recognition.onerror = event => {
            console.error('SpeechRecognition:', event.error);

            $('micHint').textContent =
                'No se pudo reconocer la voz. Puedes usar la transcripción manual.';
        };

        recognition.onend = () => {
            if (running && recognition) {
                try {
                    recognition.start();
                } catch (error) {
                    console.warn(error);
                }
            }
        };

        try {
            recognition.start();

            $('micHint').textContent =
                'Micrófono activo. Habla con naturalidad.';
        } catch (error) {
            console.error(error);

            $('micHint').textContent =
                'No se pudo iniciar el micrófono. Usa la transcripción manual.';
        }
    } else {
        $('micHint').textContent =
            'Este navegador no soporta reconocimiento de voz. Puedes pegar tu transcripción.';
    }

    ticker = setInterval(() => {
        if (remaining > 0) {
            remaining--;
            updateTimer();
        } else {
            stopPractice(true);
        }
    }, 1000);
}

function stopPractice(auto = false) {
    if (!running) return;

    running = false;

    clearInterval(ticker);
    ticker = null;

    if (recognition) {
        recognition.onend = null;

        try {
            recognition.stop();
        } catch (error) {
            console.warn(error);
        }

        recognition = null;
    }

    $('startBtn').disabled = false;
    $('stopBtn').disabled = true;
    $('recDot').classList.remove('live');

    $('timerState').textContent =
        auto ? 'TIEMPO AGOTADO' : 'PRÁCTICA FINALIZADA';

    $('speechStatus').textContent = 'PRÁCTICA TERMINADA';
    $('transcriptState').textContent = 'Transcripción finalizada';

    if (auto) {
        toast('Se agotó el tiempo. Tu exposición terminó automáticamente.');
    }

    const elapsedMinutes = Math.max(
        0.01,
        (Date.now() - startedAt) / 60000
    );

    analyzeText(transcript, elapsedMinutes);
}

/* =========================
   ANÁLISIS DE TEXTO
========================= */

const fillers = [
    'este',
    'eh',
    'em',
    'mmm',
    'pues',
    'o sea',
    'digamos',
    '¿no?',
    'verdad'
];

function findFillers(text) {
    const lower = text.toLowerCase();

    return fillers.map(word => {
        const escaped = word.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        const matches = lower.match(new RegExp(escaped, 'g')) || [];

        return {
            word,
            n: matches.length
        };
    }).filter(item => item.n > 0);
}

function countFillers(text) {
    return findFillers(text).reduce((total, item) => total + item.n, 0);
}

function updateLive(text) {
    const words = text.trim()
        ? text.trim().split(/\s+/).length
        : 0;

    const detected = findFillers(text);
    const count = detected.reduce((total, item) => total + item.n, 0);

    $('liveWords').textContent = words;
    $('liveFillers').textContent = count;

    $('fillerList').textContent = count
        ? detected.map(item => `${item.word} (${item.n})`).join(', ')
        : 'No se detectan muletillas frecuentes.';
}

function analyzeManual() {
    const text = $('manualTranscript').value.trim();

    if (!text) {
        toast('Pega primero una transcripción.');
        return;
    }

    const minutes = Math.max(0.1, parseInt($('timerSelect').value, 10));

    analyzeText(text, minutes);
}

function analyzeText(text, minutes) {
    if (!text || !text.trim()) {
        toast('No hay transcripción para analizar.');
        return;
    }

    const words = text.trim().split(/\s+/).length;
    const fillersCount = countFillers(text);
    const ppm = Math.round(words / Math.max(minutes, 0.1));

    currentMetrics = {
        words,
        fillers: fillersCount,
        ppm,
        minutes,
        text
    };

    stats.sessions = (stats.sessions || 0) + 1;
    stats.words = (stats.words || 0) + words;

    saveLocalData();

    renderStats();
    toast('Análisis de exposición listo.');
    go('resultados');
}

/* =========================
   RESULTADOS
========================= */

function renderStats() {
    const metrics = currentMetrics ||
        JSON.parse(localStorage.getItem('defensaLast') || 'null');

    if (!metrics) return;

    $('resPpm').textContent = metrics.ppm;
    $('resFillers').textContent = metrics.fillers;
    $('resDuration').textContent = Number(metrics.minutes).toFixed(1) + ' min';

    const clarity = metrics.words > 80
        ? 'Desarrollaste suficiente contenido para revisar la estructura de tus ideas.'
        : 'Tu exposición fue breve. Intenta ampliar la explicación de tu problemática y resultados.';

    const pace = metrics.ppm > 160
        ? 'Tu ritmo parece acelerado. Prueba hacer pausas al cambiar de idea.'
        : metrics.ppm < 90
            ? 'Tu ritmo parece lento. Practica mantener continuidad sin apresurarte.'
            : 'Tu velocidad está dentro de un rango orientativo cómodo.';

    const fillerFeedback = metrics.fillers > 8
        ? 'Se repiten varias muletillas. Sustitúyelas por pausas conscientes.'
        : 'El uso de muletillas fue moderado. Sigue prestando atención a las expresiones repetitivas.';

    $('diagnosis').innerHTML = `
        <div class="feedback-item">
            <b>Claridad y desarrollo</b>
            <p>${clarity}</p>
        </div>
        <div class="feedback-item">
            <b>Ritmo de habla</b>
            <p>${pace}</p>
        </div>
        <div class="feedback-item">
            <b>Muletillas</b>
            <p>${fillerFeedback}</p>
        </div>
        <div class="feedback-item">
            <b>Argumentación</b>
            <p>Revisa que expliques no solo qué hiciste, sino por qué tomaste cada decisión y qué evidencia respalda tus resultados.</p>
        </div>
    `;

    let recommendation = 'Prepara una explicación más profunda de tu metodología y resultados.';

    if (metrics.fillers > 8) {
        recommendation = 'Realiza una práctica enfocada en reducir muletillas.';
    } else if (metrics.ppm > 160) {
        recommendation = 'Practica una exposición más pausada.';
    }

    $('nextGoal').innerHTML = `
        <div class="tag">RECOMENDACIÓN PRINCIPAL</div>
        <p style="font-size:14px;margin-top:12px">${recommendation}</p>
        <button class="btn secondary" onclick="go('simulador')">Practicar preguntas →</button>
    `;
}

/* =========================
   SIMULADOR LOCAL
========================= */

function generateQuestions() {
    if (!project.titulo || !project.descripcion) {
        toast('Primero registra tu proyecto.');
        go('proyecto');
        return;
    }

    const perfil = $('perfil').value;
    const dificultad = $('dificultad').value;

    const title = project.titulo;
    const description = project.descripcion;
    const problem = project.problematica || 'la problemática planteada';
    const objective = project.objetivo || 'el objetivo de tu proyecto';
    const methodology = project.metodologia || 'la metodología utilizada';
    const technologies = project.tecnologias || 'las herramientas utilizadas';
    const results = project.resultados || 'los resultados obtenidos';
    const justification = project.justificacion || 'la importancia del proyecto';

    let pool = [];

    if (perfil === 'Técnico') {
        pool = [
            {
                pregunta: `¿Por qué elegiste ${technologies} para desarrollar "${title}"?`,
                objetivo: 'Evaluar las decisiones técnicas y el conocimiento de las herramientas.',
                tema: 'Tecnologías'
            },
            {
                pregunta: '¿Qué limitaciones técnicas encontraste durante el desarrollo y cómo las resolviste?',
                objetivo: 'Evaluar la resolución de problemas técnicos.',
                tema: 'Desarrollo'
            },
            {
                pregunta: '¿Cómo comprobarías que tu sistema funciona correctamente ante distintos escenarios?',
                objetivo: 'Evaluar pruebas y validación.',
                tema: 'Pruebas'
            },
            {
                pregunta: 'Si tuvieras que escalar el proyecto para más usuarios, ¿qué modificarías?',
                objetivo: 'Evaluar escalabilidad y arquitectura.',
                tema: 'Arquitectura'
            },
            {
                pregunta: '¿Qué parte de tu desarrollo consideras más compleja y por qué?',
                objetivo: 'Evaluar dominio técnico.',
                tema: 'Implementación'
            }
        ];
    } else if (perfil === 'Metodológico') {
        pool = [
            {
                pregunta: `¿Cómo definiste ${methodology} y por qué es adecuada para este proyecto?`,
                objetivo: 'Evaluar la coherencia metodológica.',
                tema: 'Metodología'
            },
            {
                pregunta: '¿Cómo identificaste y delimitaste la problemática que buscabas resolver?',
                objetivo: 'Evaluar la definición del problema.',
                tema: 'Investigación'
            },
            {
                pregunta: '¿Qué criterios utilizaste para determinar si se cumplió el objetivo?',
                objetivo: 'Evaluar la relación entre objetivos y resultados.',
                tema: 'Evaluación'
            },
            {
                pregunta: '¿Qué otras metodologías consideraste y por qué descartaste las demás?',
                objetivo: 'Evaluar justificación metodológica.',
                tema: 'Decisiones'
            },
            {
                pregunta: '¿Qué cambiarías en el procedimiento si tuvieras más tiempo para realizarlo?',
                objetivo: 'Evaluar reflexión crítica.',
                tema: 'Mejora'
            }
        ];
    } else if (perfil === 'Crítico') {
        pool = [
            {
                pregunta: `¿Qué evidencia tienes de que "${title}" realmente resuelve ${problem}?`,
                objetivo: 'Evaluar evidencia y validez.',
                tema: 'Impacto'
            },
            {
                pregunta: '¿Cuál es la principal debilidad de tu proyecto y cómo la defenderías?',
                objetivo: 'Evaluar autocrítica y argumentación.',
                tema: 'Limitaciones'
            },
            {
                pregunta: '¿Qué sucedería si tu solución no se comportara como esperas en un escenario real?',
                objetivo: 'Evaluar riesgos.',
                tema: 'Escenarios'
            },
            {
                pregunta: '¿Por qué tu propuesta es mejor que una alternativa más sencilla?',
                objetivo: 'Evaluar pertinencia y comparación.',
                tema: 'Alternativas'
            },
            {
                pregunta: '¿Qué afirmación de tu proyecto sería más difícil de demostrar?',
                objetivo: 'Evaluar rigor.',
                tema: 'Validación'
            }
        ];
    } else {
        pool = [
            {
                pregunta: `¿Puedes explicar de manera breve en qué consiste "${title}"?`,
                objetivo: 'Evaluar claridad y síntesis.',
                tema: 'Introducción'
            },
            {
                pregunta: `¿Qué te motivó a desarrollar este proyecto y por qué es importante?`,
                objetivo: 'Evaluar contexto y justificación.',
                tema: 'Motivación'
            },
            {
                pregunta: '¿Cuál fue el principal reto durante el desarrollo?',
                objetivo: 'Evaluar experiencia y resolución de problemas.',
                tema: 'Retos'
            },
            {
                pregunta: `¿Qué resultados obtuviste y qué significan?`,
                objetivo: 'Evaluar comprensión de resultados.',
                tema: 'Resultados'
            },
            {
                pregunta: '¿Qué aprendiste y qué mejorarías si continuaras con el proyecto?',
                objetivo: 'Evaluar reflexión.',
                tema: 'Conclusiones'
            }
]   ;
    }

    // La dificultad modifica la complejidad de las preguntas.
    if (dificultad === 'Avanzado') {
        pool = pool.map(q => ({
            ...q,
            pregunta: q.pregunta + ' Fundamenta tu respuesta considerando limitaciones, evidencia y posibles alternativas.'
        }));
    } else if (dificultad === 'Básico') {
        pool = pool.map(q => ({
            ...q,
            pregunta: q.pregunta.replace(/¿/g, '¿Podrías explicar: ¿').replace(/\?$/, '?')
        }));
    }

    // Agregamos un contexto de proyecto para preguntas generales.
    if (perfil === 'General' && description) {
        pool.push({
            pregunta: `Considerando que tu proyecto consiste en ${description}, ¿qué beneficio concreto ofrece a sus usuarios?`,
            objetivo: 'Evaluar el beneficio y la utilidad del proyecto.',
            tema: 'Propuesta de valor'
        });
    }

    questions = pool.sort(() => Math.random() - 0.5).slice(0, 5);
    qIndex = 0;
    currentQuestion = null;

    $('answerArea').style.display = 'none';
    $('qCounter').textContent = 'SIMULACIÓN';
    $('answerFeedback').innerHTML = `
        <div class="empty">
            Simulación local lista. Las preguntas se construyeron
            usando el contexto que registraste.
        </div>
    `;

    showQuestion();

    toast('Preguntas de demostración generadas.');
}

/* =========================
   MOSTRAR PREGUNTA
========================= */

function showQuestion() {
    const question = questions[qIndex];

    if (!question) return;

    currentQuestion = question;

    $('qCounter').textContent = `PREGUNTA ${qIndex + 1} / ${questions.length}`;

    $('questionArea').innerHTML = `
        <span class="tag">
            SINODAL ${escapeHTML($('perfil').value.toUpperCase())}
        </span>

        <div class="question">
            ${escapeHTML(question.pregunta)}
        </div>

        <div class="feedback-item">
            <b>¿Qué busca evaluar?</b>
            <p>${escapeHTML(question.objetivo || 'Comprensión del proyecto')}</p>
        </div>

        <div class="feedback-item">
            <b>Tema</b>
            <p>${escapeHTML(question.tema || 'Defensa académica')}</p>
        </div>

        <p class="muted small">
            Organiza tus ideas y responde como si estuvieras frente a tus sinodales.
        </p>
    `;

    $('answerArea').style.display = 'block';
    $('answer').value = '';
    $('answer').focus();
}

/* =========================
   EVALUACIÓN SIMULADA
========================= */

function evaluateAnswer() {
    const answer = $('answer').value.trim();

    if (answer.length < 10) {
        toast('Desarrolla un poco más tu respuesta.');
        return;
    }

    if (!currentQuestion) {
        toast('Genera primero las preguntas.');
        return;
    }

    const words = answer.split(/\s+/).length;
    const hasReasoning = /\bporque\b|\bdebido\b|\bya que\b|\bpor lo tanto\b|\bconsiderando\b/i.test(answer);
    const hasEvidence = /\bresultado\b|\bprueba\b|\bdato\b|\bevidencia\b|\bmedición\b|\bse comprobó\b/i.test(answer);
    const hasContext = answer.length > 100;

    let score = 45;

    if (words >= 20) score += 10;
    if (words >= 40) score += 10;
    if (hasReasoning) score += 15;
    if (hasEvidence) score += 10;
    if (hasContext) score += 10;

    score = Math.min(100, score);

    const strengths = [];
    const improvements = [];

    if (words >= 30) {
        strengths.push('Desarrollaste tu respuesta con suficiente contenido.');
    } else {
        improvements.push('Amplía tu explicación para que el sinodal comprenda mejor tu idea.');
    }

    if (hasReasoning) {
        strengths.push('Incluiste una justificación o explicación de tus decisiones.');
    } else {
        improvements.push('Explica por qué tomaste esa decisión, no solo qué hiciste.');
    }

    if (hasEvidence) {
        strengths.push('Mencionaste resultados, pruebas o evidencia.');
    } else {
        improvements.push('Incluye algún resultado, dato o evidencia que respalde tu argumento');
    }

    if (hasContext) {
        strengths.push('Tu respuesta contiene información que puede relacionarse con el contexto del proyecto.');
    }

    const suggestedAnswer =
        `Una respuesta más sólida podría comenzar explicando ${currentQuestion.tema.toLowerCase()}, ` +
        `después justificar tu decisión con el contexto de "${project.titulo}" y finalmente ` +
        `mencionar evidencia, resultados o una limitación que hayas identificado.`;

    const followUps = [
        '¿Qué evidencia concreta podrías presentar para respaldar esa afirmación?',
        '¿Qué alternativa consideraste antes de tomar esa decisión?',
        '¿Cómo comprobarías que esa solución funciona correctamente?',
        '¿Qué limitación reconoces en esa respuesta?',
        '¿Qué cambiarías si tuvieras que realizar el proyecto nuevamente?'
    ];

    const followUp = followUps[Math.floor(Math.random() * followUps.length)];

    const feedbackHTML = `
        <div class="score">${score}/100</div>

        <span class="tag">EVALUACIÓN SIMULADA</span>

        <div class="feedback-item">
            <b>Fortalezas</b>
            <ul>${strengths.map(item => `<li>${escapeHTML(item)}</li>`).join('')}</ul>
        </div>

        <div class="feedback-item">
            <b>Oportunidades de mejora</b>
            <ul>${improvements.map(item => `<li>${escapeHTML(item)}</li>`).join('')}</ul>
        </div>

        <div class="feedback-item">
            <b>Ejemplo de respuesta mejorada</b>
            <p>${escapeHTML(suggestedAnswer)}</p>
        </div>

        <div class="feedback-item">
            <b>Pregunta de seguimiento</b>
            <p>${escapeHTML(followUp)}</p>
        </div>
    `;

    $('answerFeedback').innerHTML = feedbackHTML;

    if (qIndex < questions.length - 1) {
        $('answerFeedback').innerHTML += `
            <div class="actions">
                <button class="btn primary" onclick="nextQuestion()">
                    Siguiente pregunta →
                </button>
            </div>
        `;
    } else {
        $('answerFeedback').innerHTML += `
            <div class="pill">Simulación completada</div>
            <div class="actions">
                <button class="btn secondary" onclick="generateQuestions()">
                    Nueva simulación
        </button>
            </div>
        `;
    }

    stats.questions = (stats.questions || 0) + 1;

    saveLocalData();
    renderHome();

    toast('Evaluación de demostración completada.');
}

/* =========================
   SIGUIENTE PREGUNTA
========================= */

function nextQuestion() {
    if (qIndex < questions.length - 1) {
        qIndex++;
        showQuestion();

        $('answerFeedback').innerHTML = `
            <div class="empty">
                Responde la pregunta y recibe retroalimentación simulada.
            </div>
        `;
    }
}

/* =========================
   INICIALIZACIÓN
========================= */

document.addEventListener('DOMContentLoaded', () => {
    loadProject();
    renderHome();
    renderStats();
    setDuration();
});

/* =========================================================
   Tell Me More - JAVASCRIPT
   Conserva el HTML y CSS originales.
   ========================================================= */

/* -------------------------
   VARIABLES GENERALES
------------------------- */

// const $ = id => document.getElementById(id);

// let proyectoId = localStorage.getItem('defensaProyectoId') || null;
// let simulacionId = null;

// let project = JSON.parse(localStorage.getItem('defensaProject') || '{}');

// let stats = JSON.parse(
//     localStorage.getItem('defensaStats') ||
//     '{"sessions":0,"words":0,"questions":0}'
// );

// let recognition = null;
// let running = false;
// let remaining = 300;
// let total = 300;
// let ticker = null;
// let startedAt = 0;
// let transcript = '';
// let questions = [];
// let qIndex = 0;
// let currentMetrics = null;

// const fillers = [
//     'este',
//     'eh',
//     'em',
//     'mmm',
//     'pues',
//     'o sea',
//     'digamos',
//     '¿no?',
//     'verdad'
// ];


// /* -------------------------
//    FUNCIONES GENERALES
// ------------------------- */

// function toast(message) {
//     const element = $('toast');

//     if (!element) {
//         alert(message);
//         return;
//     }

//     element.textContent = message;
//     element.style.display = 'block';

//     clearTimeout(element.toastTimeout);

//     element.toastTimeout = setTimeout(() => {
//         element.style.display = 'none';
//     }, 3000);
// }


// function escapeHTML(value) {
//     return String(value ?? '').replace(/[&<>"']/g, char => ({
//         '&': '&amp;',
//         '<': '&lt;',
//         '>': '&gt;',
//         '"': '&quot;',
//         "'": '&#039;'
//     })[char]);
// }


// /*
//  * Esta función centraliza las peticiones a PHP.
//  * También permite mostrar errores cuando PHP devuelve
//  * HTML, advertencias o respuestas que no son JSON.
//  */
// async function apiRequest(url, options = {}) {

//     const response = await fetch(url, {
//         ...options,
//         headers: {
//             ...(options.headers || {})
//         }
//     });

//     const responseText = await response.text();

//     let data;

//     try {
//         data = JSON.parse(responseText);
//     } catch (error) {
//         console.error('Respuesta no válida del servidor:', responseText);

//         throw new Error(
//             'El servidor no devolvió JSON válido. Revisa los errores de PHP.'
//         );
//     }

//     if (!response.ok) {
//         throw new Error(
//             data.message || `Error del servidor (${response.status}).`
//         );
//     }

//     if (data.success === false) {
//         throw new Error(data.message || 'La operación no pudo completarse.');
//     }

//     return data;
// }


// /* -------------------------
//    NAVEGACIÓN
// ------------------------- */

// function go(page) {

//     document.querySelectorAll('.page').forEach(element => {
//         element.classList.remove('active');
//     });

//     const selectedPage = $('page-' + page);

//     if (!selectedPage) {
//         console.error('Página no encontrada:', page);
//         return;
//     }

//     selectedPage.classList.add('active');

//     document.querySelectorAll('.nav button').forEach(button => {
//         button.classList.toggle(
//             'active',
//             button.dataset.page === page
//         );
//     });

//     const pageNames = {
//         inicio: 'Inicio',
//         proyecto: 'Mi proyecto',
//         practica: 'Practicar exposición',
//         simulador: 'Simular sinodales',
//         resultados: 'Mis resultados'
//     };

//     $('crumb').textContent = pageNames[page] || 'Inicio';

//     if (page === 'resultados') {
//         renderStats();
//     }

//     if (page === 'inicio') {
//         renderHome();
//     }

//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth'
//     });
// }


// document.querySelectorAll('.nav button').forEach(button => {
//     button.addEventListener('click', () => {
//         go(button.dataset.page);
//     });
// });


// /* -------------------------
//    PROYECTO
// ------------------------- */

// async function saveProject() {

//     const proyecto = {

//         id_proyecto: proyectoId,

//         nombre_estudiante: $('estudiante').value.trim(),
//         carrera: $('carrera').value.trim(),

//         titulo: $('titulo').value.trim(),
//         descripcion: $('descripcion').value.trim(),

//         problematica: $('problematica').value.trim(),
//         objetivo: $('objetivo').value.trim(),
//         justificacion: $('justificacion').value.trim(),
//         metodologia: $('metodologia').value.trim(),

//         tecnologias: $('tecnologias').value.trim(),
//         resultados: $('resultadosProyecto').value.trim(),

//         duracion: parseInt($('duracion').value, 10),
//         preocupacion: $('preocupacion').value
//     };


//     if (!proyecto.titulo || !proyecto.descripcion) {
//         toast('Completa el título y la descripción del proyecto.');
//         return;
//     }


//     const boton = document.querySelector(
//         '#page-proyecto .actions button'
//     );

//     if (boton) {
//         boton.disabled = true;
//         boton.textContent = 'Guardando...';
//     }


//     try {

//         const data = await apiRequest('api/guardar_proyecto.php', {

//             method: 'POST',

//             headers: {
//                 'Content-Type': 'application/json'
//             },

//             body: JSON.stringify(proyecto)

//         });


//         if (!data.id_proyecto) {
//             throw new Error('El servidor no devolvió el ID del proyecto.');
//         }


//         proyectoId = data.id_proyecto;

//         project = proyecto;

//         localStorage.setItem(
//             'defensaProyectoId',
//             proyectoId
//         );

//         localStorage.setItem(
//             'defensaProject',
//             JSON.stringify(project)
//         );


//         toast('Proyecto guardado correctamente.');

//         renderHome();

//         go('inicio');


//     } catch (error) {

//         console.error('Error al guardar proyecto:', error);

//         toast(error.message);

//     } finally {

//         if (boton) {
//             boton.disabled = false;
//             boton.innerHTML = 'Guardar contexto del proyecto →';
//         }

//     }

// }


// async function loadProject() {

//     if (!proyectoId) {
//         return;
//     }


//     try {

//         const data = await apiRequest(
//             `api/obtener_proyecto.php?id=${encodeURIComponent(proyectoId)}`
//         );


//         if (!data.proyecto) {
//             throw new Error('No se encontró el proyecto.');
//         }


//         const p = data.proyecto;


//         $('estudiante').value = p.nombre_estudiante || '';
//         $('carrera').value = p.carrera || '';

//         $('titulo').value = p.titulo || '';
//         $('descripcion').value = p.descripcion || '';

//         $('problematica').value = p.problematica || '';
//         $('objetivo').value = p.objetivo || '';
//         $('justificacion').value = p.justificacion || '';
//         $('metodologia').value = p.metodologia || '';

//         $('tecnologias').value = p.tecnologias || '';
//         $('resultadosProyecto').value = p.resultados || '';

//         $('duracion').value = p.duracion || 5;
//         $('preocupacion').value = p.preocupacion || 'Quedarme en blanco';


//         project = p;

//         localStorage.setItem(
//             'defensaProject',
//             JSON.stringify(project)
//         );


//         renderHome();

//     } catch (error) {

//         console.error('Error al recuperar proyecto:', error);

//         toast('No se pudo recuperar el proyecto: ' + error.message);

//     }

// }


// function renderHome() {

//     $('statSessions').textContent = stats.sessions || 0;
//     $('statWords').textContent = stats.words || 0;
//     $('statQuestions').textContent = stats.questions || 0;


//     if (project && project.titulo) {

//         $('welcomeTitle').textContent = project.titulo;

//         $('welcomeDesc').textContent =
//             'Tu asesor ya tiene el contexto de tu proyecto. Practica tu exposición o responde preguntas personalizadas.';

//     }

// }


// /* -------------------------
//    TEMPORIZADOR
// ------------------------- */

// function setDuration() {

//     if (running) {
//         return;
//     }

//     total = parseInt($('timerSelect').value, 10) * 60;

//     remaining = total;

//     updateTimer();

// }


// function updateTimer() {

//     const minutes = Math.floor(remaining / 60);
//     const seconds = remaining % 60;

//     $('timer').textContent =
//         String(minutes).padStart(2, '0') +
//         ':' +
//         String(seconds).padStart(2, '0');

// }


// /* -------------------------
//    RECONOCIMIENTO DE VOZ
// ------------------------- */

// function startPractice() {

//     if (running) {
//         return;
//     }


//     transcript = '';

//     $('transcript').textContent = '';

//     $('manualTranscript').value = '';

//     $('liveWords').textContent = '0';

//     $('liveFillers').textContent = '0';

//     $('fillerList').textContent = 'Escuchando...';


//     remaining = parseInt($('timerSelect').value, 10) * 60;

//     total = remaining;

//     startedAt = Date.now();

//     running = true;


//     $('startBtn').disabled = true;

//     $('stopBtn').disabled = false;

//     $('recDot').classList.add('live');

//     $('timerState').textContent = 'EXPOSICIÓN EN CURSO';

//     $('speechStatus').textContent = 'GRABANDO';

//     $('transcriptState').textContent = 'Reconociendo voz...';


//     updateTimer();


//     const SpeechRecognition =
//         window.SpeechRecognition ||
//         window.webkitSpeechRecognition;


//     if (SpeechRecognition) {

//         recognition = new SpeechRecognition();

//         recognition.lang = 'es-MX';

//         recognition.continuous = true;

//         recognition.interimResults = true;


//         recognition.onresult = function (event) {

//             let finalText = '';
//             let interimText = '';


//             for (
//                 let i = event.resultIndex;
//                 i < event.results.length;
//                 i++
//             ) {

//                 const result = event.results[i];

//                 if (result.isFinal) {

//                     finalText += result[0].transcript + ' ';

//                 } else {

//                     interimText += result[0].transcript;

//                 }

//             }


//             if (finalText) {
//                 transcript += finalText;
//             }


//             $('transcript').textContent =
//                 transcript + interimText;


//             updateLive(transcript + interimText);

//         };


//         recognition.onerror = function (event) {

//             console.error('Error de reconocimiento:', event.error);

//             $('micHint').textContent =
//                 'No se pudo reconocer la voz (' +
//                 event.error +
//                 '). Puedes pegar tu transcripción manualmente.';

//         };


//         recognition.onend = function () {

//             if (running && recognition) {

//                 try {
//                     recognition.start();
//                 } catch (error) {
//                     console.warn('No se pudo reiniciar el reconocimiento:', error);
//                 }

//             }

//         };


//         try {

//             recognition.start();

//             $('micHint').textContent =
//                 'Micrófono activo. Habla con naturalidad.';

//         } catch (error) {

//             console.error(error);

//             $('micHint').textContent =
//                 'No se pudo iniciar el reconocimiento. Usa la transcripción manual.';

//         }

//     } else {

//         $('micHint').textContent =
//             'Tu navegador no soporta reconocimiento de voz. Puedes pegar tu transcripción manualmente.';

//     }


//     ticker = setInterval(function () {

//         if (remaining > 0) {

//             remaining--;

//             updateTimer();

//         } else {

//             stopPractice(true);

//         }

//     }, 1000);

// }


// function stopPractice(auto = false) {

//     if (!running) {
//         return;
//     }


//     running = false;

//     clearInterval(ticker);

//     ticker = null;


//     if (recognition) {

//         recognition.onend = null;

//         try {
//             recognition.stop();
//         } catch (error) {
//             console.warn(error);
//         }

//         recognition = null;

//     }


//     $('startBtn').disabled = false;

//     $('stopBtn').disabled = true;

//     $('recDot').classList.remove('live');


//     $('timerState').textContent =
//         auto ? 'TIEMPO AGOTADO' : 'PRÁCTICA FINALIZADA';

//     $('speechStatus').textContent = 'PRÁCTICA TERMINADA';

//     $('transcriptState').textContent = 'Transcripción finalizada';


//     if (auto) {
//         toast('Se agotó el tiempo. Tu exposición terminó automáticamente.');
//     }


//     const minutes = Math.max(
//         0.01,
//         (Date.now() - startedAt) / 60000
//     );


//     analyzeText(transcript, minutes);

// }


// /* -------------------------
//    ANÁLISIS DE TRANSCRIPCIÓN
// ------------------------- */

// function updateLive(text) {

//     const words = text.trim()
//         ? text.trim().split(/\s+/).length
//         : 0;

//     const count = countFillers(text);

//     $('liveWords').textContent = words;

//     $('liveFillers').textContent = count;


//     $('fillerList').textContent = count
//         ? count + ' expresiones detectadas: ' + findFillers(text).join(', ')
//         : 'No se detectan muletillas frecuentes.';

// }


// function countFillers(text) {

//     return findFillers(text).reduce((total, item) => {
//         return total + item.n;
//     }, 0);

// }


// function findFillers(text) {

//     const lower = text.toLowerCase();

//     return fillers
//         .map(word => {

//             const escaped = word.replace(
//                 /[.*+?^${}()|[\]\\]/g,
//                 '\\$&'
//             );

//             const matches = lower.match(
//                 new RegExp(escaped, 'g')
//             ) || [];

//             return {
//                 word: word,
//                 n: matches.length
//             };

//         })
//         .filter(item => item.n > 0)
//         .map(item => item.word + ' (' + item.n + ')');

// }


// function analyzeManual() {

//     const text = $('manualTranscript').value.trim();

//     if (!text) {
//         toast('Pega primero una transcripción.');
//         return;
//     }


//     const minutes = parseInt($('timerSelect').value, 10);

//     analyzeText(text, minutes);

// }


// function analyzeText(text, minutes) {

//     if (!text || !text.trim()) {

//         toast('No hay transcripción para analizar.');

//         return;

//     }


//     const words = text.trim().split(/\s+/).length;

//     const fillersCount = countFillers(text);

//     const ppm = Math.round(words / Math.max(minutes, 0.1));

//     const pauses = Math.max(
//         0,
//         Math.round(text.split(/[.!?]/).length * 0.35)
//     );


//     currentMetrics = {

//         words: words,

//         fillers: fillersCount,

//         ppm: ppm,

//         minutes: minutes,

//         pauses: pauses,

//         text: text

//     };


//     stats.sessions = (stats.sessions || 0) + 1;

//     stats.words = (stats.words || 0) + words;


//     localStorage.setItem(
//         'defensaStats',
//         JSON.stringify(stats)
//     );

//     localStorage.setItem(
//         'defensaLast',
//         JSON.stringify(currentMetrics)
//     );


//     renderStats();

//     toast('Análisis de exposición listo.');

//     go('resultados');

// }


// /* -------------------------
//    RESULTADOS
// ------------------------- */

// function renderStats() {

//     let metrics = currentMetrics;


//     if (!metrics) {

//         try {

//             metrics = JSON.parse(
//                 localStorage.getItem('defensaLast') || 'null'
//             );

//         } catch (error) {

//             metrics = null;

//         }

//     }


//     if (!metrics) {
//         return;
//     }


//     $('resPpm').textContent = metrics.ppm;

//     $('resFillers').textContent = metrics.fillers;

//     $('resDuration').textContent =
//         Number(metrics.minutes).toFixed(1) + ' min';


//     const clarity = metrics.words > 80

//         ? 'Desarrollaste suficiente contenido para revisar la estructura de tus ideas.'

//         : 'Tu exposición fue breve. Intenta ampliar la explicación de tu problemática y tus resultados.';


//     const pace = metrics.ppm > 160

//         ? 'Tu ritmo parece acelerado. Prueba hacer pausas al cambiar de idea.'

//         : metrics.ppm < 90

//             ? 'Tu ritmo parece lento. Practica mantener continuidad sin apresurarte.'

//             : 'Tu velocidad está dentro de un rango orientativo cómodo.';


//     const fillerFeedback = metrics.fillers > 8

//         ? 'Se repiten varias muletillas. Sustitúyelas por pausas conscientes.'

//         : 'El uso de muletillas fue moderado. Sigue prestando atención a las expresiones repetitivas.';


//     $('diagnosis').innerHTML = `

//         <div class="feedback-item">
//             <b>Claridad y desarrollo</b>
//             <p>${clarity}</p>
//         </div>

//         <div class="feedback-item">
//             <b>Ritmo de habla</b>
//             <p>${pace}</p>
//         </div>

//         <div class="feedback-item">
//             <b>Muletillas</b>
//             <p>${fillerFeedback}</p>
//         </div>

//         <div class="feedback-item">
//             <b>Argumentación</b>
//             <p>
//                 Revisa que expliques no solo qué hiciste,
//                 sino por qué tomaste cada decisión y qué
//                 evidencia respalda tus resultados.
//             </p>
//         </div>

//     `;


//     let recommendation = 'Prepara una explicación más profunda de tu metodología y resultados.';

//     if (metrics.fillers > 8) {

//         recommendation = 'Realiza una práctica enfocada en reducir muletillas.';

//     } else if (metrics.ppm > 160) {

//         recommendation = 'Practica una exposición más pausada.';

//     }


//     $('nextGoal').innerHTML = `

//         <div class="tag">RECOMENDACIÓN PRINCIPAL</div>

//         <p style="font-size:14px;margin-top:12px">
//             ${recommendation}
//         </p>

//         <button class="btn secondary" onclick="go('simulador')">
//             Practicar preguntas →
//         </button>

//     `;

// }


// /* -------------------------
//    GENERAR PREGUNTAS
// ------------------------- */

// async function generateQuestions() {

//     if (!proyectoId) {

//         toast('Primero registra tu proyecto.');

//         go('proyecto');

//         return;

//     }


//     const perfil = $('perfil').value;

//     const dificultad = $('dificultad').value;


//     const boton = document.querySelector(
//         '#page-simulador .actions button'
//     );

//     if (boton) {
//         boton.disabled = true;
//         boton.textContent = 'Generando preguntas...';
//     }


//     $('questionArea').innerHTML = `

//         <div class="empty">

//             <div class="score">✦</div>

//             <p>El sinodal está analizando tu proyecto...</p>

//             <p class="muted small">
//                 Estamos preparando preguntas personalizadas.
//             </p>

//         </div>

//     `;


//     $('answerArea').style.display = 'none';

//     $('answerFeedback').innerHTML = `
//         <div class="empty">Preparando la simulación...</div>
//     `;


//     try {

//         const data = await apiRequest(
//             'api/generar_preguntas.php',
//             {

//                 method: 'POST',

//                 headers: {
//                     'Content-Type': 'application/json'
//                 },

//                 body: JSON.stringify({

//                     id_proyecto: proyectoId,

//                     perfil: perfil,

//                     dificultad: dificultad

//                 })

//             }
//         );


//         if (!data.id_simulacion) {
//             throw new Error('No se recibió el ID de la simulación.');
//         }

//         if (!Array.isArray(data.preguntas) || data.preguntas.length === 0) {
//             throw new Error('La IA no devolvió preguntas.');
//         }


//         simulacionId = data.id_simulacion;

//         questions = data.preguntas;

//         qIndex = 0;


//         $('answerFeedback').innerHTML = `

//             <div class="empty">
//                 Tu sinodal está listo.
//                 Responde con tus propias palabras.
//             </div>

//         `;


//         showQuestion();

//         toast('Preguntas generadas correctamente.');


//     } catch (error) {

//         console.error('Error al generar preguntas:', error);


//         $('questionArea').innerHTML = `

//             <div class="empty">

//                 No se pudieron generar las preguntas.

//                 <p>${escapeHTML(error.message)}</p>

//                 <button class="btn secondary" onclick="generateQuestions()">
//                     Intentar nuevamente
//                 </button>

//             </div>

//         `;

//     } finally {

//         if (boton) {
//             boton.disabled = false;
//             boton.textContent = 'Generar preguntas personalizadas ✦';
//         }

//     }

// }


// /* -------------------------
//    MOSTRAR PREGUNTA
// ------------------------- */

// function showQuestion() {

//     const question = questions[qIndex];


//     if (!question) {

//         $('questionArea').innerHTML = `
//             <div class="empty">
//                 No hay más preguntas disponibles.
//             </div>
//         `;

//         $('answerArea').style.display = 'none';

//         $('qCounter').textContent = 'FINALIZADO';

//         return;

//     }


//     $('qCounter').textContent =
//         `PREGUNTA ${qIndex + 1}`;


//     $('questionArea').innerHTML = `

//         <span class="tag">
//             SINODAL ${escapeHTML($('perfil').value.toUpperCase())}
//         </span>

//         <div class="question">
//             ${escapeHTML(question.pregunta)}
//         </div>

//         <div class="feedback-item">

//             <b>¿Qué busca evaluar?</b>

//             <p>
//                 ${escapeHTML(
//                     question.objetivo || 'Comprensión del proyecto'
//                 )}
//             </p>

//         </div>

//         <div class="feedback-item">

//             <b>Tema</b>

//             <p>
//                 ${escapeHTML(
//                     question.tema || 'Defensa académica'
//                 )}
//             </p>

//         </div>

//         <p class="muted small">
//             Organiza tus ideas y responde como si estuvieras
//             frente a tus sinodales.
//         </p>

//     `;


//     $('answerArea').style.display = 'block';

//     $('answer').value = '';

//     $('answer').focus();

// }


// /* -------------------------
//    EVALUAR RESPUESTA
// ------------------------- */

// async function evaluateAnswer() {

//     const respuesta = $('answer').value.trim();


//     if (respuesta.length < 10) {

//         toast('Desarrolla un poco más tu respuesta.');

//         return;

//     }


//     if (!simulacionId) {

//         toast('Primero inicia una simulación.');

//         return;

//     }


//     const numero = qIndex;


//     const boton = document.querySelector(
//         '#answerArea .actions button'
//     );


//     if (boton) {
//         boton.disabled = true;
//         boton.textContent = 'Evaluando...';
//     }


//     $('answerFeedback').innerHTML = `

//         <div class="empty">

//             <div class="score">✦</div>

//             <p>Gemini está evaluando tu respuesta...</p>

//             <p class="muted small">
//                 Analizando claridad, pertinencia y argumentación.
//             </p>

//         </div>

//     `;


//     try {

//         const data = await apiRequest(
//             'api/evaluar_respuesta.php',
//             {

//                 method: 'POST',

//                 headers: {
//                     'Content-Type': 'application/json'
//                 },

//                 body: JSON.stringify({

//                     id_simulacion: simulacionId,

//                     numero_pregunta: numero,

//                     respuesta: respuesta

//                 })

//             }
//         );


//         const evaluation = data.evaluacion;


//         if (!evaluation) {
//             throw new Error('No se recibió la evaluación de Gemini.');
//         }


//         const strengths = Array.isArray(evaluation.fortalezas)
//             ? evaluation.fortalezas
//             : [];

//         const improvements = Array.isArray(evaluation.mejoras)
//             ? evaluation.mejoras
//             : [];


//         const listHTML = items => {

//             if (items.length === 0) {
//                 return '<li>No se proporcionaron observaciones.</li>';
//             }

//             return items.map(item => {
//                 return `<li>${escapeHTML(item)}</li>`;
//             }).join('');

//         };


//         const score = Number(evaluation.puntaje) || 0;

//         const followUp = String(
//             evaluation.pregunta_seguimiento || ''
//         ).trim();


//         let html = `

//             <div class="score">
//                 ${score}/100
//             </div>

//             <span class="tag">
//                 EVALUACIÓN DEL SINODAL
//             </span>

//             <div class="feedback-item">

//                 <b>Fortalezas</b>

//                 <ul>
//                     ${listHTML(strengths)}
//                 </ul>

//             </div>

//             <div class="feedback-item">

//                 <b>Oportunidades de mejora</b>

//                 <ul>
//                     ${listHTML(improvements)}
//                 </ul>

//             </div>

//             <div class="feedback-item">

//                 <b>Ejemplo de respuesta mejorada</b>

//                 <p>
//                     ${escapeHTML(
//                         evaluation.respuesta_sugerida ||
//                         'No se generó una respuesta sugerida.'
//                     )}
//                 </p>

//             </div>

//         `;


//         /*
//          * Las preguntas de seguimiento se agregan
//          * después de las preguntas originales.
//          *
//          * Se permite un seguimiento por cada pregunta
//          * original, hasta un máximo de 10 preguntas.
//          */

//         if (followUp && numero < 5 && questions.length < 10) {

//             html += `

//                 <div class="feedback-item">

//                     <b>Pregunta de seguimiento</b>

//                     <p>${escapeHTML(followUp)}</p>

//                 </div>

//             `;


//             questions.push({

//                 pregunta: followUp,

//                 objetivo: 'Profundizar en tu respuesta anterior',

//                 tema: 'Pregunta de seguimiento'

//             });

//         }


//         $('answerFeedback').innerHTML = html;


//         if (qIndex < questions.length - 1) {

//             $('answerFeedback').innerHTML += `

//                 <div class="actions">

//                     <button class="btn primary"
//                         onclick="nextQuestion()">

//                         Siguiente pregunta →

//                     </button>

//                 </div>

//             `;

//         } else {

//             $('answerFeedback').innerHTML += `

//                 <div class="pill">
//                     Simulación completada
//                 </div>

//             `;

//         }


//         stats.questions = (stats.questions || 0) + 1;


//         localStorage.setItem(
//             'defensaStats',
//             JSON.stringify(stats)
//         );


//         renderHome();


//     } catch (error) {

//         console.error('Error al evaluar respuesta:', error);


//         $('answerFeedback').innerHTML = `

//             <div class="empty">

//                 No se pudo evaluar la respuesta.

//                 <p>${escapeHTML(error.message)}</p>

//                 <button class="btn secondary"
//                     onclick="evaluateAnswer()">

//                     Intentar nuevamente

//                 </button>

//             </div>

//         `;

//     } finally {

//         if (boton) {
//             boton.disabled = false;
//             boton.textContent = 'Evaluar mi respuesta';
//         }

//     }

// }


// /* -------------------------
//    SIGUIENTE PREGUNTA
// ------------------------- */

// function nextQuestion() {

//     if (qIndex < questions.length - 1) {

//         qIndex++;

//         showQuestion();

//     } else {

//         $('answerArea').style.display = 'none';

//         $('qCounter').textContent = 'FINALIZADO';

//         $('questionArea').innerHTML = `

//             <div class="empty">

//                 <div class="score">✓</div>

//                 <h3>¡Simulación completada!</h3>

//                 <p>
//                     Has terminado las preguntas de esta sesión.
//                     Sigue practicando para fortalecer tu defensa.
//                 </p>

//             </div>

//         `;

//     }

// }


// /* -------------------------
//    INICIALIZACIÓN
// ------------------------- */

// document.addEventListener('DOMContentLoaded', function () {

//     try {

//         loadProject();

//         renderHome();

//         renderStats();

//         setDuration();

//     } catch (error) {

//         console.error('Error al iniciar Tell Me More:', error);

//         toast('Ocurrió un error al iniciar la aplicación.');

//     }

// });

// </script>

</body></html>