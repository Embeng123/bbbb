<?php


    function SendOTP($apikey,$msisdn_otp)
    {
        $query = sprintf('{"msisdn_otp":"%s"}',$msisdn_otp);
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function LoginOTP($apikey,$msisdn_login,$otp)
    {
        $query = sprintf('{"msisdn_login":"%s","otp":"%s"}',$msisdn_login,$otp);
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function BuyPackage_v2($apikey,$token,$pkgid_buy_v2)
    {
        $crypto = new ApiCrypto;
        $query = sprintf('{"token":"%s","pkgid_buy_v2":"%s"}',$token,$crypto->encrypt($pkgid_buy_v2));
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function Result_BuyPackage_v2($status_user,$name_user,$expire_user,$apikey,$token,$pkgid_buy_v2)
    {
        $Red      = "\e[0;31m";
        $Green  = "\e[0;32m"; 
        $result_buy_v2 = $this->BuyPackage_v2($apikey,$token,$pkgid_buy_v2);   
        $result_buy_v2  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$status_user,$name_user,$expire_user)],[''], $result_buy_v2);
        $json_buy_v2 = json_decode($result_buy_v2, true);
        $status_buy_v2 = $json_buy_v2["status"];
        $message_buy_v2 = $json_buy_v2["message"];
    //-------------------------------
        if($status_buy_v2==true)
        {
            echo "$Green ➤ $message_buy_v2 !\n";
        }else{
            echo "$Red ➤ $message_buy_v2 !\n";
        }
    }

    function BuyPackage_v3($apikey,$token,$pkgid_buy_v3)
    {
        $crypto = new ApiCrypto;
        $query = sprintf('{"token":"%s","pkgid_buy_v3":"%s"}',$token,$crypto->encrypt($pkgid_buy_v3));
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function Result_BuyPackage_v3($status_user,$name_user,$expire_user,$apikey,$token,$pkgid_buy_v2)
    {
        $Red      = "\e[0;31m";
        $Green  = "\e[0;32m"; 
        $result_buy_v3 = $this->BuyPackage_v3($apikey,$token,$pkgid_buy_v2);
        $result_buy_v3  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$status_user,$name_user,$expire_user)],[''], $result_buy_v3);
        $json_buy_v3 = json_decode($result_buy_v3, true);
        $status_buy_v3 = $json_buy_v3["status"];
        $message_buy_v3 = $json_buy_v3["message"];
    //-------------------------------
        if($status_buy_v3==true)
        {
            echo "$Green ➤ $message_buy_v3 !\n";
        }else{
            echo "$Red ➤ $message_buy_v3 !\n";
        }
    }  

    function DoublePacket_BuyPackage($status_user,$name_user,$expire_user,$apikey,$token,$pkgid)
    {
        $this->Result_BuyPackage_v2($status_user,$name_user,$expire_user,$apikey,$token,$pkgid);
        $this->Result_BuyPackage_v3($status_user,$name_user,$expire_user,$apikey,$token,$pkgid);
    }

    function Claimmccm($apikey,$token,$pkgid_claimmccm)
    {
        $crypto = new ApiCrypto;
        $query = sprintf('{"token":"%s","pkgid_claimmccm":"%s"}',$token,$crypto->encrypt($pkgid_claimmccm));
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function Result_Claimmccm($status_user,$name_user,$expire_user,$apikey,$token,$pkgid_claimmccm)
    {
        $Red      = "\e[0;31m";
        $Green  = "\e[0;32m"; 
        $result_claimmccm = $this->Claimmccm($apikey,$token,$pkgid_claimmccm);
        $result_claimmccm  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$status_user,$name_user,$expire_user)],[''], $result_claimmccm);
        $json_claimmccm = json_decode($result_claimmccm, true);
        $status_code_claimmccm = $json_claimmccm["status_code"];
        $message_claimmccm = $json_claimmccm["message"];
    //-------------------------------
        if($status_code_claimmccm == "201")
        {
            echo "$Green ➤ $message_claimmccm !\n";
        }else{
            echo "$Red ➤ $message_claimmccm !\n";
        }
    }
    
    function Claimmccm_v2($apikey,$token,$pkgid_claimmccm_v2)
    {
        $crypto = new ApiCrypto;
        $query = sprintf('{"token":"%s","pkgid_claimmccm":"%s"}',$token,$crypto->encrypt($pkgid_claimmccm_v2));
        return $this->cHeader_POST($apikey,base64_encode($query));
    }

    function Result_Claimmccm_v2($status_user,$name_user,$expire_user,$apikey,$token,$pkgid_claimmccm_v2)
    {
        $Red      = "\e[0;31m";
        $Green  = "\e[0;32m"; 
        $result_claimmccm_v2 = $this->Claimmccm_v2($apikey,$token,$pkgid_claimmccm_v2);
        $result_claimmccm_v2  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$status_user,$name_user,$expire_user)],[''], $result_claimmccm_v2);
        $json_claimmccm_v2 = json_decode($result_claimmccm_v2, true);
        $status_code_claimmccm_v2 = $json_claimmccm_v2["status_code"];
        $message_claimmccm_v2 = $json_claimmccm_v2["message"];
    //-------------------------------
        if($status_code_claimmccm_v2 == "201")
        {
            echo "$Green ➤ $message_claimmccm_v2 !\n";
        }else{
            echo "$Red ➤ $message_claimmccm_v2 !\n";
        }
    }  

    function DoublePacket_Claimmcm($status_user,$name_user,$expire_user,$apikey,$token,$pkgid)
    {
        $this->Result_Claimmccm($status_user,$name_user,$expire_user,$apikey,$token,$pkgid);
        $this->Result_Claimmccm_v2($status_user,$name_user,$expire_user,$apikey,$token,$pkgid);
    }
}

