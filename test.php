<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";
$apikey = "74afaadd7ffa8a725bd2586afa22ba17";

$apiurl = "https://api.tikwmapi.com/?" . http_build_query([
    'url'   => $urltiktok,
    'hd'    => 1,
    'token' => $apikey
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
