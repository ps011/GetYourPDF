<?php

// connect to mongodb
   $m = new MongoClient();
  // echo "Connection to database successfully";
   // select a database
   $db = $m->bms;
  // echo "Database mydb selected";
  
  
if (!empty($_POST)) {
    //gets user's info based off of a username.
   try {
        $database = $m->$db->users; //Selects the user collection
			$userDatabaseFind = $database->find(array('mobile' => $_POST['mobile'])); //Does a search for Mobile with the posted mobile Variable
				
				//Iterates through the found results
				foreach($userDatabaseFind as $userFind) {
				    $storedUsername = $userFind['mobile'];
				    $storedPassword = $userFind['password'];
				}
	
		if($_POST['mobile'] == $storedUsername && $_POST['password'] == $storedPassword)
		{   
		$response["success"] = 1;
        $response["message"] = "Login Success!!!";
        die(json_encode($response));
        }
		else{
		 $response["success"] = 0;
        $response["message"] = "Error. Please Try Again!";
        die(json_encode($response));	
				
			}
		}		
					
    catch (Exception $ex) {
        // For testing, you could use a die and message. 
       // die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one to product JSON data:
       
    }
	}
?>
