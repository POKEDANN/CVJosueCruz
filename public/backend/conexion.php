<?php 
$db = mysqli_connect('localhost', 'root', 'root', 'Curriculum');
$db->query("SET NAMES 'utf-8'");
if(mysqli_connect_errno())
{
	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}
 ?>
