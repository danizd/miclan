  <section class="content-header">
    <h1>
      Noticias
      <small>Noticias que nos interesan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="resumen"><i class="fa fa-dashboard"></i> Resumen</a></li>
      <li class="active">Noticias</li>
    </ol>
  </section>
   <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h4 class="panel-title">Opciones</h4>
      </div>
      <div class="panel-body">
        <div id="info">
          <h3>URL de la noticias</h3>
          <div id="lessoncup">
            <div id="data">
               <div class="form-group">
                  <div class="col-sm-6">
                      <textarea name="" class="box" id="box"></textarea>
                      <a class="btn btn-primary" id="btn"><i class="fa fa-plus"></i>  Envía</a>
                  </div>                         
              </div>
              <div id="loader"></div>
              <div id="result" class="result"></div>
              <button id="btn2" style="display:none">Guarda la noticia</button>
            </div>
          </div>
       </div>
      </div>
    </div>
    <div class="row">
            <div id="noticias"></div>
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
        <p id="modal-message">Añade noticia</p>

        <form class="form-horizontal" role="form" id="anadir-form">
            <div class="panel-body">



                                        
            </div>
        </form>
        <div id="correcto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="guarda-noticia">Guardar</button>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
