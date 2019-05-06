<?php
function valida_en_sat($rfc_emisor,$rfc_receptor,$uuid,$impo) {
    //global $data;
    error_reporting(E_ALL);
    
    $rfc_emisor = htmlentities(utf8_encode($rfc_emisor));
    $rfc_receptor = htmlentities(utf8_encode($rfc_receptor));
    $impo = (double)$impo;$impo=sprintf("%.6f", $impo);$impo = str_pad($impo,17,"0",STR_PAD_LEFT);
    $uuid = strtoupper($uuid);

    $factura = "?re=$rfc_emisor&rr=$rfc_receptor&tt=$impo&id=$uuid";
    $msg = <<<EOD
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:Consulta>
         <!--Optional:-->
         <tem:expresionImpresa><![CDATA[%%PRM%%]]></tem:expresionImpresa>
      </tem:Consulta>
   </soapenv:Body>
</soapenv:Envelope>
EOD;
    $msg = str_replace("%%PRM%%",$factura,$msg);
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER,1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
           'Content-type: text/xml;charset="utf-8"',
           'Accept: text/xml',
           'SOAPAction: http://tempuri.org/IConsultaCFDIService/Consulta',
           'cache-control: no-cache',
           'Host: consultaqr.facturaelectronica.sat.gob.mx'
                ));
        $url = "https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $ret = substr($response, $header_size);//var_dump($ret);
        $codigostatus=""; $escancelable="";
        $estado=""; $estatuscancelacion="";
        if (preg_match("/<a:CodigoEstatus>(.*)<\/a:CodigoEstatus>/",$ret,$match)) $codigostatus = $match[1];
        if (preg_match("/<a:EsCancelable>(.*)<\/a:EsCancelable>/",$ret,$match)) $escancelable = $match[1];
        if (preg_match("/<a:Estado>(.*)<\/a:Estado>/",$ret,$match)) $estado = $match[1];
        if (preg_match("/<a:EstatusCancelacion>(.*)<a:EstatusCancelacion>/",$ret,$match)) $estatuscancelacion = $match[1];
		$response = array(
		'codigo' => $codigostatus,
		'estado' => $estado,
		'EsCancelable' => $escancelable,
		'EstatusCancelacion'=>$estatuscancelacion);
		return $response;
    } catch (Exception $e) {
        /*echo "<h3>No se pudo accesar el portal del SAT</h3>";
        echo $e;*/
		return $e;
    }
}


?>