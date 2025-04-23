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
        <!-- Tarjeta Crear Aprendices -->
        <a href="#" onclick="abrirModal(); return false;" class="card bg-white shadow-md rounded-lg p-4 flex items-center gap-4 hover:shadow-lg transition">
        <div class="bg-green-500 text-white text-2xl p-3 rounded-full shadow-md">👥</div>
        <span class="text-base font-medium">Crear Aprendices</span>
      </a>
      

    </div>
  </div>
  <!-- Modal oculto por defecto -->
<div class="modal" id="modalCrearAprendiz">
  <div class="modal-contenido">
    <span class="cerrar" onclick="cerrarModal()">×</span>
    <h2>Crear Aprendiz</h2>

    <div class="formulario">
      <div class="campo-grupo">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" id="txtNombre" name="txtNombre" />
      </div>

      <div class="campo-grupo">
        <label for="txtDocumento">Tipo de Documento</label>
        <select id="txtDocumento" name="txtDocumento">
          <option value="">Cédula</option>
        </select>
      </div>

      <div class="campo-grupo">
        <label for="txtNumeroDocumento">Número de Documento</label>
        <input type="text" id="txtNumeroDocumento" name="txtNumeroDocumento" />
      </div>

      <div class="campo-grupo">
        <label for="txtContraseña">Contraseña</label>
        <input type="password" id="txtContraseña" name="txtContraseña" />
      </div>

      <div class="campo-grupo">
        <label for="txtTelefono">Teléfono</label>
        <input type="tel" id="txtTelefono" name="txtTelefono" />
      </div>

      <div class="campo-grupo">
        <label for="txtEmail">Correo Electrónico</label>
        <input type="email" id="txtEmail" name="txtEmail" />
      </div>

      <div class="campo-grupo completo">
        <label for="txtFicha">N° de Ficha</label>
        <select id="txtFicha" name="txtFicha">
          <option value="">Seleccione una ficha</option>
        </select>
      </div>
    </div>

    <button class="btn-crear">Crear</button>
  </div>
</div>

<script>
  // Mostrar modal desde cualquier botón
  function abrirModal() {
    document.getElementById("modalCrearAprendiz").classList.add("mostrar");
  }

  function cerrarModal() {
    document.getElementById("modalCrearAprendiz").classList.remove("mostrar");
  }

  // Cerrar haciendo clic fuera del contenido
  document.addEventListener("click", function(event) {
    const modal = document.getElementById("modalCrearAprendiz");
    const contenido = modal.querySelector(".modal-contenido");
    if (modal.classList.contains("mostrar") && !contenido.contains(event.target) && !event.target.closest('.card')) {
      cerrarModal();
    }
  });
</script>
<style>
 
  .card:hover {
    transform: scale(1.02);
  }

  .modal {
    display: none;
    justify-content: center;
    align-items: center;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 999;
  }

  .modal.mostrar {
    display: flex;
  }

  .modal-contenido {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    width: 600px;
    max-width: 90%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    position: relative;
  }

  .cerrar {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 24px;
    color: #000;
    cursor: pointer;
  }

  h2 {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 30px;
  }

  .formulario {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
  }

  .campo-grupo {
    position: relative;
    width: 48%;
  }

  .campo-grupo.completo {
    width: 100%;
  }

  label {
    position: absolute;
    top: -10px;
    left: 12px;
    background: #fff;
    padding: 0 4px;
    font-size: 12px;
    color: #888;
  }

  input,
  select {
    width: 100%;
    padding: 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
  }

  select {
    appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/512/709/709586.png') no-repeat right 12px center;
    background-size: 16px;
  }

  .icon-dropdown {
    position: absolute;
    top: 38px;
    right: 12px;
    color: #777;
  }

  .btn-crear {
    background: linear-gradient(to right, #a064f5, #c779d0);
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    border: none;
    border-radius: 24px;
    cursor: pointer;
    display: block;
    margin: 30px auto 0;
  }
</style>
</body>
</html>
