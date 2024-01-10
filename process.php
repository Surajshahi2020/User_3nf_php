<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $email = $_POST["email"];
    $zip = $_POST["zip"];
    
    $nameValidation = "SELECT * FROM User WHERE name = '$name'";
    $nameResult = $conn->query($nameValidation);
    if ($nameResult->num_rows > 0) {
    	echo "Name already exist";
    	exit();
    }
    
    $dateFormat = 'Y-m-d';
    $dateObj = DateTime::createFromFormat($dateFormat, $date);
    if ($dateObj == false) {
    	echo "Invalid format of date";
    	exit();
    }
    echo $dateObj->format('Y-m-d');
    
    $emailValidation = "SELECT * FROM User WHERE email = '$email'";
    $emailResult = $conn->query($emailValidation);
    if ($emailResult->num_rows > 0) {
    	echo "Email already exist";
    	exit();
    }
    
    $check = "SELECT * FROM Address WHERE zip = '$zip'";
    $result = $conn->query($check);
    if ($result && $result->num_rows > 0) {
	   $sql = "INSERT INTO User (name, dob, email, zip) VALUES ('$name', '$date', '$email', '$zip')";
           echo ($conn->query($sql)) ? "Inserted successfully" : "Error: " . $conn->error;
    } 
    else {
        echo "Zipcode does not exist.";
    }
}


$retrieve = "SELECT * FROM User";
$result = $conn->query($retrieve);
if ($result->num_rows > 0){
	echo "<table border='1'>";
	echo "<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Date</th>
		<th>Email</th>
		<th>Zipcode</th>
		<th>DELETE</th>
		<th>UPDATE</th>
	      </tr>";
	      while($row = $result->fetch_assoc()){
		 echo "<tr>";
		 echo "<td>" . $row["id"] . "</td>";
	         echo "<td>" . $row["name"] . "</td>";
		 echo "<td>" . $row["dob"] . "</td>";
		 echo "<td>" . $row["email"] . "</td>";
		 echo "<td>" . $row["zip"] . "</td>";
		 echo "<td><a href='delete.php?id={$row["id"]}'>Delete</a></td>";
		 echo "<td><a href='update.php?id={$row["id"]}'>Update</a></td>";
		 echo "</tr>";
		}
	}
?>
