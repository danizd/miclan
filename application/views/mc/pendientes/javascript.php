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
        html ='';   
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

                html += '<div class="col-md-4"><div class="box box-'+ clase +' box-solid"><div class="box-header with-border">';
                html += '<h3 class="box-title">' + titulo + '</h3><div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
                html += '</div></div>';
                html += '<div class="box-body" style="display: block;">';
                html += '<p>' + descripcion +'</p>';
                html += '<div class="asignado"> Asignado a '+ asignado +'</div>';
                html += '</div></div></div>';

                $('#pendientes').html(html);
              };
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

pendientes();


$('#abre-modal').on('click', abre_modal);
function abre_modal()
{
    $('#abreModal').modal();
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
