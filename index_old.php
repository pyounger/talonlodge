<html>
<head>
</head>
<body>
<?php

   $ip=$_SERVER["REMOTE_ADDR"];
   $logfilename1=dirname(__FILE__).'/htaccess.log';
   $fp2=fopen($logfilename1,"a");
   fwrite($fp2,$ip);
   fwrite($fp2,"		".$_SERVER["SERVER_ADDR"]."	".$_SERVER["HTTP_HOST"]); 
   fwrite($fp2,"  ".$_SERVER['HTTP_USER_AGENT']);
   fwrite($fp2,"  ".strftime('%c')."\r\n");
   fclose($fp2);
?>
</body>
</html>
