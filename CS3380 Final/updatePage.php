<?php
              header("Access-Control-Allow-Origin: *");      
                $id = empty($_GET['pageId']) ? 'home' : $_GET['pageId'];

                switch($id){
                    case 'home':
                                $json->content = "<h1 id='pageTitle'>Make weight loss easy by keeping an up to      date log of your calorie habits and goals!</h1>
                                 <p id='intro'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et molestie orci. Nunc condimentum semper dignissim. Etiam convallis pretium sagittis. Sed sit amet felis augue. Nunc mattis suscipit libero a elementum. Aliquam erat volutpat. Pellentesque dapibus, ipsum rutrum blandit porttitor, neque est scelerisque odio, at dignissim orci mi vel quam. Quisque et lorem gravida enim dapibus viverra.</p>";
                                $json->tips = "";
                                
                                echo json_encode($json);
                                 break;
                        
                    case 'tips': $json->content =  " <h1 id='pageTitle'> Why keep track of calories?
                                </h1> <iframe id='tipVideo'  src='https://www.youtube.com/embed/Zus8gkwkPvs'> </iframe>
                                                <h1 id='pageTitle'>
                                                    Scroll down for some helpful links to help you on your weight loss journey!
                                                </h1>
                                                <div id='pictureLinks'>
                                                    <div class='imageDiv'>
                                                        <a href='https://www.everydayhealth.com/diet-nutrition/diets-a-to-z.aspx'>
                                                            <img class='imageStyle' src='./images/diet.jpg' alt='dietPicture'>
                                                        </a>
                                                        <h3 class='color2'>List of Diets</h3>
                                                    </div>
                                                    <div class='imageDiv'>
                                                        <a href='https://www.muscleandstrength.com/workout-routines'>
                                                            <img class='imageStyle' src='./images/workout.jpg' alt='workoutPicture'>
                                                        </a>
                                                        <h3 class='color2'>List of workouts</h3>
                                                    </div>
                                                    <div class='imageDiv'>
                                                        <a href='http://www.eatingwell.com/recipes/18045/weight-loss-diet/'>
                                                            <img class='imageStyle' src='./images/food.jpg' alt='foodPicture'>
                                                        </a>
                                                        <h3 class='color2'>List of recipes</h3>
                                                    </div>
                                                </div>";
                        
                                echo json_encode($json);
                                 break;
                    
                        
                }
     
                   
?>

