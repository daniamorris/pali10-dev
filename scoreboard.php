<?php
error_reporting(E_ALL);
include "dbcred.php";
$db = mysql_connect("localhost", $user, $password);
mysql_select_db($db_name,$db);

//$myuuid = 'b710c14d6a29be70';
$myuuid = $_GET['myuuid'];

//$query = mysql_query("SELECT * FROM scoreboard WHERE myname='Dania Morris'", $db);
$query = mysql_query("SELECT * FROM scoreboard WHERE uuid='".$myuuid."'", $db);
if (mysql_affected_rows() > 0) {
	while ($row = mysql_fetch_assoc($query)) {
		echo "<div>" . $row['goals'] . "</div>";
	}
} else {
	echo "No Data Found - Please enter some goals or log some training";
}

?>