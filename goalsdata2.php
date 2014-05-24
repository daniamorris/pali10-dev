<?php
error_reporting(E_ALL);
include "dbcred.php";
include "DDMmobil.class.php";
$myuuid = 'b710c14d6a29be70';
//$myuuid = $_GET['myuuid'];
$goals = $_GET['goals'];
$notes = $_GET['notes'];

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$DDMdata = new DDMmobil($dbh);

//set goals http://palisades10k.com/app/goals.html
if (isset($_GET['submit']) && $_GET['submit'] == 'insertgoals') {
$DDMdata->setgoal($myuuid, $goals, $notes);
}


/*
echo '<hr>';
$DDMdata->starcount($myuuid);
$DDMdata->milage($myuuid);
echo "you are here without errors";
echo $_GET['myname'];
echo $_GET['goals'];
echo $_GET['notes'];
echo $_GET['submit'];
*/

$stars = $_GET['stars'];
$milage = $_GET['milage'];
$timeframe = $_GET['timeframe'];
$date = $_GET['date'];
$location = $_GET['location'];
$details = $_GET['details'];
$moreinfo = $_GET['moreinfo'];



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