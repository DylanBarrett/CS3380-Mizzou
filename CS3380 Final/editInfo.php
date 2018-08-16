<?php
 if(!session_start()){
        header("Location: error.php");
        exit;
    }

$action = empty($_GET['action']) ? '' : $_GET['action'];


if ($action == 'do_log') {
		handle_log(); 
	} else {
		login_form();
	}
function handle_log(){
    if(empty($_GET['date'])){
        $error = 'Error: Please select a date';
        require "calorieLogForm.php";
        exit;
    }
    $date = empty($_GET['date']) ? '' : $_GET['date'];
    $breakfast = empty($_GET['breakfast']) ? '0' : $_GET['breakfast'];
    $lunch = empty($_GET['lunch']) ? '0' : $_GET['lunch'];
    $dinner = empty($_GET['dinner']) ? '0' : $_GET['dinner'];
    $other = empty($_GET['other']) ? '0' : $_GET['other'];
   
    

   require_once "./db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    $id = empty($_SESSION['logId']) ? '99' : $_SESSION['logId'];
    
    $date = $mysqli->real_escape_string($date);
    $breakfast = $mysqli->real_escape_string($breakfast);
    $lunch = $mysqli->real_escape_string($lunch);
    $dinner = $mysqli->real_escape_string($dinner);
    $other = $mysqli->real_escape_string($other);
 
     $query =  "update calorielog set date ='$date', breakfast = '$breakfast', lunch = '$lunch', dinner = '$dinner', other = '$other' where id = '$id';";
    
    
    if($mysqli->query($query) === TRUE){
       $mysqli->close();
        $error = "<div class='center'>Calorie log updated successfully!</div>";
        
    
    } else {
        $error = "<div class='center'>Updating the calorie log was unsuccessful.</div>";
    }
    
    require "calorieLog.php";
}

function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
	}

?>