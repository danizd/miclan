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

function noticias() {
  $.ajax({
      url: "trae_noticias/",
      dataType: 'json',
      type: 'POST',
  })
 .done(function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
        html ='';   
          if(data.status == "OK")
          {
              for (var i = 0; i < data.aaData.length; i++) {
                var autor = data.aaData[i].autor; 
                var autor_foto = data.aaData[i].autor_foto; 
                var titulo = data.aaData[i].titulo; 
                var descripcion = data.aaData[i].descripcion; 
                var foto = data.aaData[i].foto; 
                var enlace = data.aaData[i].enlace; 
                var fecha = data.aaData[i].creada; 


                html += '<div class="col-md-6"><div class="box box-widget"><div class="box-header with-border">';
                html += '<div class="user-block"><img class="img-circle" src="/assets/images/usuarios/'+ autor_foto +'" alt="user image">';
                html += '<span class="username"><a href="#">'+ autor +'</a></span>';
                html += '<span class="description">'+ fecha +' </span></div>';
                html += '<div class="box-tools"><button class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read"><i class="fa fa-circle-o"></i></button> <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> </div><!-- /.box-tools --> </div><!-- /.box-header -->';
                html += '<div class="box-body" style="display: block;">';
                html += '<h2><a href="' + enlace +'">' + titulo +'</a></h2>';
                html += '<img class="img-responsive pad" src="/assets/images/noticias/' + foto +'" alt="Photo">';
                html += '<p>' + descripcion +'</p>';
                html += '<p> <a href="' + enlace +'">Enlace</a></p>';
                html += '</div></div></div>';

                $('#noticias').html(html);
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

noticias();


$('#abre-modal').on('click', abre_modal);
function abre_modal()
{
    $('#abreModal').modal();
}


$('#guarda-noticia').on('click', anadir_noticia);
function anadir_noticia()
{
  var formElement = $("#anadir-form").get(0);
  var postData = new FormData(formElement);
  files = $('#inputImagen').get(0).files;
  if(files.length > 0)
  {
      $.each(files, function(key, value)
      {
          postData.append(key, value);
      });
  }
  $.ajax({
      url: "anadir_noticias/",
      dataType: 'json',
      type: 'POST',
      data : postData,
      processData: false, // Don't process the files
      contentType: false, // Set content type to false as jQuery will tell the server its a query string request
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      console.log( "La solicitud se ha completado correctamente." );
        if(data.status == "OK")
            {
                setTimeout("location.href = 'noticias'",2000); // milliseconds, so 2 seconds 
                $('#correcto').html("Noticia enviada correctamente");

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
