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
        $fields = array_keys($data);
        $sql = "INSERT INTO SYS_ATTEMPTS (`" . implode('`,`', $fields) . "`) VALUES('" . implode("','", $data) . "')";
        $stmt = parent::prepara($sql);
        $result = parent::ejecuta($stmt);
        while ($row = db2_fetch_assoc($stmt)) {
            //printf("%-5d %-16s %-32s %10s<br><br>",
            //$row['ID'], $row['NAME'], $row['BREED'], $row['WEIGHT']);
        }
        return $row;
    }
    public function get_user_id($mail)
    {
        $query = "select ID from zperezv.sys_usuarios where USUARIO = '" . $mail . "'";
        $stmt = parent::prepara($query);
        $result = parent::ejecuta($stmt);
        while ($row = parent::recupera_asociativo($stmt)) {
            printf("%-32d", $row['ID']);
        }
        return $row;
    }
    public function check_brute($user_id)
    {
        // Get timestamp of current time
        $now = time();
        // All login attempts are counted from the past 10 min.
        $valid_attempts = $now - (30 * 60);

        $sql = "SELECT time FROM login_attempts WHERE user_id = $user_id AND time > '$valid_attempts'";
        $data = fetch_custom($sql);
        // If there have been more than 5 failed logins
        if (count($data) > 5) {
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
        print_r($result);
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
        $query = "SELECT ID, NOMBRE, USUARIO, PASSWORD FROM  ZPEREZV.SYS_USUARIOS";
        $stmt = parent::prepara($query); //print_r($stmt);
        $result = parent::ejecuta($stmt, array('000010')); //print_r($result);
        $rows = db2_num_rows($stmt);

/*
while ($rows = db2_fetch_assoc($stmt)) {
            printf("%-5d %-16s %-32s %10s\n",
                $rows['ID'], $rows['NOMBRE'], $rows['USUARIO'], $rows['PASSWORD'] . "<br>");
        }
 */
        while ($rows = parent::recupera_asociativo($stmt)) {
            //$fname = db2_result($stmt, 3);$lname = db2_result($stmt, 'NOMBRE');print "Name: $fname $lname<br>";
            $nombre = $rows['NOMBRE'];
            $ID = $rows['ID'];
            $datos = array($nombre, $ID);
        }
            var_dump($datos);
    }

}
