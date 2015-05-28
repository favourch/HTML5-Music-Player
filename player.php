<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/buttons.css">
  <script src="js/jquery.min.js"></script>
  <script src="playlist.js"></script>
  <script>
    var song = 0;
    $(document).ready(function(){
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
    });
  </script>
</head>
<body>

  <audio controls id="player">
    <source type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <div id="controls">
    <a href="#" id="playbtn" class="myButton">Play/Pause</a><br>
    <a href="#" id="nextbtn" class="myButton">Next</a><br>
    <a href="#" id="backbtn" class="myButton">Back</a><br>
  </div>
</body>
</html>
