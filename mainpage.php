<?php echo file_get_contents("header.html"); ?>

<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Display the username at the top of the page
    echo "<div style='text-align: right; margin-right: 81%;'>
            Welcome, " . htmlspecialchars($_SESSION['username']) . "!
          </div>";
} else {
    // If not logged in, redirect to login page or show a guest message
    echo "<div style='text-align: right; padding: 10px;'>
            Welcome, Guest!
          </div>";
}
?>

<?php echo file_get_contents("toplevelnavbar.html"); ?>
<?php echo file_get_contents("mainbody.html"); ?>
<?php echo file_get_contents("footer.html"); ?>


<head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    
</head>

<body>

</div>
</body>
</html>