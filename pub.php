 <?php
 function pubMqtt($topic,$msg){
       $APPID= "testcp/"; //enter your appid
     $KEY = "BjwsEhVUWt50Sxy"; //enter your key
    $SECRET = "TlUva5etzHhiOCPUSAA6w794a"; //enter your secret
    $Topic = "$topic"; 
      put("https://api.netpie.io/microgear/".$APPID.$Topic."?retain&auth=".$KEY.":".$SECRET,$msg);
 
  }
 function getMqttfromlineMsg($Topic,$lineMsg){
 
    $pos = strpos($lineMsg, ":openram");
    if($pos){
      $splitMsg = explode(":stop", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }else{
      $topic = $Topic;
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
  function put($url,$tmsg)
{
      
    $ch = curl_init($url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
   
    // curl_setopt($ch, CURLOPT_USERPWD, “{YOUR NETPIE.IO APP KEY}:{YOUR NETPIE.IO APP SECRET}”)
    curl_setopt($ch, CURLOPT_USERPWD, "BjwsEhVUWt50Sxy:TlUva5etzHhiOCPUSAA6w794a");
     
    $response = curl_exec($ch);
    
      curl_close($ch);
      echo $response . "\r\n";
    return $response;
}
// $Topic = "NodeMCU1";
 //$lineMsg = "CHECK";
 //getMqttfromlineMsg($Topic,$lineMsg);
?>
