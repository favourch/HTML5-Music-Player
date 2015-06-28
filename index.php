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
    <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Songs<span class="glyphicon glyphicon-plus-sign"></span></a>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Song URLs Below</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>




<!--github ribon-->
<a href="https://github.com/metalx1000/HTML5-Music-Player"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/82b228a3648bf44fc1163ef44c62fcc60081495e/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png"></a>

</body>
</html>

