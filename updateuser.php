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


<?php echo file_get_contents("updatenavbar.html"); ?>
<?php echo file_get_contents("updateuser.html"); ?>


<?php
// Connect to the database

$link = mysqli_connect("127.0.0.1", "root", "", "admin_login");

//Check for connection errors
if (!$link) {
    die("Could not connect to database: " . mysqli_connect_error());
}

// Get the form data (ensure it's a POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the current and new username from the form
    $current_username = $_POST['current-user'] ?? null;  // current username (add it to your form)
    $new_username = $_POST['update-user'] ?? null;       // new username to be updated

    // Check if both fields are filled
    if (!empty($current_username) && !empty($new_username)) {

        // Step 1: Check if the current username exists in the database
        $check_stmt = $link->prepare("SELECT `user_id` FROM `users` WHERE `username` = ?");
        $check_stmt->bind_param("s", $current_username);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            // Username exists, proceed to update

            // Step 2: Prepare the update query
            $update_stmt = $link->prepare("UPDATE `users` SET `username` = ? WHERE `username` = ?");
            $update_stmt->bind_param("ss", $new_username, $current_username);

            // Execute the update query
            if ($update_stmt->execute()) {
                echo "<div style='margin-left: 40%';'> Successfully Updated Username!
                        </div>";
                echo "<script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 1500); // Redirect after 1.5 seconds
                </script>"; 
            } else {
                echo "Update failed: " . $update_stmt->error;
            }

            // Close the update statement
            $update_stmt->close();

        } else {
            // Username does not exist
            echo '<div style="text-align: center; margin-bottom: 50px;">
                        The current username does not exist in the database.
                    </div>';
        }

        // Close the check statement
        $check_stmt->close();

    } else {
        echo '<div style="text-align: center; margin-bottom: 50px;">
                        Both the current and new username fields are required.
                    </div>';
    }
}

// Close the database connection
mysqli_close($link);
?>

<?php echo file_get_contents("footer.html"); ?>