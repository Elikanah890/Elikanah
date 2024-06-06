<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM crud WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE crud SET first_name='$first_name', last_name='$last_name', email='$email', gender='$gender' WHERE id=$id";
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
    <title>Edit Record</title>
</head>
<body>
    <h1>Edit Record</h1>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label>Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
