<?php

define("URL", "https://api.telegram.org/bot671806285:AAG5NL5f7Jvo0ndHJS8xPeqqPHiadI9wja8/");

function sendMessage($chatID, $msj) {
    
    $url = URL . "sendMessage?chat_id=" . $chatID . "&text=" .urlencode($msj);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatid = $update["message"]["chat"]["id"];
$msj = $update["message"]["text"];
sendMessage($chatid, $msj);

?>
