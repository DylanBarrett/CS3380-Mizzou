
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
           
             <h1 id='pageTitle'>
                 Create Account
             </h1>
               <?php
                if($error){
                    echo "<div class='center'>$error</div>";
                }
            ?>
            <div class='center'>
                 <form name='alecsForm' action='createUser.php' method='POST' >
            
            <input type='hidden' name='action' value='do_create'>
            
            <div>
                <label for='firstName'>First name:</label>
                <input type='text' id='firstName' name='firstName'>
            </div>
            
            <div>
                <label for='lastName'>Last name:</label>
                <input type='text' id='lastName' name='lastName'>
            </div>
            
            <div>
                <label for='username'>User name:</label>
                <input type='text' id='username' name='username'>
            </div>
            
            <div>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password'>
            </div>
            
            <div >
                <label for='confirmPass'>Confirm Password:</label>
                <input type='password' id='confirmPass' name='confirmPass'>
            </div>
            
             <div >
                <label for='birthday'>Birthday:</label>
                <input type='date' id='birthday' name='birthday' >
            </div>
            
            <div>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email'>
            </div>
            
            
            <div>
                <input type='submit' value='Submit'>
            </div>
            </form>
        </div>
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