<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Coordinador Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/css/coordinador.css">
  <!-- Incluir Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-[#f4f6ff] min-h-screen p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-xl font-bold mb-6">Bienvenido, Coordinador</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Crear Programas -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalProgramas" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-blue-500 text-white text-2xl p-3 rounded-full shadow-md">📚</div>
        <span class="text-base font-medium">Crear Programas</span>
      </a>

      <!-- Crear Ambientes -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAmbiente" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-purple-600 text-white text-2xl p-3 rounded-full shadow-md">🏢</div>
        <span class="text-base font-medium">Crear Ambientes</span>
      </a>

      <!-- Crear Fichas -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalFicha" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-green-500 text-white text-2xl p-3 rounded-full shadow-md">📝</div>
        <span class="text-base font-medium">Crear Fichas</span>
      </a>

      <!-- Crear Instructores -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalInstructor" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-yellow-400 text-white text-2xl p-3 rounded-full shadow-md">👨‍🏫</div>
        <span class="text-base font-medium">Crear Instructores</span>
      </a>

      <!-- Crear Aprendices -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalEstudiante" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-red-500 text-white text-2xl p-3 rounded-full shadow-md">👥</div>
        <span class="text-base font-medium">Crear Aprendices</span>
      </a>

      <!-- Crear Clases -->
      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalClase" class="bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-blue-300 text-white text-2xl p-3 rounded-full shadow-md">📅</div>
        <span class="text-base font-medium">Crear Clases</span>
      </a>
    </div>
  </div>

  <!-- Modal Programas -->
  <div class="modal fade" id="modalProgramas" tabindex="-1" aria-labelledby="modalProgramasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalProgramasLabel">Crear Programas de Formación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-3" id="txtNombrePrograma" name="txtNombrePrograma" placeholder="Nombre del programa">
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Instructor -->
  <div class="modal fade" id="modalInstructor" tabindex="-1" aria-labelledby="modalInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalInstructorLabel">Crear un Instructor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-3" id="txtInstructor" name="txtInstructor" placeholder="Nombre del Instructor">
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ficha -->
  <div class="modal fade" id="modalFicha" tabindex="-1" aria-labelledby="modalFichaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFichaLabel">Crear una Ficha</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-3" placeholder="Nombre de la Ficha">
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Estudiante -->
  <div class="modal fade" id="modalEstudiante" tabindex="-1" aria-labelledby="modalEstudianteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEstudianteLabel">Crear un Estudiante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-3" id="txtEstudiante" name="txtEstudiante" placeholder="Nombre del Estudiante">
          <select class="form-control mb-3" id="txtFicha" name="txtFicha">
            <option>Seleccione una Ficha</option>
          </select>
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ambiente -->
  <div class="modal fade" id="modalAmbiente" tabindex="-1" aria-labelledby="modalAmbienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAmbienteLabel">Crear un Ambiente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control mb-3" id="txtAmbiente" name="txtAmbiente" placeholder="Nombre del Ambiente">
          <select class="form-control mb-3" id="txtRegional" name="txtRegional">
            <option>Seleccione una Regional</option>
          </select>
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Clase -->
  <div class="modal fade" id="modalClase" tabindex="-1" aria-labelledby="modalClaseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalClaseLabel">Crear una Clase</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-control mb-3" id="txtInstructor" name="txtInstructor">
            <option>Seleccione un Instructor</option>
          </select>
          <input type="date" class="form-control mb-3" id="txtFecha" name="txtFecha" placeholder="Fecha">
          <select class="form-control mb-3" id="txtAmbiente" name="txtAmbiente">
            <option>Seleccione un Ambiente</option>
          </select>
          <button class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Crear</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
