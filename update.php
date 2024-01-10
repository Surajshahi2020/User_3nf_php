<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM User WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $date = $row["dob"];
    $email = $row["email"];
    $zip = $row["zip"];
} else {
    echo "No record found";
}
$conn->close();
?>
<form action="" method="POST">
		<h1>User Update</h1>
		<form action="process.php" method="post">
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
		
		<label for="date">Date:</label><br>
		<input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br><br>
		
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
		
		<label for="zip">Zipcode:</label><br>
		<input type="text" id="zip" name="zip" pattern="[0-9]{3}" value="<?php echo $zip; ?>" required><br><br>

		<input type="submit" value="Update" name="update">
		</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $name = $_POST["name"];
	$date = $_POST["date"];
	$email = $_POST["email"];
	$zip = $_POST["zip"];
        $sql = "UPDATE User SET name='$name', dob='$date', email='$email', zip='$zip' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: process.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
}
?>
