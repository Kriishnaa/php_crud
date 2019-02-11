<?php
include 'view.php';
include_once 'view.php';
//include 'view.php';
$d=strtotime("next monday");
echo date("Y-m-d h:i:sa", $d) . "<br>";
echo date("Y/M/D h:i:s A");
echo date("Y/m/d",strtotime("next thursday"));
echo "<br>";

$txt = "krishna lad";
var_dump(explode(" ",$txt));
echo "<br>";
$arrayData = array("aa","bb","cc");
var_dump($arrayData);
var_dump(implode("@@@",$arrayData));

