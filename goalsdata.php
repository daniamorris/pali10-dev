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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
    <title>The Palisades Will Rogers 5 and 10K July 4th Run</title>
    <script src="phonegap.js"></script>
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Palisades10k.com</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="train.html">Train</a></li>
            <li><a href="score.html">Score</a></li>
            <li class="active"><a href="race.html">Race</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
        
    <div class="container">

      <div class="starter-template">
        <p>
<a href="train.html" class="btn btn-primary btn-lg btn-block" role="button">Train</a>
<a href="score.html" class="btn btn-primary btn-lg btn-block" role="button">Score</a>
<a href="race.html" class="btn btn-primary btn-lg btn-block" role="button">Race</a>
</p>

        <p class="lead">Special thanks to our title sponsor:<br> 
        <a href="#" onclick="window.open('http://newstjohns.org', '_system');">Saint John's Health Center.</a></p>
     	<p class="lead"><img src="race-images/stjohnslogo.png" alt="St. Johns" width="160" height="82"></p>
     	<p class="lead"><img src="race-images/_MG_1248.jpg" height="133" width="200" class="img-thumbnail" alt="5k 10k Run" /></p>
      </div>

    </div><!-- /.container -->
	<div id="footer">
		<div class="container">
			<p class="text-muted">Copyright &copy; 2000-<script language=Javascript>
			<!-- 
			var today_date= new Date()
			var myyear=today_date.getFullYear()
			document.write(myyear)
			// -->
			</script>. All Rights Reserved. Palisades/Will Rogers 5K &amp; 10K Run</p>
		</div>
	</div>
        <script type="text/javascript" src="phonegap.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
