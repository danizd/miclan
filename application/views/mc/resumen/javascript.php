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
					     titulo2 = '<h4 class="box-title">Tu valoración sobre nosostros</h4>';
								 
								 
					         $('#asi').html(titulo1);
					         $('#cambia').html(titulo2);


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
			      	$('#slider2').css('left', '185px')
			      	$('#slider2').jqxSlider({ min: 0, max: 100, mode: 'fixed', ticksFrequency: 20, width: 150, value: 120,  showButtons: false });
			      	$('#slider2').mousedown(function () {
			      	    $('#gauge2').jqxGauge('value', $('#slider2').jqxSlider('value'));

			      	  var value = $("#gauge2").jqxGauge('val');
		      	 		console.log('arriba');
		      	 		console.log(value);
			      	});

			      	
			      	$('#slider2').on('slideEnd', function (e) {
			      	    $('#gauge2').jqxGauge('value', e.args.value);

				      	var value2 = $("#gauge2").jqxGauge('val');
		      	 		console.log('medio');
		      	 		console.log(value2);
			      	    
			      	});

			      	
			      	$('#slider2').on('mousewheel', function () {
			      	    $('#gauge2').jqxGauge('value', $('#slider2').jqxSlider('value'));


			      	});


			      	
							if(usuario == 1){
			      			$('#gauge2').jqxGauge('value', dani_pulsar);
							}else if(usuario == 2){
				      			$('#gauge2').jqxGauge('value', elena_pulsar);
							}else{
				      			$('#gauge2').jqxGauge('value', 0);
							}


							 $('#gauge2').jqxGauge('disable');
							 $('#jqxbutton').click(function () {
							     $('#gauge2').jqxGauge('enable');
							     $('#slider2').show();
						       $('#gauge2').on('valueChanged', function () {
								     	var valor = $("#gauge2").jqxGauge('val');
									    $('#jqxbutton').hide();
								     	console.log(valor);
											$('#envia').html('<input class="btn btn-warning btn-flat" type="button" id="envia" onclick="anadir_pulsar(' + valor +')" value="Pincha aquí para confirmar ' + valor +' como la nueva valoración" />');
								     	
									    /*	bootbox.confirm("La nueva valoracion será " + valor + ", ¿Estás de acuerdo?", function(result) {
										      if(result == true){
										        anadir_pulsar(valor);
										      }
										    }); 	*/					      
									});
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

	pulsar();




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
	                setTimeout("location.href = 'resumen'",1000); // milliseconds, so 2 seconds 
	                $('#correcto').html("Valoración guardada correctamente");
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
