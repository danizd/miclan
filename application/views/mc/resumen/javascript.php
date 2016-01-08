<script>

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






function summary() {

  //  var id_user = document.getElementById("inputUser").value;
    var id_user = 3;
    var postData =  {'id_user': '3'};

    
        $.ajax({
            url: "<?= base_url(); ?>vcab/get_events_by_user/",
            dataType: 'json',
            type: 'POST',
            data: postData,
            success: function(data) {       
                html ='';   
                
                var myLatlng = new google.maps.LatLng(40.322740, 1.045954);
                var mapOptions = {
                  zoom: 7,
                  center: myLatlng
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                if(data.status == "OK")
                {
                    for (var i = 0; i < data.aaData.length; i++) {
                       var name = data.aaData[i].name; 
                       var image = data.aaData[i].image; 
                       var datetime = data.aaData[i].date; 
                       var array_datetime = datetime.split(" ");
                       var date = array_datetime[0];
                       var image = data.aaData[i].image; 
                       var description = data.aaData[i].description; 
                       var city = data.aaData[i].city; 
                       var country = data.aaData[i].country; 
                       var image_filter = data.aaData[i].image_filter; 
                       var layout_polaroid = data.aaData[i].layout_polaroid; 

                       var location = data.aaData[i].location;                        
                       var res = location.split(",");
                       var lat = res[0];
                       var lon = res[1];
                       var marks = [lat, lon];
  
                        var infowindow = new google.maps.InfoWindow({
                            content: name
                        });

                        
                        var marks = new google.maps.LatLng(lat, lon);
                        var marker = new google.maps.Marker({
                            position: marks,
                            map: map,
                            title: name
                        });

                       html += '<div class="panel panel-info"><div class="panel-heading">';
                       html += '<h1 class="panel-title">'+ name +'</h1>';
                       html += '<div class="panel-options"><a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a><a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a> <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a></div></div>';
                       html += '<div class="panel-body">';
                       html += '<img style="width:200px; float: left; margin-right:40px" src="/static/images/events/'  + image + '"/>' ;
                       html += '<div>Date: <strong>' + date + '</strong></div>' ;
                       html += '<div>Description: <strong>' + description + '</strong></div>' ;
                       html += '<div>Site: <strong>' + city + ', ' + country +'</strong></div>' ;
                       html += '<div>Image filter: <strong>' + image_filter + '</strong></div>' ;
                       html += '</div>' ; 

                       google.maps.event.addListener(marker, 'click', function() {
                          infowindow.open(map,marker);
                        });  
                       
                      $('#events').html(html);

                    };
                  }
                else
                {
                _open_bootbox('<h4><?= $this->lang->line('item_not_found'); ?></h4><p>' + data.msg +  '</p>');
                }
            }
        });

}
summary();
google.maps.event.addDomListener(window, 'load', summary);


</script>
