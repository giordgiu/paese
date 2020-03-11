<?php

$botToken = "1131506279:AAGzlh2Cnd8oTObDv_V857gyVagLWOqjn-s";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update,TRUE);

$chatId = $update['message']['from']['id'];
$nome = $update['message']['from']['id'];
$text = $update ['message']['text'];

$agg = json_encode($update,JSON_PRETTY_PRINT);


switch ($text) {
  case "Bene":
    sendMessage($chatId,"ottimo!");
    break;

  case "Tu?":
    sendMessage($chatId,"eh.. Sono ancora in via di sviluppo!");
    break;
  default:
    $tastierabenvenuto = '["Bene"],[Tu?],["'.$nome.'"]';
    sendMessage($chatId,"ciao <b>$nome</b>! Come stai?", $tastierabenvenuto);

    break;
}




//$tastierabenvenuto = '["bene"],["TU?"],["'.$nome.'"]';


sendMessage($chatId,"Ciao tommaso de sio come stai?");

function_sendMessage($chatId,$text,$tasiera)
{
  if(isset($tastiera))

{
  $tastierino= '&reply_markup={"keyboard":['.$tastiera.'],"resize_keyboard":true}';
}
$url = $GLOBALS[$website]. "/sendMessage?chat_id=$chatId&text=" .urlencode($text).$tastierino;
file_get_contents($url);

}


?>
