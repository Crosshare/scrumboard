<?php
    session_start();
    $_SESSION['username']="jeroen.bouman";
    error_reporting(E_ALL);
    require_once("db.php");
?>
<html>
	<head>

	</head>
	<body>


<div>
<?php
$sQuery="SELECT * FROM icon WHERE type='IMPACT'";
$result = mysql_query($sQuery);
if ($result) {
	printf("<h1>Impact levels: %d</h1>\n",mysql_num_rows($result));
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result)) {
			echo "<li style=\"list-style-image: url('icon.php?id=".$row['id']."') ;\" alt='".$row['title']."'>".$row['title']."</li>\n";
		}//end while
	}//end if
} else {
	echo "MySQL error: ".mysql_error();
}//end if
?></div>


<div>
<?php
$sQuery="SELECT * FROM icon WHERE type='TYPE'";
$result = mysql_query($sQuery);
if ($result) {
	printf("<h1>Issue types: %d</h1>\n",mysql_num_rows($result));
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result)) {
			echo "<li style=\"list-style-image: url('icon.php?id=".$row['id']."') ;\" alt='".$row['title']."'>".$row['title']."</li>\n";
		}//end while
	}//end if
} else {
	echo "MySQL error: ".mysql_error();
}//end if
?></div>
</body>
</html>