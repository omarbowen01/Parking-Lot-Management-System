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
<?php echo file_get_contents("carwash.html"); ?>
<?php echo file_get_contents("toplevelnavbarmain.html"); ?>

<?php

$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $license_plate = $_POST['carwash-license'];

    $check_stmt = $link->prepare("SELECT VEHICLE_NUMBER FROM uvw_parking_slip WHERE VEHICLE_NUMBER = ? AND FLOOR_ID = 1 AND `TIME(ENTRY_TIME)` > '08:00:00' AND `TIME(ENTRY_TIME)` < '16:00:00' ");
    $check_stmt->bind_param("s", $license_plate);
    $check_stmt->execute();
    $check_stmt->store_result();


        // Check if both fields are filled
        if (($check_stmt->num_rows > 0) && !empty($license_plate)) {
    

                $update_stmt = $link->prepare("UPDATE parking_slip SET HAS_CAR_WASH = 1 WHERE VEHICLE_NUMBER = ?");
                $update_stmt->bind_param("s", $license_plate);
            
                    if($update_stmt->execute()) {
                        echo "<div style='margin-left: 30%;'> Car successfully schedule for car wash! $30 car wash Fee added to balance!
                              </div>";
                        echo "<script>
                            setTimeout(function(){
                                window.location.href = 'carwash.php';
                            }, 3000); // Redirect after 3 seconds
                        </script>";        
                    } else {
                        echo "Update failed: " . $update_stmt->error;
                    }
            
                    // Close the update statement
                    $update_stmt->close();
    
            } else {
            echo "<div style='margin-left: 20%;'> Customer is not registered as Valet or hasn't <br> checked in within the required timeframe. </div>";
            echo "<script>
                            setTimeout(function(){
                                window.location.href = 'carwash.php';
                            }, 2000); // Redirect after 3 seconds
                        </script>";   
        }

    }
    
    mysqli_close($link);
    ?>

<?php include 'carshowdisplay.php';?>
<?php echo file_get_contents("footer.html"); ?>