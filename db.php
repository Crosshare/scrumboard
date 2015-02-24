<?php
unset($conn);
$dbHost	=	'localhost:8889';

$dbUser	=	'root';
$dbPass	=	'root';
if (!$conn = @mysql_connect($dbHost, $dbUser, $dbPass)) {
	$message[] = ("Could not connect: ".mysql_error());
} else {
	$db_name = "scrum_board";
	mysql_select_db($db_name) or die('Could not select database: '.mysql_error());
}//end if
