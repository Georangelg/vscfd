<?php

include 'class.db2.php';
class cfdiBD extends db2{
    var $code = "";

    public function selectAnimal($ID){
        
        //consulta->db2_execute



     
        $qry="SELECT id, breed, name, weight FROM  DB2ADMIN.ANIMALS where ID ='".$ID."'";
            $stmt =  parent::prepara($qry);
            $regs = parent::recupera_matriz($stmt);
            $result = parent::ejecuta($stmt);
        if($regs>0){
       
            $i=0;
            $animals = array();
           


            
         
            if($result){
            echo    "datos!";
            }

            while ($row = parent::recupera_asociativo($stmt)) {
            printf ("%-5d %-16s %-32s %10s<br><br>", 
            $row['ID'], $row['NAME'], $row['BREED'], $row['WEIGHT']);
            $i++;
            }
            
        }else{
            echo "estoy callendo aqui";
            return false;
        }
    }

}

?>