<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Coordinador Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4f6ff] min-h-screen p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-xl font-bold mb-6">Bienvenido, Coordinador</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Crear Programas -->
      <a href="/view/programaFormacion" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-blue-500 text-white text-2xl p-3 rounded-full shadow-md">📚</div>
        <span class="text-base font-medium">Crear Programas</span>
      </a>

      <!-- Crear Ambientes -->
      <a href="/ambientes/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-purple-600 text-white text-2xl p-3 rounded-full shadow-md">🏢</div>
        <span class="text-base font-medium">Crear Ambientes</span>
      </a>

      <!-- Crear Fichas -->
      <a href="/fichas/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-green-500 text-white text-2xl p-3 rounded-full shadow-md">📝</div>
        <span class="text-base font-medium">Crear Fichas</span>
      </a>

      <!-- Crear Instructores -->
      <a href="/instructores/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-yellow-400 text-white text-2xl p-3 rounded-full shadow-md">👨‍🏫</div>
        <span class="text-base font-medium">Crear Instructores</span>
      </a>

      <!-- Crear Aprendices -->
      <a href="/aprendices/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-red-500 text-white text-2xl p-3 rounded-full shadow-md">👥</div>
        <span class="text-base font-medium">Crear Aprendices</span>
      </a>

      <!-- Crear Clases -->
      <a href="/clases/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-blue-300 text-white text-2xl p-3 rounded-full shadow-md">📅</div>
        <span class="text-base font-medium">Crear Clases</span>
      </a>
    </div>
  </div>
</body>
</html>
