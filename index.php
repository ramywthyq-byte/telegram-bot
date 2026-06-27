<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

                        #FUNCTION TO SEND MESSAGE
    function sendMessage($telegram_token,$chat_id,$text){
        $messageboturl = "https://api.telegram.org/bot$telegram_token/sendMessage";
        $postFieldsMessage = [
            'chat_id' => $chat_id,
            'text' => $text
        ];
        $chMessage = curl_init();
        curl_setopt($chMessage,CURLOPT_URL,$messageboturl);
        curl_setopt($chMessage,CURLOPT_POST,true);
        curl_setopt($chMessage,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($chMessage,CURLOPT_POSTFIELDS,$postFieldsMessage);
        
        $responseMessage = curl_exec($chMessage);
        curl_close($chMessage);
        return $responseMessage;
    }
                        #TELEGRAM BOT START

    $telegram_token = "8934871281:AAG-16O-iIfRHT203iTi1GiLtnNeYzX4Obw";
    $update = json_decode(file_get_contents("php://input"), true);
    $chat_id = $update["message"]["chat"]["id"];
    $user_message = $update["message"]["text"];

    if (!isset($update["message"]["text"])) exit;

    if ($user_message === "/start") {
        sendMessage($telegram_token,$chat_id,"أهلا في بوت تحميل فيديوهات TIK TOK أرسل رابط الفيديو الذي تريد تنزيله");
        exit;
    } else {
        if(!filter_var($user_message,FILTER_VALIDATE_URL)){
            sendMessage($telegram_token,$chat_id,"الرساله التي قمت بإرسالها لا تمثل رابطاً في TIK TOK");
            exit;

        } else {
                            #API URL

            $apiurl = "https://www.tikwm.com/api/?" . http_build_query([
                'url' => $user_message,
                'hd'  => 1
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiurl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 40);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $responseapi = curl_exec($ch);

            if (curl_errno($ch)) {
                echo "cURL Error: " . curl_error($ch);
                exit;
            }

            curl_close($ch);
                            #SIND VIDEO TO BOT
            $data = json_decode($responseapi, true);
            $video = $data['data']['hdplay'] ?? $data['data']['play'];
            
            $boturl = "https://api.telegram.org/bot$telegram_token/sendVideo";

            $postFields = [
                'chat_id' => $chat_id,
                'video'   => $video,
                'caption' => "🎬 تم التحميل بجودة عالية"
            ]; 

            $chbot = curl_init();
            curl_setopt($chbot,CURLOPT_URL,$boturl);
            curl_setopt($chbot,CURLOPT_POST,true);
            curl_setopt($chbot,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($chbot,CURLOPT_POSTFIELDS,$postFields);
            $responsebot = curl_exec($chbot);
            curl_close($chbot);
            
            echo $responsebot;
        }
    } 
?>
