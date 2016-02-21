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



function archivos() {
  $.ajax({
      url: "trae_archivos/",
      dataType: 'json',
      type: 'POST',
  })
 .done(function( data, textStatus, jqXHR ) {
     if ( console && console.log ) {
        html ='';   
          if(data.status == "OK")
          {
            console.log(data.aaData);

   var datos = Array();    
   var dato = Array();    

           for (var i = 0; i < data.aaData.length; i++) {
                dato.push(data.aaData[i].titulo); 
                dato.push(data.aaData[i].descripcion); 
                dato.push(data.aaData[i].categoria);  
                dato.push(data.aaData[i].archivo); 
                dato.push(data.aaData[i].creada); 
                                          datos.push(dato);

           }




console.log(datos);
/*

var dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],

];
*/


    $('#archivos').DataTable( {
        data: datos,
        columns: [
            { title: "Titulo" },
            { title: "Descripcion" },
            { title: "categoria." },
            { title: "archivo" },
            { title: "fecha" }
        ]
    } );


/*
                html += '<div class="col-md-6"><div class="box box-widget"><div class="box-header with-border">';
                html += '<div class="user-block"><img class="img-circle" src="/assets/images/usuarios/'+ autor_foto +'" alt="user image">';
                html += '<span class="description">'+ fecha +' </span></div>';
                html += '<div class="box-tools"><button class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read"><i class="fa fa-circle-o"></i></button> <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> </div><!-- /.box-tools --> </div><!-- /.box-header -->';
                html += '<div class="box-body" style="display: block;">';
                html += '<h2>' + titulo +'</h2>';
                //html += '<img class="img-responsive pad" src="/assets/archivos/' + archivo +'" alt="archivo">';
                html += '<p>' + descripcion +'</p>';
                html += '<p> <a href="' + categoria +'">Categoría</a></p>';
                html += '</div></div></div>';
*/
               // $('#archivos').html(html);
         //    };
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

archivos();


$('#abre-modal').on('click', abre_modal);
function abre_modal()
{
    $('#abreModal').modal();
}


$('#guarda-archivo').on('click', anadir_archivo);
function anadir_archivo()
{
  var formElement = $("#anadir-form").get(0);
  var postData = new FormData(formElement);

  files = $('#inputArchivo').get(0).files;
  if(files.length > 0)
  {
      $.each(files, function(key, value)
      {
          postData.append(key, value);
      });
  }
  $.ajax({
      url: "anadir_archivos/",
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
                setTimeout("location.href = 'almacen'",1000); // milliseconds, so 2 seconds 
                $('#correcto').html("Archivo enviado correctamente");

            }
            else
            {
              console.log(data.msg);
              if (typeof data.msg.titulo != 'undefined') {
                $('#error-titulo').append(data.msg.titulo);
                $("#titulo").css({ border: "1px red solid" });
              }
              if (typeof data.msg.categoria != 'undefined') {
                $('#error-categoria').append(data.msg.categoria);
                $("#categoria").css({ border: "1px red solid" });
              }
              if (typeof data.msg.archivo != 'undefined') {   
                $('#error-archivo').append(data.msg.archivo);
                $("#inputArchivo").css({ border: "1px red solid" });
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
