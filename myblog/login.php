 <?php
 $dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = ' ';
 session_start();
//do the connection
$conn = mysql_connect($dbhost, $dbuser, "") or die ('Error connecting to mysql');
 



    //Connect to server

    $dbname = 'blog';
mysql_select_db($dbname, $conn);
 

    //Select the database

 

    // Get the login credentials from user

    $username = $_POST['username'];

    $userpassword = $_POST['password'];

     $type=$_POST['select'];

    // Secure the credentials

    $username = mysql_real_escape_string($_POST['username']);
    $userpassword = mysql_real_escape_string($_POST['password']);
 
 if($type=="Student")
 {
	     $query = "SELECT * FROM users WHERE username = '$username' AND password = '$userpassword'";

 }
 if($type=="Faculty")
 {
	     $query = "SELECT * FROM faculty WHERE username = '$username' AND password = '$userpassword'";

 }
 
 
 
 
 
    // Check the users input against the DB.
    

    $result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
     

    $row = mysql_fetch_assoc($result);

     

    if ($row)

    {

        $_SESSION['loggedIn'] = "true";
		
		if($type=="Student")
		{
			header("Location: new_post.html");
		}
		if($type=="Faculty")
		{

        header("Location: Readpost.html");
		}

    }

    else

    {

        $_SESSION['loggedIn'] = "false";

        echo "<p>Login failed, username or password incorrect.</p>";

    }
	?>
