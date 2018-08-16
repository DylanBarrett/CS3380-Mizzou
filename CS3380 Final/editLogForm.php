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
$_SESSION['logId'] = empty($_GET['id']) ? '' : $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Calories Count</title>
        <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script src="script.js" type="text/javascript"></script>
        <link href="style.css" type="text/css" rel="stylesheet">
      
    </head> 
    <body>
        <div id="head">Calories Count</div>
        <nav>
                <ul id="navList">
                    
                     <li class="navTabs borderRight" ><a href="#" id="home">Home</a></li>
                        

                           <li class="navTabs borderRight" ><a href="#" id="tips">Tips</a></li>
            
                    <li class="navTabs borderRight"><a href='calorieLog.php'>Calorie Log</a></li>
                        
                    <li class="navTabs"><a href='loginForm.php'>Log In</a></li>
                        
                </ul>
        </nav>
      <div id="tab">
           <pre id="tabTitle">Quick Links</pre>
           <ul id="tabList">
                <li class="tabListItems color" onclick="updatePage('home')">Home</li>
               
                <li class="tabListItems color" onclick="updatePage('tips')">Tips</li>
               
                <li class="tabListItems"><a href='calorieLog.php'>Calorie Log</a></li>
               
                <li class="tabListItems"><a href='loginForm.php'>Log In</a></li>
           </ul>
        </div>
        <div id="contentBox">
           
              <h1 id="pageTitle">
                 Enter in your calories for the day!
            </h1>
            <?php
                if($error){
                    echo "<div class='center'>$error</div>";
                }
            ?>
          <div id="logFormDiv">
             <form action="editInfo.php" method="GET">
                 <input type='hidden' name='action' value='do_log'>
            <div>
                 <label for='date' id="dateLabel">Date: </label>
                <input type="date" id='date' name='date'>
            </div>
            <div>
                 <label for='breakfast' id="breakfastLabel">Breakfast: </label>
                <input class="align" type="number" id='breakfast' name='breakfast'>
            </div>
                 <div>
                  <label for='lunch' id="lunchLabel">Lunch: </label>
                <input type="number" id='lunch' name='lunch'>
            </div>
                 <div>
                 <label for='dinner' id="dinnerLabel">Dinner: </label>
                <input type="number" id='dinner' name='dinner'>
            </div>
                 <div>
                 <label for='other' id="otherLabel">Other: </label>
                <input type="number" id='other' name='other'>
            </div>
                <div>
                 <input type='submit' value='Submit' id="calorieLogSubmit">
                 </div>
            </form>
              <a href='calorieLog.php'>Click here to view your logged calories!</a>
          </div>  
            
                </div>
        <div id="tipLinks">
        
        </div>

        <?php
                if($loggedin){
                    echo "<div id='loggedIn'>Logged in as $loggedin</div>";
                } else{
                    echo "<div id='loggedIn'>Not logged in.</div>";
                }
            ?>
    </body>   
</html>