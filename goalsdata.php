<?php
error_reporting(E_ALL);
echo $_GET['myname']; 
include "dbcred.php";
$db = mysql_connect("localhost", $user, $password);
mysql_select_db($db_name,$db);

//$myname = $_GET['myname'];
//?myname=test

if (isset($_GET['myname']) && $_GET['myname'] == 'test') {
    $query = mysql_query("SELECT * FROM scoreboard WHERE myname='Dania Morris'", $db);
    if (mysql_affected_rows() > 0) {
        while ($row = mysql_fetch_assoc($query)) {
            echo "<div>" . $row['myname'] . "</div>";
        }
    } else {
        echo "No Data Found";
    }
}

?>