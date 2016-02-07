<script>

function pulsar() {
	  $.ajax({
	      url: "trae_pulsar/",
	      dataType: 'json',
	      type: 'POST',
	  })
	 .done(function( data, textStatus, jqXHR ) {
	     if ( console && console.log ) {
	          if(data.status == "OK")
	          {
			         var dani_pulsar = data.aaData['Dani'];            	                
			      	 var elena_pulsar = data.aaData['Elena'];  
			      	 var usuario = data.aaData['usuario'];  
					     titulo1 = '<h4 class="box-title">Su valoración sobre nosotros</h4>';
					     titulo2 = '<h4 class="box-title">Tu valoración sobre nosotros</h4>';
						 if(usuario == 1){ 
						 	valor1 = elena_pulsar;
						 	valor2 = dani_pulsar;
						 } else {
						 	valor1 = dani_pulsar;
						 	valor2 = elena_pulsar;
						 };
								 
					         $('#asi').html(titulo1);
					         $('#titulo-cambia').html(titulo2);
						 	 $('#puntuacion').html('<div class="bg-purple color-palette alert alert-info alert-dismissable">Su valoración actual es ' + valor1 +'</div>');			      


			      	//Pulsometro 1
			      	$('#gauge').jqxGauge({
			      	    ranges: [{ startValue: 0, endValue: 40, style: { fill: '#e53d37', stroke: '#e53d37' }, startDistance: 0, endDistance: 0 },
			      	             { startValue: 40, endValue: 60, style: { fill: '#fad00b', stroke: '#fad00b' }, startDistance: 0, endDistance: 0 },
			      	             { startValue: 60, endValue: 100, style: { fill: '#4cb848', stroke: '#4cb848' }, startDistance: 0, endDistance: 0}],
			      	    cap: { size: '5%', style: { fill: '#2e79bb', stroke: '#2e79bb'} },
			      	    border: { style: { fill: '#8e9495', stroke: '#7b8384', 'stroke-width': 1 } },
			      	    ticksMinor: { interval: 5, size: '5%' },
			      	    ticksMajor: { interval: 20, size: '10%' },       
			      	    labels: { position: 'outside', interval:5 },
			      	    pointer: { style: { fill: '#2e79bb' }, width: 5 },
			      	    animationDuration: 1500,
			      	    max:100
			      	});

			      	if(usuario == 1){
			      			$('#gauge').jqxGauge('value', elena_pulsar);
							}else if(usuario == 2){
				      			$('#gauge').jqxGauge('value', dani_pulsar);
							}else{
				      			$('#gauge').jqxGauge('value', 0);
							}




			      	// Pulsometro 2
			      	$('#gauge2').jqxGauge({
			      	    ranges: [{ startValue: 0, endValue: 40, style: { fill: '#e53d37', stroke: '#e53d37' }, startDistance: 0, endDistance: 0 },
			      	             { startValue: 40, endValue: 60, style: { fill: '#fad00b', stroke: '#fad00b' }, startDistance: 0, endDistance: 0 },
			      	             { startValue: 60, endValue: 100, style: { fill: '#4cb848', stroke: '#4cb848' }, startDistance: 0, endDistance: 0}],
			      	    cap: { size: '5%', style: { fill: '#2e79bb', stroke: '#2e79bb'} },
			      	    border: { style: { fill: '#8e9495', stroke: '#7b8384', 'stroke-width': 1 } },
			      	    ticksMinor: { interval: 5, size: '5%' },
			      	    ticksMajor: { interval: 20, size: '10%' },       
			      	    labels: { position: 'outside', interval:5 },
			      	    pointer: { style: { fill: '#2e79bb' }, width: 5 },
			      	    animationDuration: 1500,
			      	    max:100
			      	});
			      	
					if(usuario == 1){
	      			$('#gauge2').jqxGauge('value', dani_pulsar);
					}else if(usuario == 2){
		      			$('#gauge2').jqxGauge('value', elena_pulsar);
					}else{
		      			$('#gauge2').jqxGauge('value', 0);
					}

					 $('#gauge2').jqxGauge('disable');
		  			 $('#cambia').show();


					 $('#jqxbutton').click(function () {
					 	 $('#cambia').hide();
					     $('#gauge2').jqxGauge('enable');
					     /*
				      	 $('#gauge2').on('valueChanged', function () {
						*/
						 //var valor2 = $("#gauge2").jqxGauge('val');
		  			     $('#jqxbutton').hide();
					     $('#input-valoracion').show();
						 $('#envia').html('<div class="alert alert-info alert-dismissable">La valoración actual es ' + valor2 +'</div>');			      
					});
					    
			        $("#add-new-val").click(function (e) {
			          e.preventDefault();
			          //Get value and make sure it is not null
			          var val = $("#new-val").val();
			          if (val.length == 0) {
			          	$('#error').append("Introduce un valor entre 1 y 100");
			            return;
			          }else if(val < 0 || val >100){
			          	$('#error').append("Debe ser un valor entre 1 y 100");
						return;
			          }
			          anadir_pulsar(val);
					}); 

					       	                
	            }
	          else
	          {
	          _open_bootbox('<p>' + data.msg +  '</p>');
	          }
	     }
	 })
	 .fail(function( jqXHR, textStatus, errorThrown ) {
	     if ( console && console.log ) {
	         console.log( "La solicitud a fallado: " +  textStatus);
	     }
	  });
	}


	function historico_pulsar()
	{
	  $.ajax({
	      url: "trae_historico_pulsar/",
	      dataType: 'json',
	      type: 'POST',
	  })
	 .done(function( data, textStatus, jqXHR ) {
	     if ( console && console.log ) {
	          if(data.status == "OK")
	          {
	          		dani_historico_pulsar = [];
	          		label_dani = [];
	          		elena_historico_pulsar = [];
	          		label_elena = [];
            	  	for (var i = 0; i < data.aaDani.length; i++) {
			          dani_historico_pulsar.push(parseInt(data.aaDani[i]['Dani']));  
			          label_dani.push(i);           	                
					}
            	  	for (var i = 0; i < data.aaElena.length; i++) {
			      	  elena_historico_pulsar.push(parseInt(data.aaElena[i]['Elena']));  
			      	  label_elena.push(i);           	                
					}

					var usuario = data.usuario['usuario'];  


					 if(usuario == 1){ 
					 	var valores1 = elena_historico_pulsar;
					 	var label1 = label_elena;
					 	var valores2 = dani_historico_pulsar;
					 	var label2 = label_dani;
					 } else {
					 	var valores1 = dani_historico_pulsar;
					 	var label1 = label_dani;
					 	var valores2 = elena_historico_pulsar;
					 	var label2 = label_elena;
					 };

					// GRAFICO  1
			        //- LINE CHART -
			        //--------------
			        // Get context with jQuery - using jQuery's .get() method.
			        var areaChartCanvas = $("#myChart1").get(0).getContext("2d");
			        // This will get the first returned node in the jQuery collection.
			        var areaChart = new Chart(areaChartCanvas);
			        var areaChartData = {
			          labels: label1,
					  datasets: [
					        {
					            label: "Mi histórico",
					            fillColor: "rgba(151,187,205,0.2)",
					            strokeColor: "rgba(151,187,205,1)",
					            pointColor: "rgba(151,187,205,1)",
					            pointStrokeColor: "#fff",
					            pointHighlightFill: "#fff",
					            pointHighlightStroke: "rgba(151,187,205,1)",
					             data: valores1
				            }
			          ]


			        };
					          
					// GRAFICO  2
			        //- LINE CHART -
			        //--------------
			        // Get context with jQuery - using jQuery's .get() method.
			        var areaChartCanvas2 = $("#myChart2").get(0).getContext("2d");
			        // This will get the first returned node in the jQuery collection.
			        var areaChart2 = new Chart(areaChartCanvas2);
			        var areaChartData2 = {
			          labels: label2,
					  datasets: [
					        {
				              label: "Su histórico",
				              fillColor: "rgba(210, 214, 222, 1)",
				              strokeColor: "rgba(210, 214, 222, 1)",
				              pointColor: "rgba(210, 214, 222, 1)",
				              pointStrokeColor: "#c1c7d1",
				              pointHighlightFill: "#fff",
				              pointHighlightStroke: "rgba(220,220,220,1)",
				              data: valores2
				            }
			          ]
			        };
			        			          console.log(valores1);
			        			          console.log(valores2);

						var areaChartOptions = {
				          scaleOverride : true,
				          scaleSteps : 10,
				          scaleStepWidth : 10,
				          scaleStartValue : 0,
				          //Boolean - If we should show the scale at all
				          showScale: true,
				          //Boolean - Whether grid lines are shown across the chart
				          scaleShowGridLines: true,
				          //String - Colour of the grid lines
				          scaleGridLineColor: "rgba(0,0,0,.05)",
				          //Number - Width of the grid lines
				          scaleGridLineWidth: 1,
				          //Boolean - Whether to show horizontal lines (except X axis)
				          scaleShowHorizontalLines: true,
				          //Boolean - Whether to show vertical lines (except Y axis)
				          scaleShowVerticalLines: true,
				          //Boolean - Whether the line is curved between points
				          bezierCurve: true,
				          //Number - Tension of the bezier curve between points
				          bezierCurveTension: 0.3,
				          //Boolean - Whether to show a dot for each point
				          pointDot: true,
				          //Number - Radius of each point dot in pixels
				          pointDotRadius: 4,
				          //Number - Pixel width of point dot stroke
				          pointDotStrokeWidth: 1,
				          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				          pointHitDetectionRadius: 20,
				          //Boolean - Whether to show a stroke for datasets
				          datasetStroke: true,
				          //Number - Pixel width of dataset stroke
				          datasetStrokeWidth: 2,
				          //Boolean - Whether to fill the dataset with a color
				          datasetFill: true,
				          //String - A legend template
				          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
				          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				          maintainAspectRatio: true,
				          //Boolean - whether to make the chart responsive to window resizing
				          responsive: true
				        };

				        //Create the line chart
				        areaChart.Line(areaChartData, areaChartOptions);
				        areaChart2.Line(areaChartData2, areaChartOptions);

				        //-------------
				        //- LINE CHART -
				        //--------------
		

	           }
	          else
	          {
	          _open_bootbox('<p>' + data.msg +  '</p>');
	          }
	     }
	     
	 })
	 .fail(function( jqXHR, textStatus, errorThrown ) {
	     if ( console && console.log ) {
	         console.log( "La solicitud a fallado: " +  textStatus);
	     }
	  });
	}

	


	pulsar();
	historico_pulsar();




	function anadir_pulsar(valor)
	{
		var postData = {valor: valor};

	  $.ajax({
	      url: "anadir_pulsar/",
	      dataType: 'json',
	      type: 'POST',
	      data : postData,
	  })
	  .done(function( data, textStatus, jqXHR ) {
	    if ( console && console.log ) {
	      console.log( "La solicitud se ha completado correctamente." );
	        if(data.status == "OK")
	            {
	            	_open_bootbox('<p>Nuea valoración añadida correctamente</p>');

	                setTimeout("location.href = 'pulsometro'"); // milliseconds, so 2 seconds 
	            }
	            else
	            {	 console.log(data.msg);	 }
	    }
	  })
	  .fail(function( jqXHR, textStatus, errorThrown ) {
	    if ( console && console.log ) {
	      console.log( "La solicitud a fallado: " +  textStatus);
	    }
	  });


	}

function _open_bootbox(message)
{
  bootbox.alert({
      message: message,
      callback: function () {
      },
      className: 'bootbox-sm'
  }).on('hidden.bs.modal', function (e) {
      if($('.modal.in').length > 0){
          $('body').addClass('modal-open');
      }
  });
}

</script>
