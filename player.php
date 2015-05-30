<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/buttons.css">
  <script src="js/jquery.min.js"></script>
  <script src="playlist.js"></script>
  <script>
    var players=[];
    var song = 0;

    $(document).ready(function(){
       var audio = $('<audio />', {
        id : 'player',
        autoPlay : 'autoplay',
        controls : 'controls'
      });

      audio.appendTo('#controlA');  
      addSource(audio, songs[song+1]);

      skip(0);
      $("#playbtn").click(function(){
        if($("#player")[0].paused){
          $("#playbtn").html("Pause");
          $("#player").trigger('play');   
        }else{
          $("#playbtn").html("Play");
          $("#player").trigger('pause');
        };
      });

      $("#player").on('ended', function(){
        skip(1);
      });

      $("#nextbtn").click(function(){
        skip(1);
      });

      $("#backbtn").click(function(){
        skip(-1);
      });


      function skip(num){
        if(song >= songs.length && num > 0){
          song=0;
        }else if(song <= 0 && num < 0){
          song = songs.length - 1;
        }else{  
          song+=num;
        }
        $("#playbtn").html("Pause");
        $("#player").attr('src', songs[song]);
        $("#player").load();
        $("#player").trigger('play');
        
      }

      $("#volup").click(function(){
        var vol = $("#player")[0].volume;
        if(vol < 1){
          $("#player")[0].volume+=.1;
        }
      });

      $("#voldown").click(function(){
        var vol = $("#player")[0].volume;
        if(vol > 0){
          $("#player")[0].volume-=.1;
        }
      });
 
      function addSource(elem, path) {
        $('<source />').attr('src', path).appendTo(elem);
      }    
    });
  </script>
</head>
<body>
  <div id="controlA"></div>
  <div id="controls" >
    <a href="#" id="playbtn" class="myButton">Play/Pause</a><br>
    <a href="#" id="nextbtn" class="myButton">Next</a><br>
    <a href="#" id="backbtn" class="myButton">Back</a><br>
    <a href="#" id="voldown" style="width:35%;margin:0px" class="myButton">Volume Down</a>
    <a href="#" id="volup" style="width:35%;margin:0px" class="myButton">Volume Up</a><br>
  </div>
</body>
</html>
