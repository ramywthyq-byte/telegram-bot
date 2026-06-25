<?php
$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";
$apikey = "74afaadd7ffa8a725bd2586afa22ba17";

// ** غيّر هذا السطر فقط في كل تجربة **
$apiurl = "https://api.tikwm.com/?" . http_build_query([
    'url'   => $urltiktok,
    'hd'    => 1,
    'token' => $apikey   // جرب: token أو key أو api_key
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
echo "<pre>";
print_r($data);
echo "</pre>";
?>
