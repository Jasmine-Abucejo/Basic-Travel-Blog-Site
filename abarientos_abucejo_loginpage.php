<!DOCTYPE html>
<html>
		<head>
		<title></title>
		<style >
		@import "bourbon";

body {
	background: #eee !important;
	border: solid black;
	margin-top: 80px;
	margin-right: 50px;
	margin-left: 50px;
}

h1{
	text-align: center;
	color: red;
}

h2{
	text-align: center;
	color: green;
}

h3{
	text-align: center;
	color: gold;
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}

		</style>
		</head>
		<body>

			<?php
				$dbservername = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "blogfinal";

				$connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

			?>

				<div class="wrapper">
		    <form class="form-signin" method="POST">       
		      <h3 class="form-signin-heading">Please Login</h3>
		      <input type="text" class="form-control" name="userid" placeholder="User ID" required="" autofocus="" />
		      <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br>   
		      <label class="checkbox">
		        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">Remember me<br><br>
		      </label>
		      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
		      <a href="abarientos_abucejo_firstpage.php"><br><br>I don' have an account yet</a>   
		    </form>
		  </div>

		  <?php
				if(isset($_POST['submit'])) {
					$userid = $_POST['userid'];
					$password = $_POST['password'];

					$sql = "SELECT * FROM userinformation WHERE userid='$userid' AND password='$password';";

					$result = mysqli_query($connect, $sql);

					if(mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
							echo "<h2>Logging In User ID:  " . $row['userid'] . "...</h2>";
							echo "<center>Please wait a moment</center>";
							session_start();
							$_SESSION['userid'] = $userid;
							header('refresh:3 url=abarientos_abucejo_blog.php');
						
					} else {
						echo "<h1>Incorrect User ID or Password</h1>";
					}
				}
			?>
		</body>
</html>
