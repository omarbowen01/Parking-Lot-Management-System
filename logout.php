<?php echo file_get_contents("header.html"); ?>

<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Display the username at the top of the page
    echo "<div style='margin-left: 46%;'>
            Username: " . htmlspecialchars($_SESSION['username']) . "
          </div>";
} else {
    // If not logged in, redirect to login page or show a guest message
    echo "<div style='margin-left: 46%;'>
            Welcome, Guest!
          </div>";
}
?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        {
            session_unset();
            session_destroy();
            session_Write_close();

            setcookie(session_name(), '', 0, '/');

            session_regenerate_id(true);
        }

        header("location:index.php");

        exit();
    }

?>



<?php echo file_get_contents("toplevelnavbar.html"); ?>
<?php echo file_get_contents("logout.html"); ?>
<?php echo file_get_contents("footer.html"); ?>