<?php
set_time_limit(0);
error_reporting(0);
function generateRandomString($length = 10) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
function getStr($string,$start,$end){
$str = explode($start,$string);
$str = explode($end,$str[1]);
return $str[0];
}
echo 'REGISTER + GET VOUCHER GOJEK BOBA + WADAWGOJEK';
echo "\n";
echo "CREATE BY : CHARLES GIOVANNI";
echo "\n";
echo "Versi : 3";
echo "\n";
echo "\n";
$i=1;
$versiandroid = generateRandomString(16);
echo 'No : '; 
$nomer = trim(fgets(STDIN)); 
$urln = "https://sman27jkt.sch.id/api/register.php?no=".$nomer."&android=".$versiandroid."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urln);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$datajon = json_decode($result, true);
$otp_token = $datajon['data']['otp_token'];
echo $result;
echo "\n";
sleep(2);
echo 'OTP : '; 
$otp = trim(fgets(STDIN)); 
$otpverif = "https://sman27jkt.sch.id/api/register_otp.php?tp=".$otp."&tot=".$otp_token."&android=".$versiandroid."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $otpverif);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
echo "Sukses Mendaftar..... ";
$res = $result;
$dl = json_decode($res, true);
$access_token = $dl['data']['access_token'];
$user_id = $dl['data']['resource_owner_id'];
$refresh_token = $dl['data']['refresh_token'];
$file = fopen('29NOV.txt', 'a+');
fwrite($file, "id=$user_id&auth=$access_token&rftoken=$refresh_token&android=$versiandroid&acc=gojek\n");
fclose($file);
echo "\n";
//CEK PROMO
$promocek = "https://sman27jkt.sch.id/api/food.php?id=".$user_id."&auth=".$access_token."&android=".$versiandroid."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $promocek);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
$get_voc = getStr($result, 'deep_link":"gojek://growth/promo?source=demo\u0026code=','","description"');
echo "Mengambil Kode Vocher Yang Di Dapat.......";
echo "\n";
echo "Selamat Anda Mendapatkan Code : ".$get_voc."";
echo "\n";
sleep(2);

//RENDEM BOBA
$getboba = "https://sman27jkt.sch.id/api/rendeem.php?id=".$user_id."&auth=".$access_token."&android=".$versiandroid."&code=GOFOODBOBA07";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $getboba);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
$rendemvoc = getStr($result, '"message":"','"');
echo "Rendeem Code ".$get_voc." : ".$rendemvoc."";
echo "\n";
sleep(5);

//RENDEM WADIDAW
$wadaw = "https://sman27jkt.sch.id/api/rendeem.php?id=".$user_id."&auth=".$access_token."&android=".$versiandroid."&code=WADAWGOJEK";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wadaw);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
$wadaw = getStr($result, '"message":"','"');
echo "RENDEM WADAWGOJEK : ".$wadaw."";
echo "\n";
sleep(5);
//CEK VOUCHER
$cekvoc = "https://sman27jkt.sch.id/api/voc_list.php?id=".$user_id."&auth=".$access_token."&android=".$versiandroid."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $cekvoc);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
echo "".$result."";
echo "\n";
