<div class="modal fade" id="codigos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activar Código</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post">
           <div class="form-group">
            <p>El código siempre va relacionado a un solicitante</p>
    <label for="exampleInputEmail1">Nombre:</label>
    <input type="text" class="form-control" id="nombreCodigo" name="nombreCodigo" aria-describedby="emailHelp" placeholder="Nombre del solicitante" required style="text-transform: uppercase;">
  </div>
       <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico:</label>
    <input type="email" class="form-control" id="nombreCodigo" name="emailCodigo" aria-describedby="emailHelp" placeholder="correo electrónico"  required>
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">Teléfono:</label>
    <input type="tel" class="form-control" id="nombreCodigo" name="telefonoCodigo" aria-describedby="emailHelp"  maxlength="8"  minlength="8"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">¿Cuantos códigos deseas agregar a nombre del solicitante?:</label>
    <input type="number" class="form-control" id="nombreCodigo" name="cuantoCodigo" aria-describedby="emailHelp" value="1" min="1"  required>
  </div>
       <button type="submit" name="enviarCodigo" class="btn btn-primary">Generar Código</button>
          </form>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<!--CON UN USUARIO QUE YA EXISTE-->
<div class="modal fade" id="codigosExiste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activar Código</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
          <form method="post" onsubmit="ExisteUsuarioComprobar()">
           <div class="form-group">
            <p>En el espacio de Nombre funciona como buscador, coloque el nombre de la persona que buscas</p>
    <label for="ExisteNombre">Nombre:</label>
    <div class="MostrarNombreExiste"></div>
    <input type="text" class="form-control" id="nombreCodigoExiste" name="nombreCodigoExiste" aria-describedby="emailHelp" placeholder="Nombre del solicitante" required autocomplete="off">
  </div>
       <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico:</label>
    <input type="email" class="form-control" id="correoCodigoExiste" name="emailCodigoExiste" aria-describedby="emailHelp" placeholder="correo electrónico"  required readonly>
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">Teléfono:</label>
    <input type="tel" class="form-control" id="telefonoCodigoExiste" name="telefonoCodigoExsite" aria-describedby="emailHelp"  maxlength="8"  minlength="8"  required readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">¿Cuantos códigos deseas agregar a nombre del solicitante?:</label>
    <input type="number" class="form-control" id="nombreCodigo" name="cuantoCodigo" aria-describedby="emailHelp" value="1"  min="1" required>
  </div>
       <button type="submit" name="enviarCodigoExiste" class="btn btn-primary enviarCodigoExiste" onsubmit="ExisteUsuarioComprobar()" >Generar Código</button>
          </form>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>