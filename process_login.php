<?php
require("config/session.php");
//require("config/database_mysql.php");
require("config/helper.db2.php");

$CFDIBD=new helper();

$email = $CFDIBD->validate_input(isset($_POST['email'])?$_POST['email']:''); //helper.db2.php
$password = $CFDIBD->validate_input(isset($_POST['password'])?$_POST['password']:'');//helper.db2.php

if($_SERVER['REQUEST_METHOD']==='POST' && is_array($_POST) && !empty($email) && !empty($password)){
    //get user id
    $user_id = $CFDIBD->get_user_id($email); //helper.db2.php
    //if user id exist check for brute
    if($user_id){
        if(check_brute($user_id['ID'])){
            header( "Location: index.php?error=bG9naW4gYmxvY2tlZA==" ); die;    
        }
    }
    //check user is valid or not
    $status = $CFDIBD->validate_user($email,$password);
	if($status){
		header( "Location: home.php" ); die;		
	}else{
        if($user_id){
            $data = array(
                'user_id' => $user_id['ID'],
                'time' => time()
                );
            //insert login attempts into table
            //insert('login_attempts',$data);
        }
		header( "Location: index.php?error=bG9naW4gZXJyb3I=" ); die;
	}
}else{
	header( "Location: index.php" ); die;
}
?>