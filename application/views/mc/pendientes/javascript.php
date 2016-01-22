<script>

/*
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
*/

function pendientes() {
  $.ajax({
      url: "trae_pendientes/",
      dataType: 'json',
      type: 'POST',
  })
 .done(function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
    	 html_dani ='';   
    	 html_elena ='';   
    	 html_saloa ='';   
          if(data.status == "OK")
          {
              for (var i = 0; i < data.aaData.length; i++) {
                var asignado = data.aaData[i].asignado; 
                var asignado_foto = data.aaData[i].asignado_foto; 
                var titulo = data.aaData[i].titulo; 
                var descripcion = data.aaData[i].descripcion; 
                var activada = data.aaData[i].activada; 
                var clase = data.aaData[i].clase; 
                var fecha = data.aaData[i].creada; 
								if(asignado == 'Dani'){
	                html_dani += '<div class="col-md-12"><div class="box box-'+ clase +' box-solid"><div class="box-header with-border">';
	                html_dani += '<h3 class="box-title">' + titulo + '</h3><div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
	                html_dani += '</div></div>';
	                html_dani += '<div class="box-body" style="display: block;">';
	                html_dani += '<p>' + descripcion +'</p>';
	                html_dani += '<div class="asignado"> Asignado a '+ asignado +'</div>';
	                html_dani += '</div></div></div>';
	                $('#pendientes_dani').html(html_dani);
              	}								
	            	if(asignado == 'Elena'){
		              html_elena += '<div class="col-md-12"><div class="box box-'+ clase +' box-solid"><div class="box-header with-border">';
		              html_elena += '<h3 class="box-title">' + titulo + '</h3><div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
		              html_elena += '</div></div>';
		              html_elena += '<div class="box-body" style="display: block;">';
		              html_elena += '<p>' + descripcion +'</p>';
		              html_elena += '<div class="asignado"> Asignado a '+ asignado +'</div>';
		              html_elena += '</div></div></div>';
	                $('#pendientes_elena').html(html_elena);
	          		}
				        if(asignado == 'Saloa'){
				            html_saloa += '<div class="col-md-12"><div class="box box-'+ clase +' box-solid"><div class="box-header with-border">';
				            html_saloa += '<h3 class="box-title">' + titulo + '</h3><div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
				            html_saloa += '</div></div>';
				            html_saloa += '<div class="box-body" style="display: block;">';
				            html_saloa += '<p>' + descripcion +'</p>';
				            html_saloa += '<div class="asignado"> Asignado a '+ asignado +'</div>';
				            html_saloa += '</div></div></div>';
				            $('#pendientes_saloa').html(html_saloa);
				      	}
              }
					} else	{
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

pendientes();


$('#abre-modal').on('click', abre_modal);
function abre_modal()
{
    $('#abreModal').modal();
    $('#descripcion').wysihtml5();

}


$('#guarda-pendientes').on('click', anadir_pendientes);
function anadir_pendientes()
{
  var postData = $('#anadir-form').serialize()

  $.ajax({
      url: "anadir_pendientes/",
      dataType: 'json',
      type: 'POST',
      data : postData,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      console.log( "La solicitud se ha completado correctamente." );
        if(data.status == "OK")
            {
                setTimeout("location.href = 'pendientes'",2000); // milliseconds, so 2 seconds 
                $('#correcto').html("Tema pendiente enviada correctamente");

            }
            else
            {
	            console.log(data.msg);
	            if (typeof data.msg.titulo != 'undefined') {
	            	$('#error-titulo').append(data.msg.titulo);
	              $("#titulo").css({ border: "1px red solid" });
	            }
	            if (typeof data.msg.enlace != 'undefined') {
	              $('#error-enlace').append(data.msg.enlace);
	              $("#enlace").css({ border: "1px red solid" });
	            }
	            if (typeof data.msg.foto != 'undefined') {   
	              $('#error-foto').append(data.msg.foto);
	              $("#inputImagen").css({ border: "1px red solid" });
	            }
            }
            
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log( "La solicitud a fallado: " +  textStatus);
    }
  });


}







</script>
