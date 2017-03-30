<?php 

$databaseFile = getcwd(). "SWEN344DB.db";

    try
	{
		$sqlite = new SQLite3($GLOBALS ["databaseFile"]);
		INSERT INTO CoopCompany (STUDENTID, NAME, ADDRESS) VALUES (1, "Company", "Address");
		
		//prepare query to protect from sql injection
			
		
	}
	catch (Exception $exception)
	{
	   echo "FAILED";	
	}
    echo "SUCCESS";

?>