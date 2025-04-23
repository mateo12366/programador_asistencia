<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Formación</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1a73e8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }


    .modal {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      width: 460px;
      padding: 20px;
      position: relative;
     
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .modal-title {
      font-size: 22px;
      font-weight: bold;
      margin: 0;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .close-button {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
    }

    input, select {
      width: 100%;
      padding: 8px 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 14px;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
    }

    select {
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23bbbbbb' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 16px;
      padding-right: 30px;
    }

    .time-group {
      display: flex;
      gap: 20px;
    }

    .time-input {
      flex: 1;
    }

    .time-input input {
      padding-left: 32px;
    }

    .time-icon {
      position: relative;
    }

    .time-icon::before {
      content: '⏱️';
      position: absolute;
      left: 10px;
      top: 9px;
      z-index: 1;
      font-size: 14px;
    }

    .date-input {
      position: relative;
    }

    .date-input input {
      padding-left: 32px;
    }

    .date-icon {
      position: relative;
    }


    .submit-button {
      background-color: #333;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      font-size: 14px;
      cursor: pointer;
      display: block;
      margin: 20px auto 0;
      width: 100px;
    }

    .submit-button:hover {
      background-color: #444;
    }
  </style>
</head>
<body>
  <div class="modal">
    <div class="modal-header">
      <h2 class="modal-title">Crear Clase</h2>
    </div>
    
    <form action="/clase/init">
      <div class="form-group">
        <label for="txtClase">Clase</label>
        <input type="text" id="txtClase" name="txtClase">
      </div>
      
      <div class="form-group">
        <label for="txtNombreComponente">Nombre de componente</label>
        <select id="txtNombreComponente" name="txtNombreComponente" >
        </select>
      </div>
      
      <div class="form-group">
        <label for="txtFicha">Ficha</label>
        <select id="txtFicha" name="txtFicha">
        
        </select>
      </div>
      
      <div class="form-group">
        <label for="txtFecha">Fecha</label>
        <div class="date-icon">
          <input type="date" id="txtFecha" name="txtFecha" >
        </div>
      </div>
      
      <div class="time-group">
        <div class="form-group">
          <label for="txtHoraInicio">Hora Inicio</label>
            <input type="time" id="txtHoraInicio" name="txtHoraInicio">
          </div>
        
        
        <div class="form-group">
          <label for="txtHoraFin">Hora Fin</label>
            <input type="time" id="txtHoraFin" name="txtHoraFin">
          </div>
        </div>
     
      
      <button type="submit" class="submit-button">Crear</button>
    </form>
  </div>
</body>
</html>