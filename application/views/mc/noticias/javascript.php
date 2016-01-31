<script>

 
  $('#btn').click(function(){
     enlace = $('#box').val();
    $('#result').fadeIn(400);
    $("#result").oembed(enlace, 
                        {
                        embedMethod: "fill", // you can use .. fill , auto , replace
                        maxWidth: 300,
                        });  
    $('#box').val("");
    $('#btn2').fadeIn(1500);

  });

    $("#btn2").click(function(){
    	anadir_noticia();
    });



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

function anadir_noticia()
{
	
	var descripcion = $( "#result" ).html();
	var postData = {enlace: enlace, descripcion : descripcion };

  $.ajax({
      url: "anadir_noticias/",
      dataType: 'json',
      type: 'POST',
      data : postData,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      console.log( "La solicitud se ha completado correctamente." );
        if(data.status == "OK")
            {
                setTimeout("location.href = 'noticias'",1000); // milliseconds, so 2 seconds 
                $('#correcto').html("Noticia enviada correctamente");

            }
            else
            {
	            console.log(data.msg);

            }
            
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log( "La solicitud a fallado: " +  textStatus);
    }
  });


}



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
		            var idNoticia = data.aaData[i].idNoticia; 
		            var autor = data.aaData[i].autor; 
	                var autor_foto = data.aaData[i].autor_foto; 
	                var descripcion = data.aaData[i].descripcion; 
	                var enlace = data.aaData[i].enlace; 
	                var fecha = data.aaData[i].creada; 


	                html += '<div class="col-md-6"><div class="box box-widget"><div class="box-header with-border">';
	                html += '<div class="user-block"><img class="img-circle" src="/assets/images/usuarios/'+ autor_foto +'" alt="user image">';
	                html += '<span class="username"><a href="#">'+ autor +'</a></span>';
	                html += '<span class="description">'+ fecha +' </span></div>';
	                html += '<div class="box-tools"><button class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read"><i class="fa fa-circle-o"></i></button> <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> </div><!-- /.box-tools --> </div><!-- /.box-header -->';
	                html += '<div class="box-body" style="display: block;">';
	              //  html += '<h2><a href="' + enlace +'">' + titulo +'</a></h2>';
	            //    html += '<img class="img-responsive pad" src="/assets/images/noticias/' + foto +'" alt="Photo">';
	                html += '<div class="contenido-not">' + descripcion +'</div>';
	                html += '<p> <a href="' + enlace +'">Enlace</a></p>';
	               	html += '<button class=" desactiva btn btn-block btn-default btn-xs" onclick="desactiva_noticia('+ idNoticia +')">Desactiva la noticia</button>';
	                html += '</div></div></div>';

	                $('#noticias').html(html);

	              var src = $('.contenido-not embed').attr('src');
	            	$('.contenido-not embed').replaceWith(function () {
	            	    return $('<video controls src="'+ src +'" >', {
	            	        html: $(this).html()
	            	    });
	            	});
	            	                
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


	function desactiva_noticia(id)
	{
	    selected_item_id = id;
	    bootbox.confirm("¿Estas seguro/a de que quieres ocultar esta noticia?", function(result) {
	      if(result == true){
	        desactiva_noticia_confirmado();
	      }
	    }); 
	}
	function desactiva_noticia_confirmado(id) {
	  var postData = {id: selected_item_id};
	  $.ajax({
	      url: "desactiva_noticia/",
	      dataType: 'json',
	      type: 'POST',
	      data:postData
	  })
	 .done(function( data, textStatus, jqXHR ) {
	     if ( console && console.log ) {
	          if(data.status == "OK")
	          {
	          _open_bootbox('<p>Noticia desactivada</p>');
	          noticias();
	          cuenta_noticias();

	          } else  {
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


</script>