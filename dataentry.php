<?php include('M9/M9.php'); M9::start(); ?>
<?php

$time = $_POST['time'];
$a0 = $_POST['a0'];
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];

database::preparedInsert("INSERT INTO `herocapture`.`herodata` (`collectionid`, `sessionid`, `date`, `time`, `analog0`, `analog1`, `analog2`, `analog3`, `analog4`, `analog5`) VALUES (NULL, '2', CURRENT_TIMESTAMP, ?, ?, ?, ?, ?, ?, ?)", array($time, $a0, $a1, $a2, $a3, $a4, $a5));
 ?>
