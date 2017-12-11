<?php

	//Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
	//� 2013 esms.vn
	//Website: http://esms.vn/
	//Hotline: 0902.435.340      
   
	//Huong dan chi tiet cach su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
	//De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API

    $APIKey="288C3A66BE62F92BED008711AE8586";
	$SecretKey="1CB129B5AF73A5C9C0140FE02AD02B";
	$YourPhone="01656963032";
	$Content="Xin cam on quy khach da mua san pham tai cua hang cua chung toi.\\nMa don
	 hang cua quy khach"."se duoc giao den trong thoi gian som nhat.\\nMoi thac mac xin lien he toi so dien thoai 0917077025";
	
	$SendContent=urlencode($Content);
	$data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=4";
	
	$curl = curl_init($data); 
	curl_setopt($curl, CURLOPT_FAILONERROR, true); 
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
	$result = curl_exec($curl); 
		
	$obj = json_decode($result,true);
    if($obj['CodeResult']==100)
    {
        print "<br>";
        print "CodeResult:".$obj['CodeResult'];
        print "<br>";
        print "CountRegenerate:".$obj['CountRegenerate'];
        print "<br>";     
        print "SMSID:".$obj['SMSID'];
        print "<br>";
    }
    else
    {
        print "ErrorMessage:".$obj['ErrorMessage'];
    }
    


?>