<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="abarientos_abucejo_css1.css">
	<title>AA's Blog</title>
</head>

<body>
	<?php
		$dbservername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "blogfinal";

		$connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

	?>
	
	<h1>Hello!<br> Welcome to AA's Blog Corner</h1>
	<p id="t1">Would you like to read our contents?<br>
		Kindly register:<br></p>

	<form action="" method="POST">
		<label for="userid">User ID:</label>
		<input type="text" name="userid" id="userid" required="" placeholder="e.g 000">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" required="" placeholder="e.g Juan">
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" required="" placeholder="e.g Dela Cruz"><br><br>
		<label for="email">E-mail:</label>
		<input type="email" name="email" id="email" required="" placeholder="e.g mymail.gmail.com">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" maxlength="12" minlength="6" required="" placeholder="6-12 characters"><br><br><br>
		<button type="submit" name="submit" id="submit">Register</button><br>
	</form>
	<hr>

	<?php
		if(isset($_POST['submit'])) {
			$userid = $_POST['userid'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			
			$error = false;

			//UserID Validation

			$sql1 = "SELECT * FROM userinformation WHERE userid='$userid';";
			$result = mysqli_query($connect, $sql1);

			if(!$error){
				if(mysqli_num_rows($result) > 0) {
					echo "<p id='p1'>User ID already taken</p><br>";
					echo "<p id='p2'>Seems like someone already own this User ID<br>";
					echo "Please think of a unique ID that no one else has though of</p>";
					header('refresh:4 url=abarientos_abucejo_firstpage.php');

				}else{
					$sql = "INSERT INTO userinformation (userid, firstname, lastname, email, password) VALUES ('$userid', '$firstname', '$lastname', '$email', '$password');";

					if(mysqli_query($connect, $sql)) {
						echo "<p id='c1'>Registering account...</p>";
						echo "<p id='c2'>Please wait a moment</p>";
						header('refresh:3 url=abarientos_abucejo_loginpage.php');
					} else {
						echo "Error Description: " . mysqli_error($connect);
					}
				}
			}
		}
	?>
	<hr>
	<h4>Already have an account?<br></h4>
	Login here:

	<a href="abarientos_abucejo_loginpage.php"><button type="submit" name="submit" id="login">
	LOG-IN
	</button></a>

	

</body>
</html>