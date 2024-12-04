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
<?php echo file_get_contents("checkoutvehicle.html"); ?>


<?php
$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $exit_time = $_POST['checkout-time'] ?? null;
    $vehicle_number = $_POST['vehicle-number'] ?? null;

        if (!empty($vehicle_number) && !empty($exit_time)) {

            $update_stmt = $link->prepare("UPDATE `parking_slip` SET `EXIT_TIME` = ? WHERE `VEHICLE_NUMBER` = ?");
            $update_stmt->bind_param("ss", $exit_time, $vehicle_number);

            function calculateParkingFee($vehicle_number, $link) {
                // Query to fetch the checkin and checkout time from the database
                $query = "SELECT ENTRY_TIME, EXIT_TIME FROM parking_slip WHERE VEHICLE_NUMBER = ?";
                $stmt = $link->prepare($query);
                $stmt->bind_param("s", $vehicle_number);
                $stmt->execute();
                $stmt->bind_result($checkinTime, $checkoutTime);
                
                // If the record exists, calculate the fee
                if ($stmt->fetch()) {
                    // Convert checkin and checkout time to timestamps
                    $checkinTimestamp = strtotime($checkinTime);
                    $checkoutTimestamp = strtotime($checkoutTime);
                    
                    // Calculate the difference in seconds between checkin and checkout times
                    $timeDifference = $checkoutTimestamp - $checkinTimestamp;
            
                    // Convert time difference to hours, rounding up to charge per hour or part thereof
                    $hoursParked = ceil($timeDifference / 3600); // 3600 seconds in an hour
                    
                    // Calculate the parking fee (assuming $1 per hour)
                    $feeDue = $hoursParked * 1; // $1 per hour
                    
                    return $feeDue;
                } else {
                    // Handle the case where the parking slip ID does not exist
                    return "Parking slip not found.";
                }
            }

            
           

            if ($update_stmt->execute()) {
                echo "<div style='margin-left: 42%; margin-top: 50px;'> Parking Slip Printed. <br> </div>";  
            } else {
                echo "Car is not registered in parking lot." . $update_stmt->error;
            }
            $update_stmt->close();


            $feeDue = calculateParkingFee($vehicle_number, $link);

            $check_wash_stmt = $link->prepare("SELECT `VEHICLE_NUMBER` FROM `uvw_valet_car_wash` WHERE `VEHICLE_NUMBER` = ?");
            $check_wash_stmt->bind_param("s", $vehicle_number);
            $check_wash_stmt->execute();
            $check_wash_stmt->store_result();

            if($check_wash_stmt->num_rows > 0) {
            echo "<div style='margin-left: 42%; margin-top: 15px;'> The parking fee is: $" . $feeDue . " + $30 for the valet car wash. <br> Total Fee is $" . $feeDue + 30 . ". </div>";
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'checkoutvehicle.php';
                }, 3000); // Redirect after 3 seconds
            </script>"; 
            } else {
            echo "<div style='margin-left: 42%; margin-top: 50px;'> The parking fee due is: $" . $feeDue . "</div>";
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'checkoutvehicle.php';
                }, 3000); // Redirect after 3 seconds
            </script>"; 
            }


        } else {
            echo "Enter exit time and parking lot ID number"; 
        }

        $check_wash_stmt->close();
}
mysqli_close($link);
?>









<?php echo file_get_contents("footer.html"); ?>