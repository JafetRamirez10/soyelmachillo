
<div class="modal fade" id="EditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EditarUsuario</h5>
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
    <input type="text" class="form-control" id="EditarnombreUsuario" name="nombreCodigoEditar" aria-describedby="emailHelp" placeholder="Nombre del solicitante" required>
  </div>
       <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico:</label>
    <input type="email" class="form-control" id="EditarcodigoUsuario" name="emailCodigoEditar" aria-describedby="emailHelp" placeholder="correo electrónico"  required>
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">Teléfono:</label>
    <input type="tel" class="form-control" id="EditartelefonoUsuario" name="telefonoCodigoEditar" aria-describedby="emailHelp"  maxlength="8"  minlength="8"  required>
    <input type="hidden" name="idUsuarioEditar" id="idUsuarioEditar">
  </div>
       <button type="submit" name="EditarenviarUsuario" class="btn btn-primary">Actualizar</button>
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


<!--BUSCAR CODIGOS -->

<div class="modal fade" id="BuscarCodigoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar por código</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="NoEncontrados"></div>
         <p>También puedes buscar colocando el código,nombre,teléfono,e-mail de la persona</p>
         <select name="SolicitanteOUsuario">
            <option>Seleccionar</option>
           <option name="solicitante">Solicitante</option>
           <option name="usuario">Usuario</option>
         </select>
         <div class="col-12 col-md-5 cajitadeBUscar" id="BUsacarSolicitante" style="display: none"><label>Busca a un Solicitante:</label><input type="text" name="" id="BuscandoCodigo"></div>
          <div class="col-12 col-md-5 cajitadeBUscar"  id="BUsacarUsuario" style="display: none"> <label> Buscar a un Usuario:</label><input type="text" name="" id="BuscandoCodigoUsuario"></div>
         <div class="tablaBusquedaCodigo"></div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- FIN DE BUSCAR CODIGOS -->
