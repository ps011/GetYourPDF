<?php

	 $DB_host = "localhost";
	 $DB_user = "u307431508_pm";
	 $DB_pass = "HUAIKPk6zO";
	 $DB_name = "u307431508_db";
	 
	 $MySQLi_CON = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLi_CON->connect_errno)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }

?>
