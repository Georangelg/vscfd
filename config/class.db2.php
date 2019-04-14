<?php


class db2 {
    var $conexion;
    function db2(){
        if(!isset($this->conexion)){
            $this->conexion = (db2_connect("SAMPLE", "db2admin", "root")) or die("error SQLSTATE: ".db2_conn_error());

        }else{
           //echo "you're online";
        }
    }
    
    function prepara($sql){
        $stmt = db2_prepare($this->conexion, $sql);
        return $stmt;
        //$stmt = db2_prepare($this->conexion, $sql);
        //var_dump($stmt);
    }

    function ejecuta($consulta){
        $resultado = db2_execute($consulta, array(0));
  	if(!$resultado) 
	{
        
        $err = 'DB2 Error: ' .db2_conn_error();
        print_r($err);
        //return FALSE;
	    exit;
    }
    return $resultado; 
}
        function recupera_matriz($consulta){ 
        return db2_fetch_array($consulta);
        //return db2_num_rows($consulta);
   }

    function recupera_asociativo($stmt){
        //return db2_fetch_array($stmt);
        //return false;
        //return db2_fetch_row($stmt);

        return db2_fetch_assoc($stmt); //Funcion para iterar los registros en la matrix.
        
             
    }
    
    
    
}



?>