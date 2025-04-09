<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Instructor Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4f6ff] min-h-screen p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-xl font-bold mb-6">Bienvenido, Instructor</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Tarjeta Tomar Lista -->
      <a href="/asistencias/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-purple-600 text-white text-2xl p-3 rounded-full shadow-md">📋</div>
        <span class="text-base font-medium">Tomar Lista</span>
      </a>

      <!-- Tarjeta Ver Reportes -->
      <a href="/reportes" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-blue-500 text-white text-2xl p-3 rounded-full shadow-md">📊</div>
        <span class="text-base font-medium">Ver Reportes</span>
      </a>

      <!-- Tarjeta Crear Aprendices -->
      <a href="/aprendices/new" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-green-500 text-white text-2xl p-3 rounded-full shadow-md">👥</div>
        <span class="text-base font-medium">Crear Aprendices</span>
      </a>
    </div>
  </div>
</body>
</html>
