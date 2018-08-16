<?php
	if(!session_start()){
        header("Location: error.php");
        exit;
    }
	$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	
	if (!$loggedin) {
		header("Location: loginForm.php");
		exit;
	} 

  $id = empty($_GET['id']) ? '' : $_GET['id'];
   
    

   require_once "./db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
  
    $id = $mysqli->real_escape_string($id);
   echo $id;
 
     $query =  "delete from calorielog where id='$id'";
    $result = $mysqli->query($query);

    if($result === TRUE){
       $mysqli->close();
        
    require "calorieLog.php";
    exit;
    } else{
        $error = "Error, unable to delete log.";
        require "calorieLog.php";
        exit;
    }
    
?>