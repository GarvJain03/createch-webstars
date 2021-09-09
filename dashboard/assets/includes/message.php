<?php
    if(isset($_POST['submit'])) {
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        $otp = rand(111111, 999999);
        $fields = array(
            "message" => "<#>OTP to activate your ChorsTech account is: $otp. Please do not share this with anyone",
            "language" => "english",
            "route" => "q",
            "numbers" => "$phone",
        );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: b40txmDdXFOypqwNBGWUzAf7QPeiSHkEvLYhZVo8g92cC6jK3rO3WNchVwL0Yb7JGHzafMPpBkosnX9F",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
?>
<form action="" method="POST">
    <input name="phone" />
    <input name="msg" />
    <input name="submit" type="submit" />
</form>