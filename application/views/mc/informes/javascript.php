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

function informes() {
  $.ajax({
      url: "trae_informes/",
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
                var autor = data.aaData[i].autor; 
                var titulo = data.aaData[i].titulo; 
                var sintomas = data.aaData[i].sintomas; 
                var tratamiento = data.aaData[i].tratamiento; 
                var tipo = data.aaData[i].etiqueta; 
                var fechaInicio = data.aaData[i].fechaInicio; 
                var fechaFin = data.aaData[i].fechaFin; 
                var clase = data.aaData[i].clase; 

                if (autor == 'Dani') {
                  html_dani += '<div class="panel box box-' + clase + '"><div class="box-header with-border"><h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'+i+'" class="collapsed" aria-expanded="false">';
                  html_dani += titulo +'</a></h4>  <p class="right ">' + fechaInicio + '</p></div>';
                  html_dani += '<div id="collapse'+i+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                  html_dani += '<div class="box-body"><dt>Tipo: </dt>'+ tipo +'</dt><dt>Sintomas: </dt>'+ sintomas +'</dt><dt>Tratamiento: </dt>'+ tratamiento +'</div></div></div>';
                  $('#informes_Dani').html(html_dani);
                };
                if (autor == 'Elena') {
                  html_elena += '<div class="panel box box-' + clase + '"><div class="box-header with-border"><h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse'+i+'" class="collapsed" aria-expanded="false">';
                  html_elena += titulo +'</a></h4>  <p class="right ">' + fechaInicio + '</p></div>';
                  html_elena += '<div id="collapse'+i+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                  html_elena += '<div class="box-body"><dt>Tipo: </dt>'+ tipo +'</dt><dt>Sintomas: </dt>'+ sintomas +'</dt><dt>Tratamiento: </dt>'+ tratamiento +'</div></div></div>';
                  $('#informes_Elena').html(html_elena);
                };

                if (autor == 'Saloa') {
                  html_saloa += '<div class="panel box box-' + clase + '"><div class="box-header with-border"><h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapse'+i+'" class="collapsed" aria-expanded="false">';
                  html_saloa += titulo +'</a></h4>  <p class="right ">' + fechaInicio + '</p></div>';
                  html_saloa += '<div id="collapse'+i+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                  html_saloa += '<div class="box-body"><dt>Tipo: </dt>'+ tipo +'</dt><dt>Sintomas: </dt>'+ sintomas +'</dt><dt>Tratamiento: </dt>'+ tratamiento +'</div></div></div>';
                  $('#informes_Saloa').html(html_saloa);
                };

              };

                var num_urgencias_dani = data.aaData[0].num_urgencias_dani.idInformes; 
                var num_cabecera_dani = data.aaData[0].num_cabecera_dani.idInformes; 
                var num_otros_dani = data.aaData[0].num_otros_dani.idInformes; 
                if (num_urgencias_dani == 0) {num_urgencias_dani = 0};
                if (num_cabecera_dani == 0) {num_cabecera_dani = 0};
                if (num_otros_dani == 0) {num_otros_dani = 0};
                $('#num_urgencias_dani').html(num_urgencias_dani);
                $('#num_cabecera_dani').html(num_cabecera_dani);
                $('#num_otros_dani').html(num_otros_dani);


                var num_urgencias_elena = data.aaData[0].num_urgencias_elena.idInformes; 
                var num_cabecera_elena = data.aaData[0].num_cabecera_elena.idInformes; 
                var num_otros_elena = data.aaData[0].num_otros_elena.idInformes; 
                if (num_urgencias_elena == 0) {num_urgencias_elena = 0};
                if (num_cabecera_elena == 0) {num_cabecera_elena = 0};
                if (num_otros_elena == 0) {num_otros_elena = 0};
                $('#num_urgencias_elena').html(num_urgencias_elena);
                $('#num_cabecera_elena').html(num_cabecera_elena);
                $('#num_otros_elena').html(num_otros_elena);

                var num_crisis_saloa = data.aaData[0].num_crisis_saloa.idInformes; 
                var num_urgencias_saloa = data.aaData[0].num_urgencias_saloa.idInformes; 
                var num_cabecera_saloa = data.aaData[0].num_cabecera_saloa.idInformes; 
                var num_otros_saloa = data.aaData[0].num_otros_saloa.idInformes; 
                if (num_crisis_saloa == 0) {num_crisis_saloa = 0};
                if (num_urgencias_saloa == 0) {num_urgencias_saloa = 0};
                if (num_cabecera_saloa == 0) {num_cabecera_saloa = 0};
                if (num_otros_saloa == 0) {num_otros_saloa = 0};
                $('#num_crisis_saloa').html(num_crisis_saloa);
                $('#num_urgencias_saloa').html(num_urgencias_saloa);
                $('#num_cabecera_saloa').html(num_cabecera_saloa);
                $('#num_otros_saloa').html(num_otros_saloa);

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

informes();

$('#abre-modal').on('click', abre_modal);
function abre_modal()
{
    $('#abreModal').modal();
    $('#tratamiento').wysihtml5();
$('.input-group.date').datepicker({});

/*MEJORAR no funciona el datepicker*/
}


$('#guarda-informe').on('click', anadir_informe);
function anadir_informe()
{
   
  var postData = $('#anadir-form').serialize()
  console.log(postData);
  $.ajax({
      url: "anadir_informe/",
      dataType: 'json',
      type: 'POST',
      data : postData,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      console.log( "La solicitud se ha completado correctamente." );
        if(data.status == "OK")
            {
                setTimeout("location.href = 'informes'",1000); // milliseconds, so 2 seconds 
                $('#correcto').html("Informe enviado correctamente");

            }
            else
            {
	            if (typeof data.msg.titulo != 'undefined') {
	            	$('#error-titulo').append(data.msg.titulo);
	              $("#titulo").css({ border: "1px red solid" });
	            }
	            if (typeof data.msg.sintomas != 'undefined') {
	              $('#error-sintomas').append(data.msg.sintomas);
	              $("#sintomas").css({ border: "1px red solid" });
	            }
              if (typeof data.msg.tipo != 'undefined') {   
                $('#error-tipo').append(data.msg.tipo);
                $("#tipo").css({ border: "1px red solid" });
              }
              if (typeof data.msg.quien != 'undefined') {   
                $('#error-quien').append(data.msg.quien);
                $("#quien").css({ border: "1px red solid" });
              }
              if (typeof data.msg.fechaInicio != 'undefined') {   
                $('#error-fechaInicio').append(data.msg.fechaInicio);
                $("#fechaInicio").css({ border: "1px red solid" });
              }
              if (typeof data.msg.fechaFin != 'undefined') {   
                $('#error-fechaFin').append(data.msg.fechaFin);
                $("#fechaFin").css({ border: "1px red solid" });
              }
              if (typeof data.msg.tratamiento != 'undefined') {   
                $('#error-tratamiento').append(data.msg.tratamiento);
                $("#tratamiento").css({ border: "1px red solid" });
              }
            }

    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log( "La solicitud a fallado: " +  textStatus +errorThrown);
      console.log(data);
    }
  });
}


/* MEJORAR Funcion para traer los tipos de informe de la bbdd
$('#tipo').change(function() {
    $.ajax({
        url: "trae_tipos_informe/",
        dataType: 'json',
        type: 'POST',
    })
   .done(function( data, textStatus, jqXHR ) {
       if ( console && console.log ) {
          html ='';   

  console.log(data);
            if(data.status == "OK")
            {
                 $.each(data,function(i){
                                htmlString="<option value='"+data[i]['item_id']+"'>'"+data[i]['item_name']+"'</option>"
                 });
                 $("#tipo").html(htmlString);
             }
       }
   })
   .fail(function( jqXHR, textStatus, errorThrown ) {
       if ( console && console.log ) {
           console.log( "La solicitud a fallado: " +  textStatus);
       }
    });
});
*/
</script>
