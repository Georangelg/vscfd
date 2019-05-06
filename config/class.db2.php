<?php
class db2
{
    public $conexion;
    public function db2()
    {
        if (!isset($this->conexion)) {
            $this->conexion = (db2_connect("SAMPLE", "db2admin", "root")) or die("error SQLSTATE: " . db2_conn_error());
        }
    }

    public function prepara($sql)
    {
        $stmt = db2_prepare($this->conexion, $sql);
        return $stmt;
    }

    public function ejecuta($consulta)
    {
        $resultado = db2_execute($consulta, array(0));
        if (!$resultado) {

            $err = 'DB2 Error: ' . db2_conn_error();
            print_r($err);
            exit;
        }
        return $resultado;
    }
    public function recupera_matriz($consulta)
    {
        return db2_fetch_array($consulta);
    }

    public function recupera_asociativo($stmt)
    {
        return db2_fetch_assoc($stmt); //Funcion para iterar los registros en la matrix.
    }
    public function result(){
        
    }
    public function pinta_renglon($stmt){
        return db2_fetch_row($stmt);
    }
    public function cuenta_row($stmt){
        if(!$stmt){
            return db2_num_rows($stmt);
        }else{
            return false;
        }
        
    }
}
