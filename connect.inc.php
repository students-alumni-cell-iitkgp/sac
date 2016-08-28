<?php
$conn_error='Could not connect';
$mysql_host='localhost';
$mysql_user='root';
$myql_pass='';
$mysql_db='alumnimeet';
if (!@mysql_connect($mysql_host,$mysql_user,$myql_pass)|| !@mysql_select_db($mysql_db)){
	die($conn_error);
}
?>