$gitpull = "git pull";
$Red      = "\e[0;31m";
$Green  = "\e[0;32m";
$Yellow = "\e[0;33m";
$Orange = "\e[1;33m";
$Purple = "\e[0;35m";
$Cyan   = "\e[0;36m";
$White  = "\e[0;37m";

echo "\n";

$capikey = new ApiKey;
repeat_apikey:
echo "$White Input APIKey: ";
$apikey = trim(fgets(STDIN));
$GLOBALS["apikey"] = $apikey;
$status_user = $capikey->get_status_user($GLOBALS["apikey"]);
$GLOBALS["status_user"] = $status_user;
if($GLOBALS["status_user"] == "200")
{
    $GLOBALS["name_user"] = $capikey->get_name_user($GLOBALS["apikey"]);
    $GLOBALS["expire_user"] = $capikey->get_expire_user($GLOBALS["apikey"]);
    echo "\n";
    echo "$Cyan Sampurasun, ".$GLOBALS["name_user"]. "\n";
    echo "$Cyan Aktif sampai, ".$GLOBALS["expire_user"]. "\n";

echo "\n";
echo "$Orange AxisEmbeng \n";
echo "\n";
echo "$Purple Login Axis... \n";

$axis = new ApiAXIS;
$crypto = new ApiCrypto;
repeat_otp:
echo "$White Input Number: ";
$nomor = str_replace(['-', '+',' '],['', '', ''], trim(fgets(STDIN)));
$result_otp = $axis->SendOTP($GLOBALS["apikey"],$nomor);
$result_otp  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$GLOBALS["status_user"],$GLOBALS["name_user"],$GLOBALS["expire_user"])],[''], $result_otp);
$json_otp = json_decode($result_otp, true);
$status_otp = $json_otp["status"];
$message_otp = $json_otp["message"];
if($status_otp==true)
{
    echo "$Green ➤ $message_otp !\n";
} else {
    echo "$Red ➤ $message_otp !\n";
    echo "\n";
    goto repeat_otp;
}

echo "\n";

repeat_token:
echo "$White Input OTP: ";
$otp = strtoupper(trim(fgets(STDIN)));
$result_login = $axis->LoginOTP($GLOBALS["apikey"],$nomor, $otp);
$result_login  = str_replace([sprintf('{"status_user":%s,"user":"%s","expire_user":"%s"}',$GLOBALS["status_user"],$GLOBALS["name_user"],$GLOBALS["expire_user"])],[''], $result_login);
$json_login = json_decode($result_login, true);
$status_login = $json_login["status"];
$message_login = $json_login["message"];
$data_login = $json_login["data"];
$dec_data_login = base64_decode((string)$data_login);
$json_data_login = json_decode($dec_data_login, true);
$token = "";
$GLOBALS["token"] = $token;
if($status_login==true)
{
    $token = $json_data_login["token"];
    echo "$Green ➤ $message_login !\n";
} else {
    $token = "";
    echo "$Red ➤ $message_login !\n";
    echo "\n";
    goto repeat_token;
}

