<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="player.js"></script>
</head>
<body>

<div class="container">
  <h2>Music Player</h2>
  <div id="player_box" style="display:none">
  </div>
  <div class="progress">
    <div id="progress" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
      Song Time
    </div>
  </div>
  <div class="btn-group btn-group-justified">
    <a href="#" id="playbtn" class="btn btn-primary btn-lg">Play/Pause <span class="glyphicon glyphicon-play"></span></a>
  </div>
  <div class="btn-group btn-group-justified">
    <a href="#" id="backbtn" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-step-backward"></span>Previous</a>
    <a href="#" id="nextbtn" class="btn btn-primary btn-lg">Next<span class="glyphicon glyphicon-step-forward"></span></a>
  </div>

  <div class="btn-group btn-group-justified">
    <a href="#" id="shuffle" class="btn btn-primary btn-lg">Shuffle <span class="glyphicon glyphicon-random"></span></a>
  </div>
  <div class="btn-group btn-group-justified">
    <a href="#" id="voldown" class="btn btn-primary btn-lg">Volume <span class="glyphicon glyphicon-volume-down"></span></a>
    <a href="#" id="volup" class="btn btn-primary btn-lg">Volume <span class="glyphicon glyphicon-volume-up"></span></a>
  </div>

  <div class="btn-group btn-group-justified">
    <a href="#" id="rmsong" class="btn btn-primary btn-lg">Remove Song<span class="glyphicon glyphicon-minus-sign"></span></a>
    <a href="#" class="btn btn-primary btn-lg">Add Songs<span class="glyphicon glyphicon-plus-sign"></span></a>
  </div>

</div>

</body>
</html>

