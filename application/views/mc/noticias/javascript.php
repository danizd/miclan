<script>

  
  
  $('#btn').click(function(){
     text = $('#box').val();
    $('#result').fadeIn(400);
    $("#result").oembed(text, 
                        {
                        embedMethod: "fill", // you can use .. fill , auto , replace
                        maxWidth: 300,
                        });  
    $('#box').val("");
    $('#btn2').fadeIn(1500);

  });

    $("#btn2").click(function(){
     captura();
    });

function captura(){
  alert(text);

            //alert("HTML: " + $(".result").html());
}



</script>