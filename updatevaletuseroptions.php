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
<?php echo file_get_contents("updatevaletuseroptions.html"); ?>
<?php echo file_get_contents("footer.html"); ?>