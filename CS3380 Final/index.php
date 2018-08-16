<?php
$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
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
                 Make weight loss easy by keeping an up to date log of your calorie habits and goals!
            </h1>
            <p id="intro">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et molestie orci. Nunc condimentum semper dignissim. Etiam convallis pretium sagittis. Sed sit amet felis augue. Nunc mattis suscipit libero a elementum. Aliquam erat volutpat. Pellentesque dapibus, ipsum rutrum blandit porttitor, neque est scelerisque odio, at dignissim orci mi vel quam. Quisque et lorem gravida enim dapibus viverra.
            </p>
            
                </div>
        <div>
            <?php
               if($loggedin){
                    echo "<div id='loggedIn'>Logged in as $loggedin</div>";
                } else{
                    echo "<div id='loggedIn'>Not logged in.</div>";
                }
            ?>
        </div>
        
    </body>   
</html>