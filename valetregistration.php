<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("navbar.html"); ?>
<?php echo file_get_contents("valetregistration.html"); ?>


<?php if (isset($_POST['register'])) { 

// Connect to the database 
$mysqli = new mysqli("127.0.0.1", "root", "", "admin_login"); 

// Check for errors 
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 

// Prepare and bind the SQL statement 
$stmt = $mysqli->prepare("INSERT INTO valet_users (username, password) VALUES (?, ?)"); 
$stmt->bind_param("ss", $username, $password); 

// Get the form data 
$username = $_POST['username']; 
$password = $_POST['password']; 

// Hash the password 
$password = password_hash($password, PASSWORD_DEFAULT); 

// Execute the SQL statement 
if ($stmt->execute()) { 
    echo "New account created successfully!"; 
    echo "<script>
    setTimeout(function(){
        window.location.href = 'valetlogin.php';
    }, 1500); // Redirect after 1.5 seconds
  </script>";        
} else { 
    echo "Error: " . $stmt->error; 
      } 

// Close the connection 
$stmt->close(); 
$mysqli->close(); }

