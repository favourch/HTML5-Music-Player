<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/buttons.css">
  <script src="js/jquery.min.js"></script>
<!--  <script src="playlist.js"></script>-->
  <script>
    var players=[];
    var song = 0;
    if (localStorage.playlist) {
      var songs = localStorage.getItem("playlist").split(",");
    }else{
      var songs = ["http://s.myfreemp3.biz/p.php?q=55625769_76022732","http://s.myfreemp3.biz/p.php?q=55625769_76022692"];
    }

    $(document).ready(function(){
       var audio = $('<audio />', {
        id : 'player',
        autoPlay : 'autoplay',
        controls : 'controls'
      });

      audio.appendTo('#controlA'); 

      //get last song played and time position
      if (localStorage.currentsong) { 
        song = parseInt(localStorage.getItem("currentsong"));
      }
      addSource(audio, songs[song]);
      if (localStorage.musictime) {
        $("#player")[0].currentTime = localStorage.getItem("musictime");
      }

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

      //keep track of song position
      setInterval(function(){ 
        var time=$("#player")[0].currentTime; 
        localStorage.setItem("musictime", time);
        localStorage.setItem("currentsong", song);
      }, 1000);

      function hide_wins(show){
        $(".window").each(function(){
          $(this).hide();
        }); 

        show.show();
      }

      $("#addwin").click(function(){hide_wins($("#playenter"));});

      $("#addlist").click(function(){
        var newlist = $("#list")[0].value.split("\n");
        songs = songs.concat(newlist);
        localStorage.setItem("playlist", songs);
        console.log("adding songs");
        //console.log(songs);
        $("#list")[0].value="";
        hide_wins($("#controls"));

      });

      $("#shuffle").click(function(){shufflelist();});
      function shufflelist() {
        var array=songs;
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
        return array;
      }

      hide_wins($("#controls"));

    });
  </script>
</head>
<body>
  <div id="controlA"></div>
  <div id="controls"  class="window">
    <a href="#" id="playbtn" class="myButton">Play/Pause</a><br>
    <a href="#" id="nextbtn" class="myButton">Next</a><br>
    <a href="#" id="backbtn" class="myButton">Back</a><br>
    <a href="#" id="shuffle" class="myButton">Shuffle</a><br>
    <a href="#" id="voldown" style="width:35%;margin:0px" class="myButton">Volume Down</a>
    <a href="#" id="volup" style="width:35%;margin:0px" class="myButton">Volume Up</a><br>
    <a href="#" id="addwin" class="myButton">Add Songs</a><br>
  </div>

  <div id="playenter" class="window">
    <textarea id="list" style="width:80%;height:400px"></textarea><br>
    <a href="#" id="addlist" class="myButton">Add Songs</a><br>
  </div>
</body>
</html>
