<?php
require_once("animal.php");
require_once("ape.php");
require_once("frog.php");

echo"<h3>Release 0</h3>";
$sheep = new Animal("shaun");
echo "Name: ".$sheep->name."<br>";
echo "Legs: ".$sheep->legs."<br>";
echo "Cold Blooded: ".$sheep->cold_blooded."<br>";

echo"<h3>Release 1</h3>";
$kodok = new Frog("buduk");
echo "Name: ".$kodok->name."<br>";
echo "Legs: ".$kodok->legs."<br>";
echo "Cold Blooded: ".$kodok->cold_blooded."<br>";
echo "Yell: ".$kodok->yell()."<br>";

$sungokong = new Ape("kera sakti");
echo "<br>Name: ".$sungokong->name."<br>";
echo "Legs: ".$sungokong->legs."<br>";
echo "Cold Blooded: ".$sungokong->cold_blooded."<br>";
echo "Yell: ".$sungokong->yell()."<br>";



?>