echo "\n";

function getBuyPackage()
{
    $crypto = new ApiCrypto;
    $axis = new ApiAxis;
    $Red      = "\e[0;31m";
    $Yellow = "\e[0;33m";
    $White  = "\e[0;37m";
    $Cyan   = "\e[0;36m";

    echo "$Yellow Daftar Kuota Harian: \n";

    $one   = "1. Kuota Youtube 1GB, 1hr, 0k";
    $two   = "2. Kuota Youtube 2GB, 3hr, 0k";
    $three = "3. Kuota Tiktok 1GB, 1hr, 0k";
    $four  = "4. Kuota Instagram 1GB, 1hr, 0k";
    $five  =  "5. Kuota Malam 1GB, 2hr, 0k";
    $six   =  "6. Kuota Malam 1GB, 7hr, 0k";
    $seven   =  "7. Kuota Musik 1GB, 7hr, 0k";
    $eight   =  "8. Kuota Video 1GB, 7hr, 0k";
    $nine   =  "9. Kuota Game 1GB, 7hr, 0k";
    $ten   = "10. Kuota Sosmed 1GB, 7hr, 0k";
    $eleven   =  "11. Kuota 5MB + Bonus Vidio Platinum, 30hr, 0k";

    $list=array($one,$two,$three,$four,$five,$six,$seven,$eight,$nine,$ten,$eleven);
    foreach($list as $lists){
        echo "$Yellow $lists \n";
    }    
    repeat_pkgid:

    echo "\n$Cyan Choise Kuota Harian: ";
    $choise = trim(fgets(STDIN));
    if(!($choise==1||$choise==2||$choise==3||$choise==4||$choise==5||
    $choise==6||$choise==7||$choise==8||$choise==9||$choise==10||$choise==11))
    {
        echo "$Red ➤ Your choice is wrong \n"; 
        goto repeat_pkgid;
    }
        
    echo "\n";
    switch($choise){
        case '1' :
            $buy = $axis->DoublePacket_BuyPackage>decrypt("-QERCE2V7OsHsaF4ukoLlw=="));
            break;

        case '2' :
            $buy = $axis->DoublePacket_BuyPackage($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("_HWiDPCSEaMHsaF4ukoLlw=="));
            break;

        case '3' :
            $buy = $axis->DoublePacket_BuyPackage($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("Syma9QW6JwAHsaF4ukoLlw=="));
            break;

        case '4' :
            $buy = $axis->DoublePacket_BuyPackage($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("ALEamI8eFzwHsaF4ukoLlw=="));
            break;

        case '5' :
            $buy = $axis->DoublePacket_BuyPackage($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("r4r4DFlay5UHsaF4ukoLlw=="));
            break;

        case '6' :
            $buy = $axis->DoublePacket_Claimmcm($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("tHSCk3quBA8HsaF4ukoLlw=="));
            break;
    
        case '7' :
            $buy = $axis->DoublePacket_Claimmcm($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("kzdvhAkuWKgHsaF4ukoLlw=="));
            break;
    
        case '8' :
            $buy = $axis->DoublePacket_Claimmcm($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("LqMMzM3jDO0HsaF4ukoLlw=="));
            break;
    
        case '9' :
            $buy = $axis->DoublePacket_Claimmcm($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("nqqpE2OxQ04HsaF4ukoLlw=="));
            break;
    
        case '10' :
            $buy = $axis->DoublePacket_Claimmcm($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("rugMpL3Py2AHsaF4ukoLlw=="));
            break;

        case '11' :
            $buy = $axis->DoublePacket_BuyPackage($GLOBALS["status_user"] ,$GLOBALS["name_user"],$GLOBALS["expire_user"],$GLOBALS["apikey"],$GLOBALS["token"],$crypto->decrypt("-EinJZs3PlIHsaF4ukoLlw=="));
            break;

        }
        return $buy;
}
?>
