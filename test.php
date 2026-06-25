<?php
$urltiktok = "https://vt.tiktok.com/ZSC2EShTm/";
$apikey = "74afaadd7ffa8a725bd2586afa22ba17";


// رابط الـ API
$apiurl = "https://api.tikwmapi.com/?url=" . urlencode($urltiktok) . "&hd=1;

// تهيئة cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 🔥 هنا نرسل المفتاح في الهيدر
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "x-api-key: " . $apikey
]);

$response = curl_exec($ch);

curl_close($ch);

// إرسال الطلب
$response = curl_exec($ch);

// إغلاق الاتصال
curl_close($ch);

// تحويل الرد من JSON إلى PHP Array
$data = json_decode($response, true);

// عرض النتيجة (للتجربة فقط)
echo "<pre>";
print_r($data);
echo "</pre>";
echo $apikey;
exit;
?>
