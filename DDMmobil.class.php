<?php
class DDMmobil
{
  /**
   * Instance of database connection class
   * @access protected
   * @var PDO object
   */
  protected $db;
	
  function __construct(PDO $db)
  {
    $this->db       = $db;
  }

   public function scoreboard($myuuid)
  {

    try
    {
      $sql = "SELECT * FROM scoreboard WHERE uuid=:myuuid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':myuuid', $myuuid);
      $stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		printf("<p><b>Stars:</b> %s</p><p><b>Total milage:</b> %s</p><p><b>Total time:</b> %s</p><p><b>Goals:</b> %s %s</p>", $row["stars"], $row["milage"], $row["timeframe"], $row["goals"], $row["notes"]);
		}
    }
    
	catch (PDOException $e)
	{
  	echo 'PDO Exception Caught.  ';
  	echo 'Error with the database: <br />';
  	echo 'SQL Query: ', $sql;
  	echo 'Error: ' . $e->getMessage();
	}
	echo '<div class="clear"> </div>';

  }

   public function starcount($myuuid)
  {

    try
    {
      $sql = "SELECT SUM(stars) FROM scoreboard WHERE uuid=:myuuid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':myuuid', $myuuid);
      $stmt->execute();
      
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		printf("<p><b>Stars:</b> %s</p>", $row["SUM(stars)"]);
		}
		
    }
    
	catch (PDOException $e)
	{
  	echo 'PDO Exception Caught.  ';
  	echo 'Error with the database: <br />';
  	echo 'SQL Query: ', $sql;
  	echo 'Error: ' . $e->getMessage();
	}
	echo '<div class="clear"> </div>';

  }

   public function milage($myuuid)
  {

    try
    {
      $sql = "SELECT SUM(milage) FROM scoreboard WHERE uuid=:myuuid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':myuuid', $myuuid);
      $stmt->execute();
      
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		printf("<p><b>Total milage:</b> %s</p>", $row["SUM(milage)"]);
		}
		
    }
    
	catch (PDOException $e)
	{
  	echo 'PDO Exception Caught.  ';
  	echo 'Error with the database: <br />';
  	echo 'SQL Query: ', $sql;
  	echo 'Error: ' . $e->getMessage();
	}
	echo '<div class="clear"> </div>';

  }

   public function setgoal($myuuid, $goals, $notes)
  {

    try
    {
      $sql = "INSERT INTO mygoals (id,uuid,goals,notes) VALUES (NULL, :myuuid, :goals, :notes)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':myuuid', $myuuid);
      $stmt->bindParam(':goals', $goals);
      $stmt->bindParam(':notes', $notes);
      $stmt->execute();
      /*
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		printf("<p><b>Total milage:</b> %s</p>", $row["SUM(milage)"]);
		}
		*/
		echo "goals inserted";
    }
    
	catch (PDOException $e)
	{
  	echo 'PDO Exception Caught.  ';
  	echo 'Error with the database: <br />';
  	echo 'SQL Query: ', $sql;
  	echo 'Error: ' . $e->getMessage();
	}
	echo '<div class="clear"> </div>';

  }

}

?>