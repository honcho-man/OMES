<?php
$file = "buttonStatus.txt";
$handle = fopen($file,'w+');
if (isset($_POST['on']))
{
$onstring = "ON";
fwrite($handle,$onstring);
fclose($handle);

}
else if(isset($_POST['off']))
{
$offstring = "OFF";
fwrite($handle, $offstring);
fclose($handle);
}?>