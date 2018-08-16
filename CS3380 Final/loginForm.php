<?php
session_start();
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
            <?php
                $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
            
                if(!$loggedin){
                    echo "<div id='logInDiv'>";
                
                    if($error){echo '<div>'.$error.'</div>';}
                  
                   echo "<h1 id='pageTitle'>
                        Log In
                    </h1>
                  <form action='login.php' method='POST'>
                     <input type='hidden' name='action' value='do_login'>
                     
                    <div class='center'>                                   
                     <label for='username'>Username: </label>
                     <input type='text' id='username' name='username' autofocus value='$username'>
                    </div>
                    
                    <div class='center'>
                    <label for='password'>Password:</label>
                    <input class='align' type='password' id='password' name='password'>
                    </div>
                    
                    <div class='center'>
                    <input type='submit' value='Login'>
                    </div>
                    
                  </form>
                  <div class='center'><a href='createUserForm.php''>Click here to create an account!</a></div>
              </div>";
                } else {
                    echo "
                    <h1 id='pageTitle'>
                        Log Out
                    </h1>
                    
                    <a href='logout.php' class='center'>Logout</a>";
                }
            ?>
            
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