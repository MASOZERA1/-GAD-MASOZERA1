<?php
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

$response = "";

if($text==""){
  $response = "CON Murakaza neza ku Amategeko y'u Rwanda\n1. Itegeko Nshinga\n2. Ubucuruzi\n3. Ubuzima\n4. Andi mategeko";
} else if($text=="1"){
  $response = "END Soma Itegeko Nshinga: https://nec.gov.rw/itegeko-nshinga-rya-repubulika-yu-rwanda";
} else if($text=="2"){
  $response = "END Soma Amategeko y'Ubucuruzi: https://www.rra.gov.rw/fileadmin/img/rpl-laws.html";
} else if($text=="3"){
  $response = "END Soma Amategeko y'Ubuzima: https://www.moh.gov.rw/legal-frameworks/laws";
} else if($text=="4"){
  $response = "END Andi mategeko: https://www.minijust.gov.rw/official-gazette";
}

header('Content-type:text/plain');
echo $response;
?>