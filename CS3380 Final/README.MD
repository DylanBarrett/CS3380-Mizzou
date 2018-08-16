CS3380 Final Project
demonstrates php, sql knowledge

LINK TO WEBSITE

http://ec2-18-219-229-197.us-east-2.compute.amazonaws.com/final/

TABLE NAMES

1.	Users
2. calorielog

APPLICATION DESCRIPTION

We have created an application that allows user to create account to help with their fitness goals, they can watch a video on why it’s important to track calories, look at different diet plans, look at different workout plans, and find recipes that are good for your body. They can also track their calories on a day-to-day basis and go back and see how many calories they burned on any day that they logged them in our application.

Schema

USERS TABLE:
Field	Type	Null	Key	Extra
Id	int(11)	NO	PRI	auto increment
firstName	text	YES		
lastName	text	YES		
username	varchar(255)	NO	UNI	
password	text	NO		
email	text	YES		
birthday	date	YES		
addDate	datetime	YES		
changeDate	datetime	YES		

CALORIELOG TABLE:
Field	Type	Null	Key	Extra
Id	int(11)	NO	PRI	auto increment
userId	int(11	NO		
date	date	NO		
breakfast	int(11)	YES		
lunch	int(11	YES		
dinner	int(11	YES		
other	int(11	YES		

ENTITY RELATIONSHIP DIAGRAM

LINK TO THE ERD
https://drive.google.com/file/d/167FFVuXdyEdPEZ2_0Vpwyl_DIyZsdIh-/view

APP CRUD

CREATE:
On the login page of our application you see the field to enter a username and password if you already have an account and the option to create a new account. After clicking create new account you are brought to a form that allows you to enter you info (i.e first name, last name, etc…) after you enter all this info you click submit and you are now a user in the database. After becoming a user you can now view and enter your calories in the calorie log page. If you don’t have any calorie logs yet you can click on the button to log more calories after doing so you are brought to a form with the 3 meals of the day and other for snacks etc. then you enter the date and submit the information which creates that log in the database.

READ:
after a calorie log is submitted the user can see a table full of the information they just submitted as well as all previous entries. This is done by using select sql to get results from the database and display those results to the user. Inner join is done by joining the id on the users table (users.id) to the user id on the calorie log table (calorielog.userId) to display the users first name, last name, and the calories they logged on that day if they provided input for the calorie log. Not sure what timezone the server is in may need to add calorie log to the next day depending test this for the inner join statement to display the inputted data correctly.

UPDATE:
when navigating to the calorie log page after making an entry in the database you can go back and edit the entry to either increase or decrease you calorie eaten per meal which will update your total calories eaten for the day

DELETE:
when navigating to the calorie log page and making an entry in the database you can delete the entries that you wish to delete by clicking the corresponding delete key to the date that you want to delete.

Video URL https://youtu.be/ae_mzA8MBE0
