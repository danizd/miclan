<script>
jQuery.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
    // DataTables 1.10 compatibility - if 1.10 then `versionCheck` exists.
    // 1.10's API has ajax reloading built in, so we use those abilities
    // directly.
    if ( jQuery.fn.dataTable.versionCheck ) {
        var api = new jQuery.fn.dataTable.Api( oSettings );
 
        if ( sNewSource ) {
            api.ajax.url( sNewSource ).load( fnCallback, !bStandingRedraw );
        }
        else {
            api.ajax.reload( fnCallback, !bStandingRedraw );
        }
        return;
    }
 
    if ( sNewSource !== undefined && sNewSource !== null ) {
        oSettings.sAjaxSource = sNewSource;
    }
 
    // Server-side processing should just call fnDraw
    if ( oSettings.oFeatures.bServerSide ) {
        this.fnDraw();
        return;
    }
 
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];
 
    this.oApi._fnServerParams( oSettings, aData );
 
    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable( oSettings );
 
        /* Got the data - add it to the table */
        var aData =  (oSettings.sAjaxDataProp !== "") ?
            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
 
        for ( var i=0 ; i<aData.length ; i++ )
        {
            that.oApi._fnAddData( oSettings, aData[i] );
        }
 
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
 
        that.fnDraw();
 
        if ( bStandingRedraw === true )
        {
            oSettings._iDisplayStart = iStart;
            that.oApi._fnCalculateEnd( oSettings );
            that.fnDraw( false );
        }
 
        that.oApi._fnProcessingDisplay( oSettings, false );
 
        /* Callback user function - for event handlers etc */
        if ( typeof fnCallback == 'function' && fnCallback !== null )
        {
            fnCallback( oSettings );
        }
    }, oSettings );
};

function reload()
{
    $('#archivos').dataTable().fnReloadAjax();
}

function set_filter(field, value)
{
    $('#' + field + '_filter').val(decodeURIComponent(value)).focus();
    $('#' + field + '_filter').val(decodeURIComponent(value)).trigger('change');
}
tabla();

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


function tabla()
{
   
    $.fn.dataTable.ext.legacy.ajax = true;

    var $table = $('#archivos');
        
    var table = $table.dataTable({

        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ archivos",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando archivos del _START_ al _END_ de un total de _TOTAL_ archivos",
            "sInfoEmpty":      "Mostrando archivos del 0 al 0 de un total de 0 archivos",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ archivos)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        
        serverSide: true,
        "ajax": {
            "url": "trae_archivos",
                
        },
        bSortCellsTop: true,
        order: [
            [ 2, 'asc' ]
        ],
        columnDefs: [
            {
                'data' : '0',
                'targets': [0]
            },
            {
                'data' : '1',
                'targets': [1]
            },
            {
                'data' : '2',
                'targets': [2]
            },
            {
                'data' : '3',
                'targets': [3]
            },
            {
                'data' : '4',
                'targets': [4]
            }

        ],

    

    
    });
console.log(table);
    $table.on('draw.dt', function () {
        $('[rel="popover-table"]').popover({trigger: 'hover'});
    } );

    var tableApi = table.api();


    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var colIdx = 3;
            var min = parseFloat($table.find('.filters td').eq(colIdx).find('[name$=from]').val());
            var max = parseFloat($table.find('.filters td').eq(colIdx).find('[name$=to]').val());
            var val = Number(data[colIdx].replace(/[^0-9\.]+/g, '')) || 0;        

            if (( isNaN(min) && isNaN(max) ) ||
                ( isNaN(min) && val <= max ) ||
                ( min <= val && isNaN(max) ) ||
                ( min <= val && val <= max )) {
                return true;
            }
            return false;
        },
        function (settings, data, dataIndex) {
            var colIdx = 1;
            var $from = $table.find('.filters td').eq(colIdx).find('[name$=from]');
            var $to = $table.find('.filters td').eq(colIdx).find('[name$=to]');

            var min = NaN;
            var max = NaN;
            var val = NaN;
            if ($from.val().match(/\d{2}\/\d{2}\/\d{4}/)) {
                min = $from.data('datepicker').getDate();
            }
            if ($to.val().match(/\d{2}\/\d{2}\/\d{4}/)) {
                max = $to.data('datepicker').getDate();
            }
            if (data[colIdx].match(/\d{2}\/\d{2}\/\d{4}/)) {
                val = $.fn.datepicker.DPGlobal.parseDate(data[colIdx], $from.data('datepicker').format);
            }

            if (( isNaN(min) && isNaN(max) ) ||
                ( isNaN(min) && val <= max ) ||
                ( min <= val && isNaN(max) ) ||
                ( min <= val && val <= max )) {
                return true;
            }
            return false;
        }
    );

    // Reset search
    $table.find('.filters .filter-cancel').on('click', function (e) {
        e.preventDefault();
        $table.find('.filters td').find('input[type=text]').val('').trigger('change');
        $table.find('.filters td').find('select').select2('val', '').trigger('change');
        tableApi.draw();
        return false;
    });

    // Apply the search
    var $cells = $table.find('.filters td');
    filterColumnSimple(0, 'input');
    filterColumnSimple(1, 'input');
    filterColumnSimple(2, 'input');
    filterColumnSimple(3, 'input');
    filterColumnSimple(4, 'input');


    //$('#table-records select.form-control').select2({minimumResultsForSearch: -1});

    function filterColumnSimple(colIdx, sel) {
        var $el = $cells.eq(colIdx).find(sel);
        $el.on('keyup change', function () {
            if(this.tagName.toLowerCase() == 'select'){
                tableApi.column(colIdx).search($(this).find('option:selected').val()).draw();
            }
            else if(this.tagName.toLowerCase() == 'input') {
                if($(this).is(":focus") == true || $('#filter-cancel').is(":focus") == true)
                {
                    tableApi.column(colIdx).search(this.value).draw();
                }
            }
        });
        if ($el.val()) {
            if($el.prop('tagName').toLowerCase() == 'select'){
                tableApi.column(colIdx).search($el.find('option:selected').val()).draw();
            }
            else if($el.prop('tagName').toLowerCase() == 'input') {
                tableApi.column(colIdx).search($el.val()).draw();
            }
        }
    }


};




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
                $("#guarda-archivo").css({ display: "none" });
                $("#cancela-archivo").css({ display: "none" });

                

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
