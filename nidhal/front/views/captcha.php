<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$img=imagecreate(65,30);

$bg=imagecolorallocate($img,255,255,255);
$textcolor= imagecolorallocate($img,0,0,0);
imagefill($img,0,0,$bg);
imagestring($img,5,5,5,$code,$textcolor);

header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($img);
imagedestory($img);

?>





