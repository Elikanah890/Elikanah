<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO crud (first_name, last_name, email, gender) VALUES ('$first_name', '$last_name', '$email', '$gender')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Record</title>
</head>
<body>
    <h1>Add New Record</h1>
    <form action="add.php" method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name" required><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Gender:</label>
        <input type="text" name="gender" required><br>
        <input type="submit" value="Add">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
