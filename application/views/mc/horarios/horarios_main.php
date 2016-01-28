        <section class="content-header">
          <h1>
            Horarios de trabajo de Elena
            <small>Horarios de trabajo de Elena</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Horarios de trabajo de Elena</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Horarios movibles</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        borra después de mover
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Crea Horario</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a><p>Saloa queda con nosotros</p></li>
                      <li><a class="text-red" href="#"><i class="fa fa-square"></i></a><p>Saloa no puede quedarse con nosotros</p></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Horario">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Añadir</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
		                <div class=" mtop box-header with-border">
		                  <h3 class="box-title">Añade horas a la semana</h3>
		                </div>                 
		                <div class="input-group">
	                  <form class="form-horizontal" role="form" id="anadir-form">
	                    <input id="etiqueta" type="text" class="form-control input-media" placeholder="Semana">
	                    <input id="valor" type="text" class="form-control input-media" placeholder="Horas">
	                    <div class="input-group-btn">
	                      <button id="anadir-semana" type="button" class="btn btn-primary btn-flat">Añadir</button>
	                    </div><!-- /btn-group -->
	                  </form>
                  </div><!-- /input-group -->
                </div>
              </div>
              <div id="semanas"></div>
            </div><!-- /.col -->
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="horarios" class="horarios"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-1">

            </div><!-- /.col -->
          </div><!-- /.row -->