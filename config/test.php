<?php
include 'helper.db2.php';


$bd = new helper();

$nombre = 'Melisa Vargas'; $mail="meli@mail.com"; $pass='meli21'; $tipo='ADMINISTRADOR';
//$dato = $bd->create($nombre, $mail, $pass, $tipo);//var_dump($dato);

$array = array(
    'user_id' => '163',
    'time' => time()
    );
//var_dump($array);
$user_id = $array['user_id'];$time = $array['time'];
//echo $user_id;echo $time;
//$attempt = $bd->insert_attempt($array);

$check = $bd->check_brute(22);
var_dump($check);



?>