
<?php
require('./config/helper.db2.php');
$help =  new helper();

            $operacion =  $_POST["operacao"];
            $id = $_POST["id"]; // lo parseamos para recibirlo con php
            $nombre = $_POST["usuario"];
            $mail = $_POST["mail"];
          
            $tipo = $_POST["tipo"];
            if($operacion == "Edit"){
                $upadd = $help->update($id, $nombre, $mail, $tipo); // y al final invocamos la funcion php con el parametro.
            }else if($operacion == "Add"){
                $pass = $_POST["pass"];
                $upadd = $help->create($nombre, $mail, $pass, $tipo); // y al final invocamos la funcion php con el parametro.
            }else{
                return 0;
            }
            
            
        		


?>