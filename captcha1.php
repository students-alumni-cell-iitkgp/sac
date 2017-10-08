<?php
	session_start();
	include("./phptextClass1.php");	
	
	/*create class object*/
	$phptextObj = new phptextClass();	
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#162453','#fff',120,40,10,25);	
 ?>