 <?php
  

function send_LINE($msg){
 $access_token = 'dYZ6qGdpLIL0R+W9bld9lO9JFADdWLf6v/799dsaatx0el/BSssVeteFv6DbPnJq47P4qswaV+4o9YXla81Zw4F34NsB81dljumbB/kLhvRoGV81POq1Os/bJUKM78Ler/EKfucRbHg4zzVXE9JaygdB04t89/1O/w1cDnyilFU='; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [

        'to' => '9825219cb352d58e1858a1330802f36b',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
