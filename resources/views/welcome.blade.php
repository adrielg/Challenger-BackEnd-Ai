<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafío MercadoLibre - API REST</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
<div class="max-w-4xl mx-auto p-8">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-yellow-500">🚀 Desafío MercadoLibre</h1>
        <p class="text-lg text-gray-600 mt-2">Implementación en Laravel - Bienvenido</p>
    </div>

    <!-- Repositorio -->
    <div class="bg-white shadow-md rounded-2xl p-6 mb-8 text-center">
        <h2 class="text-2xl font-semibold mb-4">📂 Código fuente</h2>
        <p class="text-gray-600 mb-4">El proyecto completo se encuentra disponible en GitHub:</p>
        <a href="https://github.com/adrielg/Challenger-BackEnd-Ai.git" target="_blank"
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
            👉 Descargar desde GitHub
        </a>
    </div>

    <!-- Configuración -->
    <div class="bg-white shadow-md rounded-2xl p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">⚙️ Configuración inicial</h2>
        <ul class="list-disc list-inside space-y-2">
            <li>Instalar dependencias con: <strong><code>composer install</code></strong>.</li>
            <li>Levantar el servidor con: <strong><code>php artisan serve</code></strong>.</li>
            <li>Posibilidad de ejecutar Test con: <strong><code>php artisan test</code></strong>.</li>
        </ul>
    </div>

    <!-- Rutas -->
    <div class="bg-white shadow-md rounded-2xl p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">📡 Endpoints disponibles</h2>
        <p class="mb-4 text-gray-600">Ejemplos usando <code>curl</code>:</p>
        <ul class="space-y-4">
            <li>
                <span class="font-mono bg-gray-100 px-2 py-1 rounded">GET /api/products</span>
                <p class="text-gray-600">Lista todos los productos.</p>
                <pre class="bg-gray-50 p-2 rounded text-sm">curl http://127.0.0.1:8000/api/products</pre>
            </li>
            <li>
                <span class="font-mono bg-gray-100 px-2 py-1 rounded">GET /api/products/{id}</span>
                <p class="text-gray-600">Obtiene un producto por ID.</p>
                <pre class="bg-gray-50 p-2 rounded text-sm">curl http://127.0.0.1:8000/api/products/1</pre>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="text-center text-gray-500 text-sm mt-10">
        <p>Desarrollado por <span class="font-semibold">Adriel Castelucci</span> para el desafío técnico de MercadoLibre.</p>
    </div>
</div>
</body>
</html>
