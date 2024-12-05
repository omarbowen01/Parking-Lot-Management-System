<h2> About The Project </h2>

The purpose of this project is to create a 



<h2> Built With </h2>
. HTML
. CSS
. PHP
. MySQL


<h2> Getting Started </h2>
To get the project up an running locally follow these steps.

<h3> Installation </h3>
1. Download XAMPP to create the apache web server environemnt with PHP and MySQL.
https://www.apachefriends.org/
2. From the parent folder of the downloaded XAMPP package navigate to the htdocs folder
File path: \xampp\htdocs
3. Create a folder within the htdocs folder
4. In your text editor 'cd' into that newly created folder then clone the repo
#git clone https://github.com/omarbowen01/Parking-Lot-Management-System.git 
5. Search 'XAMPP Control Panel' from your taskbar and open it
6. Under the Actions header hit the 'Start' button for the Apache and MySQL rows
7. Click the 'Admin' button for the MySQL row to open up MySQL
8. Click on the database tab and create the database 'admin_login'
9. First go to the admin_login database then go to SQL tab 
10. Next, navigate to the project folder: \DB_Scripts and run all the scripts in each of the folders in order one by one: 
FULL_SCHEMA, ALTER_SCRIPTS, INSERT_SCRIPTS then TRIGGERS
11. Do a CTRL+F for 'mysqli_connect' with the project folder and replace the server name with your mysql server name, the default username should be "root" as aleady writting in the parameters but verify your mysql username and replace as needed.
12. In the browser type in localhost/yourlocalprojectfolder/index.php to get to the landing page

<h2> Contact </h2>
Omar Bowen- Email: omarbowen24@gmail.com
Project Link: https://github.com/omarbowen01/Parking-Lot-Management-System
