<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("navbar.html"); ?>
<?php echo file_get_contents("valetlogin.html"); ?>

<?php
session_start();

if (isset($_POST['login'])) {

    // Connect to the database
    $mysqli = new mysqli("127.0.0.1", "root", "", "admin_login");

    // Check for connection errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Get the form data
    $valet_username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("SELECT valet_user_id, password FROM valet_users WHERE username = ?");
    if (!$stmt) {
        die("SQL Error: " . $mysqli->error);
    }

    // Bind the username to the prepared statement
    $stmt->bind_param("s", $valet_username);

    // Execute the SQL statement
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {

        // Bind the result to variables
        $stmt->bind_result($valet_user_id, $hashed_password);

        // Fetch the result
        $stmt->fetch();

        // Verify the password entered by the user against the hashed password in the database
        if (password_verify($password, $hashed_password)) {

            // Set the session variables if the login is successful
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $valet_user_id;
            $_SESSION['username'] = $valet_username;

            // Redirect the user to the dashboard (index.php)
            header("Location: valetmainpage.php");
            exit;
        } else {
            // If the password does not match
            echo "Incorrect password!";
        }
    } else {
        // If no user was found with the entered username
        echo "User not found!";
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>
