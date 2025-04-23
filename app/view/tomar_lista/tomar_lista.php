<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tomar Lista</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .card-shadow {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .radio-hover:hover .radio-icon {
      transform: scale(1.1);
    }
    .radio-icon {
      transition: all 0.2s ease;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-blue-100 to-indigo-200 min-h-screen font-sans">
  <!-- Contenedor principal -->
  <div class="max-w-6xl mx-auto px-4 py-6">
    
    <!-- Header con título y botón de cerrar sesión -->
    <header class="flex justify-between items-center bg-white p-6 shadow-md rounded-lg mb-6">
      <h1 class="text-2xl font-bold text-gray-800">📋 Tomar Lista</h1>
      <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg transition flex items-center">
        <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
      </a>
    </header>
<br>
<br>
<br>
<br>
    <!-- Contenido principal -->
    <div class="space-y-6">
      <!-- Select de fichas -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <label for="ficha" class="block text-gray-700 font-medium mb-2">Fichas:</label>
        <select id="ficha" name="ficha" class="w-full px-4 py-2 rounded-md border border-gray-300 bg-white text-gray-700 font-medium" onchange="mostrarFicha(this)">
          <option value="2873707">ADSO 2873707</option>
          <option value="2873708">ADSO 2873708</option>
        </select>
      </div>

      <!-- Ficha seleccionada -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex items-center justify-between space-x-4">
          <h2 id="nombreFicha" class="text-2xl font-bold text-gray-800">ADSO: 2873707</h2>
          <button class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold shadow-md hover:bg-blue-600 transition text-base">
            ⭐ Todos Asistieron
          </button>
        </div>
      </div>

      <!-- Formulario de asistencia -->
      <form class="space-y-6">
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md bg-white">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Asistencia</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Horas</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-lg font-medium text-gray-900">Nombre Ejemplo</td>
                <td class="px-6 py-4">
                  <div class="flex justify-center space-x-3">
                    <!-- Asistió -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora1" value="A" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-blue-500 flex items-center justify-center peer-checked:bg-blue-500 mr-2">
                        <i class="radio-icon fas fa-check text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Asistió</span>
                    </label>
                    <!-- Excusa -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora1" value="E" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-yellow-500 flex items-center justify-center peer-checked:bg-yellow-500 mr-2">
                        <i class="radio-icon fas fa-file-alt text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Excusa</span>
                    </label>
                    <!-- Faltó -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora1" value="I" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-red-500 flex items-center justify-center peer-checked:bg-red-500 mr-2">
                        <i class="radio-icon fas fa-times text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Faltó</span>
                    </label>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-end space-x-2">
                    <label for="horasFalta" class="text-sm font-medium text-gray-700">Horas de Falta</label>
                    <input type="number" id="horasFalta" class="w-16 px-2 py-1 border border-gray-300 rounded-md text-center" value="0" />
                  </div>
                </td>
              </tr>
              
              <!-- Puedes agregar más estudiantes aquí -->
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-lg font-medium text-gray-900">Otro Estudiante</td>
                <td class="px-6 py-4">
                  <div class="flex justify-center space-x-3">
                    <!-- Asistió -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora2" value="A" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-blue-500 flex items-center justify-center peer-checked:bg-blue-500 mr-2">
                        <i class="radio-icon fas fa-check text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Asistió</span>
                    </label>
                    <!-- Excusa -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora2" value="E" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-yellow-500 flex items-center justify-center peer-checked:bg-yellow-500 mr-2">
                        <i class="radio-icon fas fa-file-alt text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Excusa</span>
                    </label>
                    <!-- Faltó -->
                    <label class="radio-hover flex items-center cursor-pointer">
                      <input type="radio" name="hora2" value="I" class="hidden peer" />
                      <div class="w-8 h-8 rounded-full border-2 border-red-500 flex items-center justify-center peer-checked:bg-red-500 mr-2">
                        <i class="radio-icon fas fa-times text-sm text-white opacity-0 peer-checked:opacity-100"></i>
                      </div>
                      <span class="text-gray-700">Faltó</span>
                    </label>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-end space-x-2">
                    <label for="horasFalta2" class="text-sm font-medium text-gray-700">Horas de Falta</label>
                    <input type="number" id="horasFalta2" class="w-16 px-2 py-1 border border-gray-300 rounded-md text-center" value="0" />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Botones -->
        <div class="flex justify-center space-x-4 pt-6">
          <button type="submit" class="flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-lg shadow-md hover:from-green-600 hover:to-green-700 transition">
            <i class="fas fa-save mr-2"></i>Guardar Cambios
          </button>
          <a href="#" class="flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-bold rounded-lg shadow-md hover:from-gray-600 hover:to-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Volver
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Cambiar nombre de ficha al seleccionar
    function mostrarFicha(select) {
      const ficha = select.value;
      document.getElementById('nombreFicha').textContent = ADSO: ${ficha};
    }
  </script>
</body>
</html>