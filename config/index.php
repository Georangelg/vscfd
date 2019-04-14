<?php
include 'cfdiBD.php';
$CFDIBD=new cfdiBD();


$rAnimal=$CFDIBD->selectAnimal(5);
var_dump($rAnimal);
print_r($rAnimal);
?>