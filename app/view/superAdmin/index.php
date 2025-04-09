<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Super Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4f6ff] min-h-screen p-6">
  <div class="container mx-auto">
    <h1 class="text-xl font-bold mb-6">Bienvenido, Super admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Tarjeta Regional -->
      <div class="bg-white shadow-md rounded-lg p-4 relative hover:shadow-lg transition">
        <span class="absolute top-2 right-2 text-blue-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <circle cx="10" cy="10" r="5"/>
          </svg>
        </span>
        <a href="/regional/new" class="flex items-center space-x-4">
          <div class="bg-blue-600 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 2L2 7h16L10 2zM2 8v10h5v-6h6v6h5V8H2z"/>
            </svg>
          </div>
          <span class="font-medium">Crear Regional</span>
        </a>
      </div>

      <!-- Tarjeta Centro -->
      <div class="bg-white shadow-md rounded-lg p-4 relative hover:shadow-lg transition">
        <span class="absolute top-2 right-2 text-red-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <circle cx="10" cy="10" r="5"/>
          </svg>
        </span>
        <a href="/centros/new" class="flex items-center space-x-4">
          <div class="bg-red-500 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M3 4h14v2H3V4zm0 4h14v10H3V8z"/>
            </svg>
          </div>
          <span class="font-medium">Crear Centro</span>
        </a>
      </div>

      <!-- Tarjeta Coordinador -->
      <div class="bg-white shadow-md rounded-lg p-4 relative hover:shadow-lg transition">
        <span class="absolute top-2 right-2 text-green-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <circle cx="10" cy="10" r="5"/>
          </svg>
        </span>
        <a href="/coordinador/new" class="flex items-center space-x-4">
          <div class="bg-green-400 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M13 7a3 3 0 11-6 0 3 3 0 016 0zM3 14s1-1 4-1 4 1 4 1v2H3v-2zm10.5 0c-1.5 0-2.5.5-2.5 1v1h7v-1c0-.5-1-1-2.5-1z"/>
            </svg>
          </div>
          <span class="font-medium">Crear Coordinador</span>
        </a>
      </div>
    </div>
  </div>
</body>
</html>
