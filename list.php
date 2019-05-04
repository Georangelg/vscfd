<?php
require('./config/helper.db2.php');
$help =  new helper();
//$datos  = $help->simple_select();
//$del = $help->delete_user();
$del = $help->list_ajax();
//var_dump($del);


?>