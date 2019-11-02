<!DOCTYPE html>
<html lang="en">
<head>
	<title>Personal library project </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="library.css">
</head>
<body>

<div>

<h1>Please sign in:</h1>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username;?>"><br>
    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password;?>"><br>
    <a class="btn" id="btnOrange" href= "library/checkout.php" type="submit">Sign In</a>
  </form>

<br><br>

Or <a href="signUp.php">Sign up</a> for a new account.

</div>

<?php
session_start();
$_SESSION['username'] = '';
$_SESSION['password'] = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (empty($_POST['username'])) {
			$uErr = "Please enter a username.";
		}
		else {
			$_SESSION['username'] = test_input($_POST['username']);
		}

		if (empty($_POST['password'])) {
			$pErr = "Please enter a password.";
		}
		else {
			$_SESSION['password'] = test_input($_POST['password']);
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
	echo 'pass' . $_SESSION['password'];
	echo '<br>usr' . $_SESSION['username'];
?>
<?php

	try{
		$dbUrl = getenv('DATABASE_URL');
		$dbOpts = parse_url($dbUrl);

		$dbHost = $dbOpts["host"];
		$dbPort = $dbOpts["port"];
		$dbUser = $dbOpts["user"];
		$dbPassword = $dbOpts["pass"];
		$dbName = ltrim($dbOpts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if ($db->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * from librarylogin";
		echo $sql;
		$user = $db->query($sql);
		echo 'user' . $user;
		$user = $user->fetch_assoc();
			$dbPw = $user['password'];
			$user_input = $_SESSION['password'];
			echo 'user' . $user;
			echo 'dbpw' . $dbPw;
			echo 'iput' .$user_input;
			if ($user_input == $dbPw) {
				$_SESSION['username'] = $username;
				echo 'yes';
				header('Location: library/checkout.php');
				die();
			}else {
				$pErr = "Invalid password. Please try again.";
			}
		}
	catch(PDOException $ex)
	{
		echo 'Error: ' . $ex->getMessage();
		die();
	}
?>

</body>
</html>
