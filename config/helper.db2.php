<?php
include 'class.db2.php';
/*
 * |-------------------------------------------------------
 * | Validate Input
 * |-------------------------------------------------------
 */
class helper extends db2
{
    public $conexion;
    public function validate_input($data)
    {
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
    public function display_error($class_name, $message)
    {
        echo "<div class='alert $class_name'>$message</div>";
    }

/*
 * |-------------------------------------------------------
 * | LOGICA DE BASE DE DATOS
 * |-------------------------------------------------------
 */

    public function validate_user($email, $password)
    {
        //encript password to md5
        $password_s = md5($password);
        $sql = "SELECT ID,NOMBRE FROM zperezv.sys_usuarios WHERE usuario='" . $email . "' AND password='" . $password_s . "' LIMIT 1";
        $stmt = parent::prepara($sql);
        $result = parent::ejecuta($stmt);
        while ($row = parent::recupera_asociativo($stmt)) {
            //printf("%20s<br><br>",$row['NOMBRE']);
            $_SESSION['MEMBER_ID'] = $row['ID'];
            $_SESSION['FIRST_NAME'] = $row['NOMBRE'];
        }
        //echo"Hola";
    }
    public function insert_attempt($data)
    {
        $this->id = $data['user_id'];
        $this->time = $data['time'];
        $this->sql = "INSERT INTO ZPEREZV.SYS_ATTEMPTS (USER_ID, TIME) VALUES ('$this->id', '$this->time')";
        $this->stmt = parent::prepara($this->sql);//var_dump($this->stmt);
        $this->result = db2_execute($this->stmt);
        if(!empty($this->result))
        {   
            //return 1;
            echo "agregado";
        }else{
            echo "Algo salio mal ";
        }
    }

    public function get_user_id($mail)
    {
        $this->query = "select ID from zperezv.sys_usuarios where USUARIO = '" . $mail . "'";
        $this->stmt = parent::prepara($this->query);
        $this->result = parent::ejecuta($this->stmt);
        while ($this->as = parent::recupera_asociativo($this->stmt)) {
            $this->id           = $this->as['ID'];
        }
        return $this->id;
    }
    public function check_brute($user_id)
    {   
        $now = time();
        $valid_attempts = $now - (30 * 60);
        $sql = "SELECT time FROM ZPEREZV.SYS_ATTEMPTS WHERE user_id = '".$user_id."' AND time > '".$valid_attempts."'"; 
        $stmt = parent::prepara($sql);
        $res = parent::ejecuta($stmt);
        $i = 0;
        while ($row = db2_fetch_assoc($stmt)) {
            //printf("%-5d %-16s %-32s<br><br>",$this->row['ID'], $this->row['NOMBRE'], $this->row['USUARIO']);
            $nombre = $row["TIME"];//echo $nombre;
            $i++;
        }
        if ($i > 5) {
            return true;
        } else {
            return false;
        }
        
    }

    
    public function fetch_custom($sql)
    {
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
    public function get_user_lilst_one()
    {
        $query = "SELECT ID, NOMBRE, USUARIO FROM  ZPEREZV.SYS_USUARIOS";
        $stmt = parent::prepara($query);
        $result = parent::ejecuta($stmt);
        //print_r($result);
        //$count_rows = parent::recupera_asociativo($stmt);
        while ($row = db2_fetch_assoc($stmt)) {
            //printf("%-5d %-16s %-32s<br><br>",$this->row['ID'], $this->row['NOMBRE'], $this->row['USUARIO']);
            $nombre = $row["NOMBRE"];
            $id = $row["ID"];
            $mail = $row["USUARIO"];
            $user = array($nombre, $id, $mail);
        }
        return $user;
    }
    public function logout_user()
    {
        unset($_SESSION['MEMBER_ID']);
        unset($_SESSION['FIRST_NAME']);
        //unset($_SESSION['LAST_NAME']);
    }
    public function validate_cookie()
    {
        if (isset($_COOKIE)) {
            echo "HAY GALLETAS <br>";
            foreach ($_COOKIE as $key => $val) {echo $key . ' is ' . $val . "<br>\n";}
            print_r($_COOKIE);
            echo "<br>";
            var_dump($_COOKIE);
        } else {
            echo "NO HAY COOKIES";
        }

    }
    public function lista_full()
    {
        $this->data = array();
        $this->query = "SELECT ID, NOMBRE, USUARIO, PASSWORD FROM  ZPEREZV.SYS_USUARIOS";
        $this->stmt = parent::prepara($this->query); //print_r($this->stmt);
        $this->res = db2_execute($this->stmt, array(10)); //print_r($this->res);
        $this->c_data = array();
        while ($this->as = parent::recupera_asociativo($this->stmt)) {
            $this->id = $this->as['ID'];
            $this->nombre = $this->as['NOMBRE'];
            $this->usuario = $this->as['USUARIO'];
            $this->password = $this->as['PASSWORD'];
            $this->c_data[$this->id] = array($this->id, $this->nombre, $this->usuario, $this->password); //echo $this->id;
        }
        $this->res = json_encode($this->c_data);
        return $this->res; //var_dump($this->c_data);
    }

    public function del_user($id)
    {
        $qry = "delete from ZPEREZV.sys_usuarios where id = '" . $id . "'";
        $stmt = parent::prepara($qry); //print_r($stmt);
        $exec = parent::ejecuta($stmt);
        if ($exec) {
            echo "BORRADO";
        } else {
            echo "NO BORRADO";
        }
    }

    public function list_ajax()
    {
        $this->data = array();
        $this->query = "SELECT ID, NOMBRE, USUARIO, PASSWORD, TIPO FROM  ZPEREZV.SYS_USUARIOS";
        $this->stmt = parent::prepara($this->query); //print_r($this->stmt);
        $this->res = db2_execute($this->stmt, array(10)); //print_r($this->res);
        $this->c_data = array();
        while ($this->as = parent::recupera_asociativo($this->stmt)) {
            $this->id           = $this->as['ID'];
            $this->nombre       = $this->as['NOMBRE'];
            $this->usuario      = $this->as['USUARIO'];
            $this->password     = $this->as['PASSWORD'];
            $this->tipo         = $this->as['TIPO'];
            $this->update       = '<button type="button" name="update" id="'.$this->as['ID'].'" class="btn btn-warning btn-xs update">Update</button>';
            $this->delete       = '<button type="button" name="delete" id="'.$this->as['ID'].'" class="btn btn-danger btn-xs delete">Delete</button>';
            $this->c_data[]     = array($this->id, $this->nombre, $this->usuario, $this->password, $this->tipo, $this->update, $this->delete); //echo $this->id;
        }
        $saida = array(
            "data" => $this->c_data,
        );
        echo json_encode($saida);
    }
    public function del_ajax($id){
        $this->query = "DELETE FROM  ZPEREZV.SYS_USUARIOS where ID = '".$id."'";
        $this->stmt = parent::prepara($this->query); //print_r($this->stmt);
        $this->res = db2_execute($this->stmt, array(10)); //print_r($this->res);
        if($this->res){
            echo "Listo!";
        }else{
            echo "sigue ahi";
        }
    }
    
    public function update($id, $nombre, $mail, $tipo){
        //$dta = array($id, $nombre, $mail);var_dump($dta);
        $this->query = ("UPDATE ZPEREZV.SYS_USUARIOS SET nombre = '".$nombre."', usuario = '".$mail."', tipo = '".$tipo."' WHERE id = '".$id."'");
        $this->stmt = parent::prepara($this->query); //print_r($this->stmt);
        $this->res = db2_execute($this->stmt, array(10)); //print_r($this->res);
		if(!empty($this->res))
		{   
            //return 1;
            echo "Listo";
		}else{
            echo "Algo salio mal";
        }
    }
    public function create($nombre, $mail, $pass, $tipo){
            $passm = md5($pass);
            $this->query = "INSERT INTO ZPEREZV.SYS_USUARIOS (NOMBRE, USUARIO, PASSWORD, TIPO) VALUES ('$nombre', '$mail', '$passm', '$tipo')";
            $this->stmt = parent::prepara($this->query); //print_r($this->stmt);
            $this->res = db2_execute($this->stmt); //print_r($this->res);
            if(!empty($this->res))
            {   
                //return 1;
                echo "Usuario ".$nombre." agregado";
            }else{
                echo "Algo salio mal";
            }

    }

}
