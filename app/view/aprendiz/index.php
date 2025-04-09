<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Vista Aprendiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4f6ff] min-h-screen p-6">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-xl font-bold mb-6">Bienvenido, (NOMBRE) - (FICHA)</h1>

    <!-- Selector de fecha -->
    <div class="flex justify-end mb-4">
      <input type="date" class="border rounded px-3 py-2 text-sm shadow-sm" />
    </div>

    <!-- Sección Asistencias -->
    <div class="mb-6">
      <h2 class="text-lg font-semibold mb-2">Asistencias</h2>
      <p class="text-sm text-gray-600 mb-2">(NOMBRE - FICHA)</p>

      <!-- Acordeones -->
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (ASISTIÓ/NO ASISTIÓ)</summary>
      </details>
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (ASISTIÓ/NO ASISTIÓ)</summary>
      </details>
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (ASISTIÓ/NO ASISTIÓ)</summary>
      </details>
    </div>

    <!-- Sección Reportes -->
    <div>
      <h2 class="text-lg font-semibold mb-2">Reportes</h2>
      <p class="text-sm text-gray-600 mb-2">(NOMBRE - FICHA)</p>

      <!-- Acordeones -->
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (OBSERVACIÓN)</summary>
      </details>
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (OBSERVACIÓN)</summary>
      </details>
      <details class="bg-white rounded shadow mb-2">
        <summary class="cursor-pointer px-4 py-2 font-medium">(FECHA) - (OBSERVACIÓN)</summary>
      </details>
    </div>
  </div>
</body>
</html>
