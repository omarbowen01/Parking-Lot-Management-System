<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("toplevelnavbarmain.html"); ?>
<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Display the username at the top of the page
    echo "<div style='text-align: right; margin-right: 81%;'>
            Username: " . htmlspecialchars($_SESSION['username']) . "
          </div>";
} else {
    // If not logged in, redirect to login page or show a guest message
    echo "<div style='text-align: right; padding: 10px;'>
            Welcome, Guest!
          </div>";
}
?>

<?php echo file_get_contents("valet.html"); ?>
<?php
$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}



$sql = "SELECT NUMBER_OF_BLOCKS FROM floor WHERE FLOOR_ID = 1"; // your SQL query 
$result = $link->query($sql); 
 
if ($result->num_rows > 0) { 
    // Output data of each row 
    echo "<div id= 'table' style='margin-left: 550px; font-size: 20px; padding: 10px;'>
         <table><tr><th>Total Valet Spaces Available</th></tr>
         </div>"; // Adjust headers as needed 
    while($row = $result->fetch_assoc()) { 
        echo "<tr><td>" . $row["NUMBER_OF_BLOCKS"] . "</td></tr>"; // Adjust according to your columns 
    } 
    echo "</table>"; 
} else { 
    echo "0 results"; 
} 


$sql = "SELECT NUMBER_OF_BLOCKS FROM floor WHERE FLOOR_ID = '2'"; // your SQL query 
$result = $link->query($sql); 
 
if ($result->num_rows > 0) { 
    // Output data of each row 
    echo "<table><tr><th>Total Spaces on Floor 2 </th></tr>"; // Adjust headers as needed 
    while($row = $result->fetch_assoc()) { 
        echo "<tr><td>" . $row["NUMBER_OF_BLOCKS"] . "</td></tr>"; // Adjust according to your columns 
    } 
    echo "</table>"; 
} else { 
    echo "0 results"; 
} 

$sql = "SELECT NUMBER_OF_BLOCKS FROM floor WHERE FLOOR_ID = '3'"; // your SQL query 
$result = $link->query($sql); 
 
if ($result->num_rows > 0) { 
    // Output data of each row 
    echo "<table><tr><th>Total Spaces on Floor 3 </th></tr>"; // Adjust headers as needed 
    while($row = $result->fetch_assoc()) { 
        echo "<tr><td>" . $row["NUMBER_OF_BLOCKS"] . "</td></tr>"; // Adjust according to your columns 
    } 
    echo "</table>"; 
} else { 
    echo "0 results"; 
} 







$link->close(); 
?> 

<?php echo file_get_contents("footer.html"); ?>