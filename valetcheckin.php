<?php 

$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$val_checkin_licnse = $_POST['incoming-valet'] ?? null;
$val_checkin_time = $_POST['check-in-time'] ?? null;
$floor_id = 1;
$is_valet = 1;


    // Check if both fields are filled
    if (!empty($val_checkin_licnse) && !empty($val_checkin_time)) {


    $insert_stmt = $link->prepare("INSERT INTO parking_slip(VEHICLE_NUMBER, ENTRY_TIME, FLOOR_ID, IS_VALET) VALUES (?,?,?,?)");
    $insert_stmt->bind_param("ssss", $val_checkin_licnse, $val_checkin_time, $floor_id, $is_valet);

        if($insert_stmt->execute()) {
            echo "Successfully Checked in Valet Car !";
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'valet.php';
                }, 2000); // Redirect after 3 seconds
            </script>";        
        } else {
            echo "Update failed: " . $insert_stmt->error;
        }

        // Close the update statement
        $insert_stmt->close();

        } else {
        echo "Enter valet customer's license plate and entry time from the camera";
    }



}


$link->close(); 
?> 
