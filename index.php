<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <h1><a href="http://localhost/index.php">JavaScript</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          echo file_get_contents("list.txt");
        ?>
      </ol>
    </nav>
    <article>
      <?php
      if(empty($_GET['id']) == false) {
        echo file_get_contents($_GET['id'].".txt");
      }
      ?>
    </article>
  </body>
</html>
