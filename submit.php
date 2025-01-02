<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'Netflix', 3302);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert data into database
    $sql = "INSERT INTO info (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect the user to mainpage.html
        header("Location: mainpage.html");
        exit(); // Ensure that no more PHP code is executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
