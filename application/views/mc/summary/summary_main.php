            <div class="page-subheading page-subheading-md">
                <ol class="breadcrumb">
                    <li><a href="/admin/"><?= $this->lang->line('start'); ?></a>
                    </li>
                    <li class="active"><a href="/admin/mc/summary"><?= $this->lang->line('summary'); ?></a>
                    </li>
                </ol>
            </div>
            <div class="page-heading page-heading-md clearfix">
                <h2 class="pull-left"><?= $this->lang->line('summary_index'); ?></h2>
            </div>

            <!---  /////////////////////////////////// START eventS TABLE //////////////////////////// -->

            <div class="container-fluid-md">
                <div class="panel panel-default">
                 <div class="row">
                     <div class="col-md-5">
                          <div id="events"></div>
                               
                    </div>
                    <div class="col-md-7">
                          <div style=" height: 500px; margin: 0px; padding: 0px" id="map-canvas"></div>
                    </div>
                  </div>
                </div>
            </div>

