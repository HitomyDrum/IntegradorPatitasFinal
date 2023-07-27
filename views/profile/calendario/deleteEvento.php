<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

echo "GO";

$sqlDeleteEvento = ("DELETE FROM eventoscalendar WHERE  id='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);

?>
  