<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";
$apikey = "7f66b6ac908d5c3b266c30c62f87b9c5";

$apiurl = "https://api.tikwmapi.com/?" . http_build_query([
    'url'   => $urltiktok,
    'hd'    => 1,
    'api_key' => $apikey
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

if ($curl_error) {
    echo "cURL Error: " . $curl_error;
    exit;
}

echo "Raw Response: " . $response . "<br><br>";

$data = json_decode($response, true);
echo "<pre>";
print_r($data);
echo "</pre>";
?>
