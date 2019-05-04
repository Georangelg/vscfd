<?php
require('./config/helper.db2.php');
$help =  new helper();
if(isset($_POST["id"])){//Validamos que este recibiendo el parametro id
    $id = $_POST["id"]; // lo parseamos para recibirlo con php
    $del = $help->del_ajax($id); // y al final invocamos la funcion php con el parametro.
}


?>