			
function cuenta_noticias() {
	  $.ajax({
	      url: "cuenta_noticias/",
	      dataType: 'json',
	      type: 'POST',
	  })
	 .done(function( data, textStatus, jqXHR ) {
	     if ( console && console.log ) {
	          if(data.status == "OK")
	          {
    	        numero_not = data.numero;
	            $('#num_noticias').html(numero_not)
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
cuenta_noticias();


function trae_usuario() {
	  $.ajax({
	      url: "trae_usuario/",
	      dataType: 'json',
	      type: 'POST',
	  })
	 .done(function( data, textStatus, jqXHR ) {
	     if ( console && console.log ) {
	          if(data.status == "OK")
	          {
	  	        foto = '<img src="/assets/images/usuarios/'+ data.foto +'" class="foto-perfil img-circle" alt="User Image">';
	            $('.imagen-perfil').html(foto);
	            nombre = data.nombre;
	            $('.nombre-perfil').html(nombre);
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
trae_usuario();