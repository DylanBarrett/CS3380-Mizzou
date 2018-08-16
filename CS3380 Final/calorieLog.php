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
                <li class="tabListItems color " onclick="updatePage('home')">Home</li>
               
                <li class="tabListItems color " onclick="updatePage('tips')">Tips</li>
               
                <li class="tabListItems "><a href='calorieLog.php'>Calorie Log</a></li>
               
                <li class="tabListItems"><a href='loginForm.php'>Log In</a></li>
           </ul>
        </div>
        <div id="contentBox">
           
              <h1 id="pageTitle">
                 Calorie log for <?php echo "$loggedin"; ?>
            </h1>
            <?php
                if($_SESSION['error']){echo '<div>'.$_SESSION['error'].'</div>';}
            
                require_once "./db.conf";
    
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
                if($mysqli->connect_error){
                        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
                    }
            $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
  
            $query = "select * from calorielog where userId='$id' order by date desc";
            
           if($result = $mysqli->query($query)){
                echo "<div>
                        <table id='calorieTable'>
                            <tr>
                                <th>Date</th>
                                <th>Breakfast</th>
                                <th>Lunch</th>
                                <th>Dinner</th>
                                <th>Other</th>
                                <th>Total</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>";
                while($row = $result->fetch_assoc()){
                    $total = $row['breakfast'] + $row['lunch'] + $row['dinner'] +
                                $row['other'];
                    $date = date("m-d-Y", strtotime($row['date']));
                    echo "<tr>
                            <td>".$date."</td>
                            <td>".$row['breakfast']." cals</td>
                            <td>".$row['lunch']." cals</td>
                            <td>".$row['dinner']." cals</td>
                            <td>".$row['other']." cals</td>
                            <td>".$total." cals</td>
                            <td>
                                <form action='editLogForm.php' method='GET'>
                                    <input type='hidden' name='id' value=".$row['id'].">
                                    <input class='center' type='submit' value='Edit'>
                                </form>
                            </td>
                            <td>
                                <form action='deleteLog.php' method='GET'>
                                    <input type='hidden' name='id' value=".$row['id'].">
                                    <input class='center' type='submit' value='Delete'>
                                </form>
                            </td>
                        </tr>";
                }
                echo "</div>";
                echo "<div class='center'><a href='calorieLogForm.php'>Click here to log more calories!</a></div>";
                
                $query = "select users.firstName, users.lastName, calorielog.date, calorielog.breakfast, calorielog.lunch, calorielog.dinner, calorielog.other from users inner join calorielog on users.id = calorielog.userId where calorielog.date = date(now()) AND users.id='$id'";
                }
                if($result = $mysqli->query($query)){
                    $count=0;
                    $total=0;
                    $firstname=0;
                    $lastname=0;
                    $breakfast=0;
                    $lunch=0;
                    $dinner=0;
                    $other=0;
                    while($row = $result->fetch_assoc()){
                    $total += $row['breakfast'] + $row['lunch'] + $row['dinner'] + $row['other'];
                    $firstname = $row['firstName'];
                    $lastname = $row['lastName'];
                    $breakfast += $row['breakfast'];
                    $lunch += $row['lunch'];
                    $dinner += $row['dinner'];
                    $other += $row['other'];
                    $count++;
                    $entries = "according to one entry";
                    if($count>1){
                        $entries = "according to multiple entries";
                    }
                    }
                if($firstname!= ''){
                echo "<div id='todayTotal'>
                        ".$firstname." ".$lastname." has consumed ".$breakfast." calories for breakfast, ".$lunch." calories for lunch, ".$dinner." calories for dinner, and ".$other." calories in between meals today (".$entries."). A total of ".$total." calories.
                    </div>";
                    }
                }
                $mysqli->close();
                $result->close();
            
              
            ?>
                </div>
        <div id="tipLinks">
        
        </div>
        <?php
              if($loggedin){
                    echo "<div id='loggedIn'>Logged in as $loggedin</div>";
                } else{
                    echo "<div id='loggedIn'>Not logged in.</div>";
                }
            exit;
            ?>
      
         
    </body>   
</html>