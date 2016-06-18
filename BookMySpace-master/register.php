<?php
 

//getting post variable
$email=($_POST['email']);
$pass=($_POST['password']);
$name=($_POST['name']);
$mobile=($_POST['mobile']);
 
$error = array();
 
if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
{
		$response["success"] = 0;
        $response["message"] = "Enter Email!!!";
        die(json_encode($response));
}
if(empty($pass)){
$response["success"] = 0;
        $response["message"] = "Enter Password!!!";
        die(json_encode($response));
}
if(empty($name)){
$response["success"] = 0;
        $response["message"] = "Enter Name!!!";
        die(json_encode($response));
}
if(empty($mobile)){
$response["success"] = 0;
        $response["message"] = "Enter Mobile!!!";
        die(json_encode($response));
}


//database configuration
$host = 'localhost';
$database_name = 'bms';
$database_user_name = 'admin';
$database_password = 'admin';
 
//if you have database user name & password then connection may be
//$connection=new Mongo("mongodb://$database_user_name:$database_password@$dbhost");
 
//Currently we are connecting to mongodb without authentication
$connection=new MongoClient("mongodb://$dbhost");
 
//checking the mongo database connection
if($connection){
 
//connecting to database
$databse=$connection->$database_name;
 
//connect to specific collection
$collection=$databse->users;
 
$query=array('mobile'=>$mobile);
//checking for existing mobile
$count=$collection->findOne($query);

$query=array('email'=>$email);
//checking for existing email
$count_e=$collection->findOne($query);
 
if(!count($count)&&!count($count_e)){
//Save the New user
$user_data=array('email'=>$email,'password'=>($pass),'name'=>$name,'mobile'=>($mobile));
$collection->save($user_data);
$response["success"] = 1;
        $response["message"] = "Registered";
        die(json_encode($response));
}else{
$response["success"] = 0;
        $response["message"] = "Mobile or Email already exists";
        die(json_encode($response));
}
 
}else{
 die("Database are not connected");
}
 
?>
