<?php
include 'class.db2.php';


/*
 * |-------------------------------------------------------
 * | Validate Input
 * |-------------------------------------------------------
 */
class helper extends db2 {
    var $conexion;
function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * |-------------------------------------------------------
 * | Display error message
 * |-------------------------------------------------------
 */
function display_error($class_name,$message) {
    echo "<div class='alert $class_name'>$message</div>";
}


/*
 * |-------------------------------------------------------
 * | Validate user login
 * |-------------------------------------------------------
 */

function validate_user($email,$password){
	//encript password to md5
	$password_s = md5($password);
	$sql = "SELECT ID,NOMBRE FROM zperezv.sys_usuarios WHERE usuario='".$email."' AND password='".$password_s."' LIMIT 1"; 
    $stmt = parent::prepara($sql);
    $result = parent::ejecuta($stmt);
    while ($row = parent::recupera_asociativo($stmt)) {
        //printf("%20s<br><br>",$row['NOMBRE']);
        $_SESSION['MEMBER_ID'] = $row['ID'];
    $_SESSION['FIRST_NAME'] = $row['NOMBRE'];
    }
    //echo"Hola";
}
/*
 * |-------------------------------------------------------
 * | LOGICA DE BASE DE DATOS
 * |-------------------------------------------------------
 */

function selectAnimalByID($ID)
{
    $query = "SELECT id, breed, name, weight FROM  DB2ADMIN.ANIMALS where ID ='" . $ID . "'";
    $stmt = parent::prepara($query);
    $result = parent::ejecuta($stmt);//no lo usamos pero es indispensable para ejecutar el deploy de los datos
    /*if ($result) {
        echo "data!";
    } else {
        echo "empty";
    }*/
    //$count_rows = parent::recupera_asociativo($stmt);
    //if ($count_rows > 0) {echo "llevo registros";} else {echo "Vacio :(";}
    while ($row = parent::recupera_asociativo($stmt)) {
        printf("%-5d %-16s %-32s %10s<br><br>",
            $row['ID'], $row['NAME'], $row['BREED'], $row['WEIGHT']);
    }
}


function selectAnimalporID($ID){
    $query = "SELECT ID, BREED, NAME, WEIGHT FROM DB2ADMIN.ANIMALS WHERE  ID= '".$ID."'";
    $stmt = parent::prepara($query);
    $result = parent::ejecuta($stmt);
    while($row = parent::recupera_asociativo($stmt)){
        printf("%-16s <br><br><br>", $row['NAME']);
        }
    }


    function get_user_id($mail){
        $query = "select ID from zperezv.sys_usuarios where USUARIO = '".$mail."'";
        $stmt = parent::prepara($query);
        $result= parent::ejecuta($stmt);
        while($row = parent::recupera_asociativo($stmt)){   
            printf("%-32d",$row['ID']);
        }
    }


    function check_brute($user_id) {
        // Get timestamp of current time 
        $now = time();
        // All login attempts are counted from the past 10 min. 
        $valid_attempts = $now - (30 * 60);
     
        $sql = "SELECT time FROM login_attempts WHERE user_id = $user_id AND time > '$valid_attempts'";
        $data = fetch_custom($sql);
        // If there have been more than 5 failed logins 
        if(count($data) > 5) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    

public function SelectAnimal()
{
    $query = "SELECT id, breed, name, weight FROM  DB2ADMIN.ANIMALS";
    $stmt = parent::prepara($query);
    $result = parent::ejecuta($stmt);
    if ($result) {
        echo "data!";
    } else {
        echo "empty";
    }
    $count_rows = parent::recupera_asociativo($stmt);
    if ($count_rows > 0) {echo "llevo registros";} else {echo "Vacio :(";}
    while ($row = db2_fetch_assoc($stmt)) {
        printf("%-5d %-16s %-32s %10s<br><br>",
            $row['ID'], $row['NAME'], $row['BREED'], $row['WEIGHT']);
    }
}
/*
function fetch_single($table,$field,$key,$value) {
    $sql = "SELECT $field FROM $table WHERE $key = '$value' LIMIT 1";
    $stmt = parent::prepara($sql);
    $result = parent::ejecuta($stmt);
    var_dump($result);
    if ($result) {
        echo "data!";
    } else {
        echo "empty";
    }	
    $row = parent::recupera_asociativo($stmt);
    return $row;
}*/

function fetch_custom($sql) {
	$stmt = parent::prepara($sql);
    $result = parent::ejecuta($stmt);
    if ($result) {
        echo "data!";
    } else {
        echo "empty";
    }	
    $row = parent::recupera_asociativo($stmt);
    return $row;
}

/*function debugg_session($email){
    $query = "select ID,NOMBRE from zperezv.sys_usuarios where USUARIO = '".$email."'";
    $stmt = parent::prepara($query);
    $result= parent::ejecuta($stmt);
    while($row = parent::recupera_asociativo($stmt)){   
        $_SESSION['MEMBER_ID'] = $row['ID'];
    $_SESSION['FIRST_NAME'] = $row['NOMBRE'];
    }
}*/

function get_User_byId(){
    $query = "SELECT ID, NOMBRE, USUARIO FROM  ZPEREZV.SYS_USUARIOS";
    $stmt = parent::prepara($query);
    $result = parent::ejecuta($stmt);
    //$count_rows = parent::recupera_asociativo($stmt);
    while ($this->row = db2_fetch_assoc($stmt)) {
        //printf("%-5d %-16s %-32s<br><br>",$row['ID'], $row['NOMBRE'], $row['USUARIO']);
        $this->nombre       				=$this->row["NOMBRE"];
        $this->id       				    =$this->row["ID"];
        $this->mail       				    =$this->row["USUARIO"];
        $this->user = array($this->nombre, $this->id,$this->mail);

        foreach($this->user as $user) {
            //echo $user[0] . ' at ' . $user[2];
        }
    }
    return $this->user; 
}

function logout_user(){
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FIRST_NAME']);
	//unset($_SESSION['LAST_NAME']);
}
}
?>