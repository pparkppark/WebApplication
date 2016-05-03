<?php
$config = array(
  "host" => "localhost",
  "duser" => "root",
  "dpw" => "xmdnlr11",
  "dname" => "opentutorials_2"
);

function db_init($host, $duser, $dpw, $dname) {
  $conn = mysqli_connect($host, $duser, $dpw);
  mysqli_select_db($conn, $dname);

  return $conn;
}

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM `topic`");
$row = mysqli_fetch_assoc($result);
print_r($row);
// while($row = mysqli_fetch_assoc($result)) {
//   echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
// }
?>
