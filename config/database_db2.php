<?php 
$db_name = 'SCFDCGV';

$usr_name = 'db2admin';

$password = 'jajajaja'; 
$hostname = '192.168.0.7'; 
$port = 50000;

$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$db_name;" . 
"HOSTNAME=$hostname;PORT=$port;PROTOCOL=TCPIP;UID=$usr_name;PWD=$password;"; 

// For persistent connection change db2_connect to db2_pconnect
 
$conn_resource = db2_connect($conn_string, '', ''); 

if ($conn_resource) { 
echo 'Conectado.'; 
db2_close($conn_resource); 
} else { 
echo 'Error.'; 
echo 'SQLSTATE value: ' . db2_conn_error(); 
echo 'with Message: ' . db2_conn_errormsg(); 
} 
?>