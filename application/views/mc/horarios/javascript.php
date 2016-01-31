<script>

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }

        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();

        $('#horarios').fullCalendar({
        	weekNumbers: true,
          lang: 'es',
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'hoy',
            month: 'mes',
            week: 'semana',
            day: 'dia'
          },



					events: "trae_horarios/",

          eventDrop: function(event, delta) {
          //  alert(event.title + ' ha sido movido ' + delta + ' dias\n' + '(should probably update your database)');
        
           },
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function(date, eventObject, allDay) {
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");
            description ="";  
            backgroundColor = $(this).css("background-color");
            borderColor = $(this).css("border-color");
       
            title=copiedEventObject.title; 
            start= date.format(); 
            end= date.format(); 
            description=''; 
            allDay='';
            anadir_horario(title, start, end, description, allDay, backgroundColor, borderColor);


            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#horarios').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          },


          eventClick: function (calEvent, jsEvent, view) {     

            bootbox.confirm("¿Estás segura de que quieres borrar este horario " + calEvent.title + "?", function(result) {
              if (result == true) {
                $('#horarios').fullCalendar('removeEvents', calEvent._id);
                console.log(date);
                start= calEvent.start.format(); 
                title=calEvent.title; 
                elimina_horario(title, start);   
              };
            }); 
          }

        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                    console.log(event);

          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");


        });

        function anadir_horario(title, start, end, description, allDay, backgroundColor, borderColor) {
          postData = {'title': title, 'start': start ,'end': end, 'description': "", 'allDay': false, 'backgroundColor': backgroundColor , 'borderColor': borderColor};
          $.ajax({
              url: 'anadir_horario/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Añadido correctamente');
              }
          });
        }     

        function elimina_horario(title, start) {
          postData = {'title': title, 'start': start};
          $.ajax({
              url: 'elimina_horario/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Eliminado correctamente');
              }
          });
        }

       
        function trae_semanas()
        {
          $.ajax({
              url: "trae_semanas/",
              dataType: 'json',
              type: 'POST',
          })
          .done(function( data, textStatus, jqXHR ) {
            if ( console && console.log ) {
              console.log( "La solicitud se ha completado correctamente." );
                    if ( console && console.log ) {
            	        html ='';   
            	          if(data.status == "OK")
            	          {
                          var labels = [];
                          var datas = [];
                          html += '<div class="box box-primary"><div class="box-body"><ul class="nav nav-pills nav-stacked">';
                          html += '<li class="titulo"><span class="semanas">Número de Semana</span><span class="semanas pull-right">Horas</span></li>';

                  
            	              for (var i = 0; i < data.aaData.length; i++) {

            		              var etiqueta = data.aaData[i].etiqueta; 
                              var valor = data.aaData[i].valor; 
                              if (valor > 30) {
                                clase = 'green';
                              }else{
                                clase = 'red';
                              };
                              labels[i] = data.aaData[i].etiqueta; 
                              datas[i] = data.aaData[i].valor; 

                              html += '<li>' + etiqueta + '<span class="pull-right text-'+clase+'">' + valor + '</span></li>';

                        }
                              html += '</ul></div></div>'; 
                              $('#semanas').html(html);
                  
                  
  //-------------
        //- BAR CHART -
        //-------------

        var areaChartData = {
          labels: labels,
          datasets: [

            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: datas
            }
          ]
        };



        var barChartCanvas = $("#barChart").get(0).getContext("2d");

        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[0].fillColor = "#00a65a";
        barChartData.datasets[0].strokeColor = "#00a65a";
        barChartData.datasets[0].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);














            	              
            	            }
            	          else
            	          {
            	          _open_bootbox('<p>' + data.msg +  '</p>');
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
        trae_semanas()
        
				
				$('#anadir-semana').on('click', anadir_semana);
        function anadir_semana() {
        	var etiqueta = $('#etiqueta').val();
        	var valor = $('#valor').val();
        	var postData = {etiqueta: etiqueta, valor: valor};
          $.ajax({
              url: 'anadir_semana/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Añadido correctamente');
                  trae_semanas()
              }
          });
        }     

        function elimina_horario(title, start) {
          postData = {'title': title, 'start': start};
          $.ajax({
              url: 'elimina_horario/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Eliminado correctamente');
              }
          });
        }




</script>