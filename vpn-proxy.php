<?php

echo "Your IP is";

echo $_SERVER["REMOTE_ADDR"];

function get_ip_address() {
  // check for shared internet/ISP IP
  if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP']))
   return $_SERVER['HTTP_CLIENT_IP'];

  // check for IPs passing through proxies
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   // check if multiple ips exist in var
    $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    foreach ($iplist as $ip) {
     if ($this->validate_ip($ip))
      return $ip;
    }
   }

  if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
   return $_SERVER['HTTP_X_FORWARDED'];
  if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
   return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
  if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
   return $_SERVER['HTTP_FORWARDED_FOR'];
  if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
   return $_SERVER['HTTP_FORWARDED'];

  // return unreliable ip since all else failed
   return $_SERVER['REMOTE_ADDR'];
 }

function validate_ip($ip) {
     if (filter_var($ip, FILTER_VALIDATE_IP, 
                         FILTER_FLAG_IPV4 | 
                         FILTER_FLAG_IPV6 |
                         FILTER_FLAG_NO_PRIV_RANGE | 
                         FILTER_FLAG_NO_RES_RANGE) === false)
         return false;
     self::$ip = $ip;
     return true;
 }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VPN or Proxy</title>
<style>
body{width:90%;margin:0 auto;font-family:-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;background-color:#f1f1f1;font-size:1.5rem;color:#555;font-weight:100;}
#dxcontainer{display:block;width:80%;height:auto;margin:0 auto;padding:1.5em;background-color:#fff;color:#555;}
.dxsection{font-size:1.7rem;}
.dxsection p{font-size:14px; font-style:italic;}
.tcenter{text-align:center;}
</style>
</head>

<body>

<div id="dxcontainer">

  <div class="dxsection">
    <h2 class="tcenter">PROXY or VPN detected</h2>
    <p class="tcenter">Proxy or VPN (virtual Private Network) has been detected, unfortunately our website has implemented strict security measures and use of VPN/Proxy are not allowed.</p>
    <p>if you believe the security flagged your device's IP by mistake, contact us</p>
    
    
    <div><script type="text/javascript">
var ipAddress = '<!--#echo var="REMOTE_ADDR"-->';
alert (ipAddress);
</script></div>
  </div>

</div>

</body>
</html>
