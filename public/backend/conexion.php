<?php 
$db = mysqli_connect('localhost', 'u657128412_root', 'ligasinnoh', 'u657128412_curri');
$db->query("SET NAMES 'utf-8'");
if(mysqli_connect_errno())
{
	echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}
 ?>
