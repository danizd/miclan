  <section class="content-header">
    <h1>
      Informes médicos
      <small>Informes médicos de la familia</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="resumen"><i class="fa fa-dashboard"></i> Resumen</a></li>
      <li class="active">Informes médicos</li>
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
                      <a class="btn btn-primary" id="abre-modal"><i class="fa fa-plus"></i>  Añadir informe</a>
                  </div>                         
              </div>
          </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Saloa</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Elena</a></li>
            <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Dani</a></li>

            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="tab_1">
             <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Informes de Saloa</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">
                    <div class="col-md-6">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div id="informes_Saloa"></div>
                    </div>
                    <div class="col-md-6">
                     <div class="col-lg-6 col-xs-6">

                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><div id="num_urgencias_saloa"></div></h3>
                          <p>Número de urgencias</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><div id="num_cabecera_saloa"></div></h3>
                        <p>Número de Consultas cabecera</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><div id="num_crisis_saloa"></div></h3>
                          <p>Número de Crisis asmáticas</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-square"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3><div id="num_otros_saloa"></div></h3>
                          <p>Número de Otras consultas</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-times"></i>
                        </div>
                      </div>
                    </div>
                    </div>
                 </div>
              </div><!-- /.box-body -->
            </div>



            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Informes de Elena</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">
                    <div class="col-md-6">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div id="informes_Elena"></div>
                    </div>
                    <div class="col-md-6">
                     <div class="col-lg-6 col-xs-6">

                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><div id="num_urgencias_elena"></div></h3>
                          <p>Número de urgencias</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><div id="num_cabecera_elena"></div></h3>
                        <p>Número de Consultas cabecera</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><div id="num_otros_elena"></div></h3>
                          <p>Número de Otras consultas</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-square"></i>
                        </div>
                      </div>
                    </div>
                    </div>
                 </div>
              </div><!-- /.box-body -->
            </div><!-- /.tab-pane -->

          </div>


            <div class="tab-pane active" id="tab_3">
             <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Informes de Dani</h3>
              </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <div class="col-md-6">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div id="informes_Dani"></div>
                    </div>
                    <div class="col-md-6">
                     <div class="col-lg-6 col-xs-6">

                      <!-- small box -->
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><div id="num_urgencias_dani"></div></h3>
                          <p>Número de urgencias</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><div id="num_cabecera_dani"></div></h3>
                        <p>Número de Consultas cabecera</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><div id="num_otros_dani"></div></h3>
                          <p>Número de Otras consultas</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-square"></i>
                        </div>
                      </div>
                    </div>
                    </div>
                 </div>
              </div><!-- /.box-body -->
            </div>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </div>
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
        <p id="modal-message">Añade informe</p>

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
                    <label for="sintomas" class="col-sm-4 control-label">Sintomas</label>
                    <div class="col-sm-8">
                        <input type="text" name="sintomas" class="form-control" id="sintomas" placeholder="sintomas">
                        <div id="error-sintomas"></div>              
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-4 control-label">Tipo</label>
                    <div class="col-sm-8">
                        <select name="tipo" class="form-control autocomplete" style="width:100%" id="tipo" 
                        placeholder="Tipo">
                          <option value="">--Seleccciona--</option>
                          <option value="1">Crisis asmática</option>
                          <option value="2">Urgencias </option>
                          <option value="3">Consulta de cabecera</option>
                          <option value="4">Otros</option>
                        </select>
                        <div id="error-tipo"></div>              
                    </div>
                </div>  
                <div class="form-group">
                    <label for="quien" class="col-sm-4 control-label">De quien</label>
                    <div class="col-sm-8">
                        <select name="quien" class="form-control autocomplete" style="width:100%" id="quien" 
                        placeholder="De quien" >
                          <option value="">--Seleccciona--</option>
                          <option value="1">Dani</option>
                          <option value="2">Elena</option>
                          <option value="3">Saloa</option>
                        </select>
                        <div id="error-quien"></div>              
                    </div>
                </div>  
                <div class="form-group">
                    <label for="fechaInicio" class="col-sm-4 control-label">Fecha de inicio</label>
                    <div class="col-sm-8">
                        <input type="text" id="fechaInicio" name="fechaInicio" class="form-control"  placeholder="dd-mm-aaaa">                            
                        <div id="error-fechaInicio"></div>              
                    </div>
                </div> 
                <div class="form-group">
                    <label for="fechaFin" class="col-sm-4 control-label">Fecha de fin</label>
                    <div class="col-sm-8">
                        <input type="text"  name="fechaFin" class="form-control" id="fechaFin" placeholder="dd-mm-aaaa">                            
                        <div id="error-fechaFin"></div>              
                    </div>
                </div>   
                <div class="form-group">
                    <label for="tratamiento" class="col-sm-4 control-label">Tratamiento</label>
                    <div class="col-sm-12">
                     <textarea id="tratamiento" name="tratamiento" rows="10" cols="80" placeholder="Escribe todo lo que creas conveniente recordar. Copia y pega imagenes si es necesario"> </textarea>
                    <div id="error-tratamiento"></div>              
                    </div>
                </div>


                                        
            </div>
        </form>
        <div id="correcto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="guarda-informe">Guardar</button>
      </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
