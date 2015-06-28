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

  audio.appendTo('#player_box'); 

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
    
    if(songs[song] == ""){
      remove_song();
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

  $("#addlist").click(function(){
    var newlist = $("#list")[0].value.split("\n");
    songs = songs.concat(newlist);
    update_list();
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

  function update_list(){
    localStorage.setItem("playlist", songs);
  }

  function remove_song(){
    console.log("Removing: " + songs[song]);
    songs.splice(song, 1);
    update_list();
    skip(1);
  }

  $("#rmsong").click(function(){remove_song();});

  hide_wins($("#controls"));


  //progress bar
  function progress_bar(){
    var player = $("#player")[0];
    setInterval(function(){
      var percent = Math.round(player.currentTime/player.duration*100);
      $("#progress").css("width",percent+"%");
      
      var song_length = SecondsAsTime(player.duration);
      var current_time = SecondsAsTime(player.currentTime);
      $("#progress").html(current_time + "/" + song_length);
    },1000,player);
  }

  progress_bar();

  function SecondsAsTime(secs) {
    var hr  = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

    if (min < 10){ 
      min = "0" + min; 
    }
    if (sec < 10){ 
      sec  = "0" + sec;
    }

    return min + ':' + sec;
  }
});

