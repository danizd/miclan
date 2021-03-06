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

        $('#citas').fullCalendar({
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



          events: "trae_citas/",

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
            anadir_cita(title, start, end, description, allDay, backgroundColor, borderColor);


            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#citas').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          },


          eventClick: function (calEvent, jsEvent, view) {     

            bootbox.confirm("¿Estás segura de que quieres borrar este cita " + calEvent.title + "?", function(result) {
              if (result == true) {
                $('#citas').fullCalendar('removeEvents', calEvent._id);
                console.log(date);
                start= calEvent.start.format(); 
                title=calEvent.title; 
                elimina_cita(title, start);   
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

        function anadir_cita(title, start, end, description, allDay, backgroundColor, borderColor) {
          postData = {'title': title, 'start': start ,'end': end, 'description': "", 'allDay': false, 'backgroundColor': backgroundColor , 'borderColor': borderColor};
          $.ajax({
              url: 'anadir_cita/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Añadido correctamente');
                  listado_citas();
              }
          });
        }     

        function elimina_cita(title, start) {
          postData = {'title': title, 'start': start};
          $.ajax({
              url: 'elimina_cita/',
              data: postData,
              type: "POST",
              success: function (json) {
                  console.log('Eliminado correctamente');
                  listado_citas();
              }
          });
        }

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

      function listado_citas() {
        $.ajax({
            url: "trae_listado_citas/",
            dataType: 'json',
            type: 'POST',
        })
       .done(function( data, textStatus, jqXHR ) {
           if ( console && console.log ) {
             html ='';   

                if(data.status == "OK")
                {
                    for (var i = 0; i < data.aaData.length; i++) {
                      var title = data.aaData[i].title; 
                      var fecha = data.aaData[i].start; 
                      var end = data.aaData[i].end; 

                        html += '<div class="cita">';
                        html += '<p>' + title +'</p>';
                        html += '<div> Día '+ fecha +'</div>';
                        html += '</div>';
                        $('#listado-citas').html(html);      

                    }
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

      listado_citas();


</script>