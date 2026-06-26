<?php
    header("Content-Type: application/json");

    if(!isset($_GET['url'])){
        echo json_encode([
            "status" => false,
            "message" => "no url"
        ],JSON_PRETTY_PRINT);
        exit;
    }
    $url = $_GET['url'];
    
    echo json_encode([
        "status" => true,
        "message" => $url
    ],JSON_PRETTY_PRINT);

?>
