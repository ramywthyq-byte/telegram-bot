<?php
$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";
$apikey = "74afaadd7ffa8a725bd2586afa22ba17";

// رابط API مع إضافة api_key كـ parameter
$apiurl = "https://api.tikwmapi.com/?url=" . urlencode($urltiktok) . "&hd=1&api_key=" . $apikey;

// تهيئة cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // احتياطي لتجنب أخطاء SSL

// تنفيذ الطلب
$response = curl_exec($ch);

// إغلاق الاتصال
curl_close($ch);

// تحويل JSON إلى Array
$data = json_decode($response, true);

// عرض النتيجة
echo "<pre>";
print_r($data);
echo "</pre>";
?>
