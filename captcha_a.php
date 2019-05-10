<?php
	session_start();
	include("./captcha_a_sesn.php");	
	
	/*create class object*/
	$phptextObj = new phptextClass();	
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#162453','#fff',240,80,10,25);	
 ?>