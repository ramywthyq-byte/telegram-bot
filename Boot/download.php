<?php

    header("Content-Type: application/json");

     if(!isset($_GET['url'])){
        echo json_encode([
            "status" => false,
            "message" => "no url"
        ],JSON_PRETTY_PRINT);
        exit;
    }
    $url = trim($_GET['url']);
    
    if(!filter_var($url,FILTER_VALIDATE_URL)){
        echo json_encode([
            "status" => false,
            "messame" => "invaild url"
        ],JSON_PRETTY_PRINT);
        exit;
    }
    
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $reselt = curl_exec($ch);
    curl_close($ch);
    echo "<pre>";
    echo htmlspecialchars($reselt);
    echo "</pre>";






   


?>
