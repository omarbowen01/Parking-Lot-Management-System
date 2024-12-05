<h2> About The Project </h2>

The purpose of this project is to create a parking lot management system for a therotical parking lot company. The intended users are employees of the company that manage the cars in the parking lot. Users will be able to login/logout, modify account details, delete an account, checkin/checkout cars, checkin/checkout valet cars, fill out feedback forms and send emails to the developer(myself), view floor/total garage occupancy, schedule valet car washes and watch training videos on how to use the website.



<h2> Built With </h2>
<ul>
  <li> HTML5 </li>
  <li> CSS </li>
  <li> PHP </li>
  <li> MySQL </li>
</ul> 

<h2> Getting Started </h2>
To get the project up an running locally follow these steps.

<h3> Installation </h3>
1. Download XAMPP to create the apache web server environemnt with PHP and MySQL. 
https://www.apachefriends.org/ <br> 
2. From the parent folder of the downloaded XAMPP package navigate to the htdocs folder
File path: \xampp\htdocs <br> 
3. Create a folder within the htdocs folder <br> 
4. In your text editor 'cd' into that newly created folder then clone the repo
#git clone https://github.com/omarbowen01/Parking-Lot-Management-System.git <br> 
5. Search 'XAMPP Control Panel' from your taskbar and open it <br> 
6. Under the Actions header hit the 'Start' button for the Apache and MySQL rows <br> 
7. Click the 'Admin' button for the MySQL row to open up MySQL <br> 
8. Click on the database tab and create the database 'admin_login' <br> 
9. First go to the admin_login database then go to SQL tab  <br> 
10. Next, navigate to the project folder: \DB_Scripts and run all the scripts in each of the folders in order one by one: 
FULL_SCHEMA, ALTER_SCRIPTS, INSERT_SCRIPTS then TRIGGERS <br> 
11. Do a CTRL+F for 'mysqli_connect' with the project folder and replace the server name with your mysql server name, the default username should be "root" as aleady writting in the parameters but verify your mysql username and replace as needed. <br> 
12. In the browser type in localhost/yourlocalprojectfolder/index.php to get to the landing page <br> 

<h2> Contact </h2>
Omar Bowen- Email: omarbowen24@gmail.com <br>
Project Link: https://github.com/omarbowen01/Parking-Lot-Management-System
