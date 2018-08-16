<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri
	
    if(!session_start()){
        header("Location: error.php");
        exit;
    }
    //destorying all session data by assigning a new array
    $_SESSION = array();

    session_destroy();
	
	header("Location: loginForm.php");
	exit;
?>
