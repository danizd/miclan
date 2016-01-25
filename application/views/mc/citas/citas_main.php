        <section class="content-header">
          <h1>
            Citas importantes
            <small>Citas para recordar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Citas importantes</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Eventos movibles</h4>
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
                  <h3 class="box-title">Crea cita</h3>
                </div>
                <div class="box-body">

                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Título del evento">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Añadir</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
                </div>
              </div>

              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Listado de citas</h3>
                </div>
                <div class="box-body">
                  <div id="listado-citas"></div>
                </div>
              </div>

            </div><!-- /.col -->
            <div class="col-md-7">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="citas" class="citas"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-2">

            </div><!-- /.col -->
          </div><!-- /.row -->