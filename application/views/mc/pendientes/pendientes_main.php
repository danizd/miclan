  <section class="content-header">
    <h1>
      Temas pendientes
      <small>Solucionar cuanto antes</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="resumen"><i class="fa fa-dashboard"></i> Portada</a></li>
      <li class="active">Temas pendientes</li>
    </ol>
  </section>
   <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h4 class="panel-title">Opciones</h4>
      </div>
      <div class="panel-body">
          <form class="form-horizontal form-bordered">
              <div class="form-group">
                  <div class="col-sm-6">
                      <a class="btn btn-primary" id="abre-modal"><i class="fa fa-plus"></i>  Añadir tema pendiente</a>
                  </div>                         
              </div>
          </form>
          <div id="prioridad">
            <h3>Prioridad</h3>
            <div class="pri"><i class="fa fa-circle-o text-red"></i> <span>Importante</span></div>
            <div class="pri"><i class="fa fa-circle-o text-yellow"></i> <span>Media</span></div>
            <div class="pri"><i class="fa fa-circle-o text-green"></i> <span>Baja</span></div>
          </div>
      </div>
    </div>
    <div class="row">
      <div id="pendientes"></div>
    </div>
  </div>

                <!---  ///////////////////////////////////  Ventana modal //////////////////////////// -->
<div class="modal fade" id="abreModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mi Clan</h4>
      </div>
      <div class="modal-body">
        <p id="modal-message">Añade Tema pendiente</p>

        <form class="form-horizontal" role="form" id="anadir-form">
            <div class="panel-body">
                <input type="hidden" name="id" id="inputId" value="">

                <div class="form-group">
                    <label for="titulo" class="col-sm-4 control-label">Título</label>
                    <div class="col-sm-8">
                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo set_value('titulo'); ?>" placeholder="Título">
                        <div id="error-titulo"></div>
                    </div>
                </div>
      
                <div class="form-group">
                    <label for="descripcion" class="col-sm-4 control-label">Descripción</label>
                    <div class="col-sm-8">
                        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Por qué te parece interesante">
                        <div id="error-descripcion"></div>                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-4 control-label">Prioridad</label>
                    <div class="col-sm-8">
                        <select name="prioridad" class="form-control autocomplete" style="width:100%" id="prioridad" 
                        placeholder="Prioridad">
                          <option value="">--Seleccciona--</option>
                          <option value="1">Alta</option>
                          <option value="2">Media </option>
                          <option value="3">Baja</option>
                        </select>
                        <div id="error-prioridad"></div>              
                    </div>
                </div>  
                <div class="form-group">
                    <label for="asignado" class="col-sm-4 control-label">Asignado a </label>
                    <div class="col-sm-8">
                        <select name="asignado" class="form-control autocomplete" style="width:100%" id="asignado" 
                        placeholder="Asignado a " >
                          <option value="">--Seleccciona--</option>
                          <option value="1">Dani</option>
                          <option value="2">Elena</option>
                          <option value="3">Saloa</option>
                        </select>
                        <div id="error-asignado"></div>              
                    </div>
                </div>  

                                        
            </div>
        </form>
        <div id="correcto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="guarda-pendientes">Guardar</button>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
