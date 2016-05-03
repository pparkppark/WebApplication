<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="stylesheet" href="http://localhost/style.css" type="text/css" media="screen" title="no title" charset="utf-8">

    <link href="http://localhost/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <title></title>
  </head>
  <body>
    <div class="container">
      <header class="jumbotron text-center">
        <h1><a href="http://localhost/index.php">JavaScript</a></h1>
      </header>
      <div class="row">
        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
            <?php
            while( $row = mysqli_fetch_assoc($result) ) {
              echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
            }
            ?>
          </ol>
        </nav>
        <div class="col-md-9">
          <article>
            <?php
            if(empty($_GET['id']) === false) {
              $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
              echo strip_tags($row['description'], '<a><h1><h2><h3><h4><ul><ol><li>');
            }
            ?>
          </article>
          <hr>
          <div id="control">
            <div class="btn-group" role="group" aria-label="...">
              <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default btn-lg"/>
              <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default btn-lg"/>
            </div>
            <a href="http://localhost/write.php" class="btn btn-success btn-lg">쓰기</a>
          </div>
        </div>
      </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  </body>
</html>
