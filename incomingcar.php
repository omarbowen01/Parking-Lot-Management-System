<?php echo file_get_contents("header.html"); ?>
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
<?php echo file_get_contents("toplevelnavbarmain.html"); ?>
<?php echo file_get_contents("incomingcar.html"); ?>


<?php

$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$entry_time = $_POST['vehicle-entry'] ?? null;
$license_plate = $_POST['license-input'] ?? null;
$random_floor_id = rand(1,3);


    // Check if both fields are filled
    if (!empty($license_plate) && !empty($entry_time)) {


    $insert_stmt = $link->prepare("INSERT INTO parking_slip(ENTRY_TIME, VEHICLE_NUMBER, FLOOR_ID) VALUES (?,?,?)");
    $insert_stmt->bind_param("sss", $entry_time, $license_plate, $random_floor_id);

        if($insert_stmt->execute()) {
            echo "<div style='margin-left: 40%;'> Successfully Registered new car !
                  </div>";
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'incomingcar.php';
                }, 2000); // Redirect after 3 seconds
            </script>";        
        } else {
            echo "Update failed: " . $update_stmt->error;
        }

        // Close the update statement
        $insert_stmt->close();

        } else {
        echo "Enter customer's license plate and entry time from the camera";
    }
}

mysqli_close($link);
?>


<?php echo file_get_contents("footer.html"); ?>