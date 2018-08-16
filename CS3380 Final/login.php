<?php
if(!session_start()){
        header("Location: error.php");
        exit;
    }
 $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

if ($loggedin) {
        header("Location: calorieLog.php");
        exit;
    }
$action = empty($_POST['action']) ? '' : $_POST['action'];



if ($action == 'do_login') {
		handle_login(); 
	} else {
		login_form();
	}

function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	   //db creditentials
require_once "./db.conf";
//reference to my database, if this line i successfull...
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 //test data base connection, connent_errno is the error number, stored in json 
 if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        if($password != 'pass'){
        $password = sha1($password); 
        }
        $query = "select id from users WHERE username = '$username' AND password = '$password'";
    
        $result = $mysqli->query($query);
    
    
        if($result){
            $match = $result->num_rows;
            
            if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                $row = $result->fetch_assoc();
                                
                $_SESSION['id'] = $row['id'];
                
                $result->close();
                $mysqli->close();
                
                header("Location: calorieLog.php");
                exit;
            }
            else {
                $error = "Error: Incorrect username or password";
                require "loginForm.php";
                exit;
            }
        }
	
	}

function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
	}



?>