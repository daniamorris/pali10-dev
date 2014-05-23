<?php
/*
error_reporting(E_ALL);
echo $_GET['uuid'];
echo $_GET['myname'];
echo $_GET['goals'];
echo $_GET['notes'];
echo $_GET['submit'];
*/
$goals = $_GET['goals'];
$notes = $_GET['notes'];
$stars = $_GET['stars'];
$milage = $_GET['milage'];
$timeframe = $_GET['timeframe'];
$date = $_GET['date'];
$location = $_GET['location'];
$details = $_GET['details'];
$moreinfo = $_GET['moreinfo'];

include "dbcred.php";
$db = mysql_connect("localhost", $user, $password);
mysql_select_db($db_name,$db);

//scoreboard testing http://palisades10k.com/app/score.html
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

//set goals http://palisades10k.com/app/goals.html
//can echo $query; for debugging on the following inserts
if (isset($_GET['submit']) && $_GET['submit'] == 'insertgoals') {
    $query = mysql_query("INSERT INTO scoreboard (id,goals,notes) VALUES (NULL, '$goals', '$notes')", $db);
    if (mysql_affected_rows() > 0) {
        while ($row = mysql_fetch_assoc($query)) {
            echo "<div>" . $row['goals'] . "</div>";
        }
    } else {
        echo "No Data Found";
    }
}

//log training http://palisades10k.com/app/log.html
if (isset($_GET['submit']) && $_GET['submit'] == 'logtrain') {
    $query = mysql_query("INSERT INTO scoreboard (id,stars,milage,timeframe) VALUES (NULL, '$stars', '$milage','$timeframe')", $db);
    if (mysql_affected_rows() > 0) {
        while ($row = mysql_fetch_assoc($query)) {
            echo "<div>" . $row['milage'] . "</div>";
        }
    } else {
        echo "No Data Found";
    }
}

//insert event http://palisades10k.com/app/train.html
if (isset($_GET['submit']) && $_GET['submit'] == 'trainevent') {
    $query = mysql_query("INSERT INTO events (id,date,location,details,moreinfo) VALUES (NULL, '$date', '$location', '$details','$moreinfo')", $db);
    if (mysql_affected_rows() > 0) {
        while ($row = mysql_fetch_assoc($query)) {
            echo "<div>" . $row['moreinfo'] . "</div>";
        }
    } else {
        echo "No Data Found";
    }
}

?>