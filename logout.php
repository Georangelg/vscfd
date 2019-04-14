<?php
session_start();
require("config/helper.db2.php");

$help=new helper();


$help->logout_user();
header( "Location: index.php" ); die;
?>