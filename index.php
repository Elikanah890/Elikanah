<?php
include 'db.php';

$sql = "SELECT * FROM crud";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Operation done</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>CRUD Application</h1>
    <a href="add.php">Add New Record</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['gender']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                        <a href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
