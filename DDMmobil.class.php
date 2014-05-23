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
		printf("<p>Stars: %s</p><p>milage: %s</p><p>goals: %s</p><p>Notes: %s</p>", $row["stars"], $row["milage"], $row["goals"], $row["notes"]);
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
}

?>