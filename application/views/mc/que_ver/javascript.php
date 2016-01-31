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
      anadir_quever();
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

function anadir_quever()
{
  
  var descripcion = $( "#result" ).html();
  var postData = {enlace: enlace, descripcion : descripcion };

  $.ajax({
      url: "anadir_quever/",
      dataType: 'json',
      type: 'POST',
      data : postData,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      console.log( "La solicitud se ha completado correctamente." );
        if(data.status == "OK")
            {
                setTimeout("location.href = 'quever'",1000); // milliseconds, so 2 seconds 
                $('#correcto').html("Película o serie enviada correctamente");

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



function quever() {
    $.ajax({
        url: "trae_quever/",
        dataType: 'json',
        type: 'POST',
    })
   .done(function( data, textStatus, jqXHR ) {
       if ( console && console.log ) {
          html ='';   
            if(data.status == "OK")
            {
                for (var i = 0; i < data.aaData.length; i++) {
                  var idQuever = data.aaData[i].idQuever; 
                  var autor = data.aaData[i].autor; 
                  var autor_foto = data.aaData[i].autor_foto; 
                  var descripcion = data.aaData[i].descripcion; 
                  var enlace = data.aaData[i].enlace; 
                  var descargada = data.aaData[i].descargada; 
                  var vista = data.aaData[i].vista; 
                  var enlace = data.aaData[i].enlace; 
                  var fecha = data.aaData[i].creada; 


                  html += '<div class="col-md-6"><div class="box box-widget"><div class="box-header with-border">';
                  html += '<div class="user-block"><img class="img-circle" src="/assets/images/usuarios/'+ autor_foto +'" alt="user image">';
                  html += '<span class="username"><a href="#">Recomendado por '+ autor +'</a></span>';
                  html += '<span class="description">'+ fecha +' </span></div>';
                  html += '<div class="box-tools"><button class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read"><i class="fa fa-circle-o"></i></button> <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> </div><!-- /.box-tools --> </div><!-- /.box-header -->';
                  html += '<div class="box-body" style="display: block;">';
                  html += '<div class="contenido-quever">' + descripcion +'</div>';
                  html += '<p> <a href="' + enlace +'">Enlace</a></p>';
                   // html += '<button class=" desactiva btn btn-block btn-default btn-xs" onclick="desactiva_noticia('+ idQuever +')">Desactiva la pelicula o serie</button>';

                  if (descargada == 0) {
                    html += '<button type="button" onclick="descargada_quever('+ idQuever +')" class="btn btn-danger">No Descargada</button>';
                  }else{
                    html += '<button type="button" class=" sincursor btn btn-success">Descargada</button>';
                  };
                  if (vista == 0) {
                    html += '<button type="button" onclick="vista_quever('+ idQuever +')" class="btn btn-danger">No Vista</button>';
                  }else{
                    html += '<button type="button" class="sincursor btn btn-success">Vista</button>';
                  };

                  html += '</div></div></div>';

                  $('#quever').html(html);                              
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

  quever();


  function descargada_quever(id)
  {
      selected_item_id = id;
      bootbox.confirm("¿Estas seguro/a de que descargaste esta película o serie?", function(result) {
        if(result == true){
          descargada_quever_confirmado();
        }
      }); 
  }
  function descargada_quever_confirmado(id) {
    var postData = {id: selected_item_id};
    $.ajax({
        url: "descargada_quever/",
        dataType: 'json',
        type: 'POST',
        data:postData
    })
   .done(function( data, textStatus, jqXHR ) {
       if ( console && console.log ) {
            if(data.status == "OK")
            {
         //   _open_bootbox('<p>Película o serie marcada como descargada</p>');
            quever();
            cuenta_quever();

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

  function vista_quever(id)
  {
      selected_item_id = id;
      bootbox.confirm("¿Estas seguro/a de que viste esta película o serie?", function(result) {
        if(result == true){
          vista_quever_confirmado();
        }
      }); 
  }
  function vista_quever_confirmado(id) {
    var postData = {id: selected_item_id};
    $.ajax({
        url: "vista_quever/",
        dataType: 'json',
        type: 'POST',
        data:postData
    })
   .done(function( data, textStatus, jqXHR ) {
       if ( console && console.log ) {
            if(data.status == "OK")
            {
        //    _open_bootbox('<p>Película o serie marcada como vista</p>');
            quever();
            cuenta_quever();

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