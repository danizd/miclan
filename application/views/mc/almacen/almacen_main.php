  <section class="content-header">
    <h1>
      Almacén de archivos
      <small>Todos los archivos que podemos necesitar en algun momento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="resumen"><i class="fa fa-dashboard"></i> Resumen</a></li>
      <li class="active">Almacén de archivos</li>
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
                      <a class="btn btn-primary" id="abre-modal"><i class="fa fa-plus"></i>  Añadir archivo</a>
                  </div>                         
              </div>
          </form>
      </div>
    </div>
    <div class="row">
      <table id="archivos" class="display" width="100%"></table>
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
        <p id="modal-message">Añade archivo</p>

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
                        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                    </div>
                </div>
                <div class="form-group">
                    <label for="categoria" class="col-sm-4 control-label">Categoría</label>
                    <div class="col-sm-8">
                        <select name="categoria" class="form-control autocomplete" style="width:100%" id="categoria" placeholder="Categoría">
                          <option value="">--Seleccciona--</option>
                          <option value="1">Documentos personales</option>
                          <option value="2">Cuentas </option>
                          <option value="3">Otros</option>
                        </select>
                       <div id="error-categoria"></div>
                    </div>
                </div>
                 <div class="form-group" id="image-form-group" style="display: none;">
                    <label for="inputImagen" class="col-sm-4 control-label">Imagen</label>
                    <div class="col-sm-8">
                        <img class="form-image"><br>
                    </div>
                </div>       

                <div class="form-group">
                    <label for="inputArchivo" class="col-sm-4 control-label">Archivo</label>
                    <div class="col-sm-8">
                        <input type="file" name="archivo" class="form-control" id="inputArchivo" > 
                        <div id="error-archivo"></div>              
                    </div>
                </div> 
                                        
            </div>
        </form>
        <div id="correcto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="guarda-archivo">Guardar</button>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
