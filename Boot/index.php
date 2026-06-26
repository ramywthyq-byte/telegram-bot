<?php

header("Content-Type: application/json");

$response = [
    "status" => true,
    "message" => "Welcome to Ramornoir API",
    "version" => "1.0"
];

echo json_encode($response, JSON_PRETTY_PRINT);
