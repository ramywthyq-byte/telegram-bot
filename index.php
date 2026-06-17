<?php

$telegram_token = "8934871281:AAG-16O-iIfRHT203iTi1GiLtnNeYzX4Obw";

$update = json_decode(file_get_contents("php://input"), true);
if (!isset($update["message"]["text"])) exit;

$chat_id = $update["message"]["chat"]["id"];
$user_message = $update["message"]["text"];

if ($user_message === "/start") {
    $reply = "أهلاً! البوت يشتغل ✅";
} else {
    $reply = "وصلت رسالتك: " . $user_message;
}

$ch = curl_init("https://api.telegram.org/bot{$telegram_token}/sendMessage");
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POSTFIELDS => json_encode([
        "chat_id" => $chat_id,
        "text"    => $reply
    ]),
    CURLOPT_HTTPHEADER => ["Content-Type: application/json"]
]);
curl_exec($ch);
curl_close($ch);
