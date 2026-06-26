<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";

$apiurl = "https://www.tikwm.com/api/?" . http_build_query([
    'url' => $urltiktok,
    'hd'  => 1
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
    exit;
}

curl_close($ch);

echo "<pre>";
$data = json_decode($response, true);
print_r($data);
echo "</pre>";

?>
