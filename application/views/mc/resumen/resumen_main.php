    <section class="content-header">
    <h1>
      Pulsar
      <small>El pulsómetro de nuestra relación</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Portada</a></li>
      <li class="active">Pulsómetro</li>
    </ol>
  </section>
   <section class="content">
   	<div class="row">
   				<div class="col-md-6">
   					<div class="box box-primary pulsar">
                <div class="box-header with-border">
                  <div id="asi"></div>
                </div>
               <div class="demo-gauge">
			      		  <div id='gauge'></div>
			       		 <!-- <div id='slider' style="position: absolute; top: 300px; left: 93px"></div>-->
                  <div id="puntuacion"></div>
			   	 		</div>
			   		</div>
          </div>
          <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Mi histórico </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="myChart1" width="665" height="250"></canvas>

                  </div>
                </div><!-- /.box-body -->
              </div>   				
         </div>
    </div>
    <div class="row">
          <div class="col-md-6">
   					<div class="box box-grey pulsar">
                <div class="box-header with-border">
                  <div id="titulo-cambia"></div>
                </div>
                
               <div class="demo-gauge">
			      		  <div id='gauge2'></div>
			      <!-- 		  <div id='slider2' style="position: absolute; top: 300px; left: 93px"></div> -->
                  <div id="envia"></div>
                  <div id="cambia">
                    <input class="btn btn-primary btn-flat" type="button" id="jqxbutton" value="Cambia tu valoración" />
                  </div>
                  <div class="input-group" id="input-valoracion">
                    <input id="new-val" type="number" min="0" max="100" class="form-control" placeholder="Valor">
                    <div class="input-group-btn">
                      <button id="add-new-val" type="button" class="btn btn-primary btn-flat">Enviar</button>
                    </div><!-- /btn-group -->
                  </div>
                  <div id="error"></div>
			   	 		</div>

			 			</div>   	  
    		</div>
          <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Su histórico </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="myChart2" width="665" height="250"></canvas>

                  </div>
                </div><!-- /.box-body -->
              </div>          
         </div>
    </div>

    
    
    
