<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
	// Database connection
	$conn = new mysqli('localhost','root','','donate');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(firstname, lastname, gender, contact, country, email, amount) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssissi", $firstname, $lastname, $gender, $contact, $country, $email, $amount);
		$execval = $stmt->execute();
		echo $execval;
		echo "Donation success!";
		$stmt->close();
		$conn->close();
	}
?>

        