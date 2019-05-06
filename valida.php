<?php


include_once './web_services/cURL_valida.php';

$rfc_emisor =   $_POST['remisor'];
$rfc_receptor = $_POST['rreceptor'];
$uuid =         $_POST['uuid'];
$impo =         $_POST['valor'];

//$array = [$rfc_emisor, $rfc_receptor, $uuid, $impo];

$val = valida_en_sat($rfc_emisor, $rfc_receptor, $uuid, $impo);//var_dump($val);
$res = array_map('utf8_decode', $val);
echo "<pre>".print_r($res,true)."</pre>";

?>