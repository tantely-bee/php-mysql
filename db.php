<?php
session_start();

$conn = mysqli_connect(
  '34.129.197.10',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
