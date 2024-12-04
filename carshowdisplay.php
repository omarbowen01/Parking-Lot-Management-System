<?php
// Connect to the database
$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}


$sql = "SELECT * FROM uvw_valet_car_wash";
        $result = $link->query($sql);

            if ($result->num_rows > 0) {
                echo "<div style='margin-left: 42%;'><table><tr><th> License Plates of Cars Scheduled for Car Wash </th> </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["VEHICLE_NUMBER"] . "</td></tr>";
                }
                echo "</table> </div>";
            } else {
                echo "0 results";
            }

$link->close(); 
?>