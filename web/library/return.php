<?php include('nav.php');?>
<div class="row">
  <div class="side">
	<h2> Returns: </h2>
<?php 
	session_start();
	$_SESSION['book_title'] = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["book_title"])){
			echo 'Enter title';
		}
		else{
			$_SESSION['book_title'] = form_input($_POST['book_title']);
		}
	}
	function form_input($data){
		return $data;
	}
?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	Title to Return: <input type="text" name="book_title" value="<?php echo $book_title;?>"><br>
	<input type="submit" id="btnOrange" name="submit" value="Submit">  
	</form>
  </div>
</div>

<?php
try
{
	$dbUrl = getenv('DATABASE_URL');
	$dbOpts = parse_url($dbUrl);

 	$dbHost = $dbOpts["host"];
 	$dbPort = $dbOpts["port"];
 	$dbUser = $dbOpts["user"];
	$dbPassword = $dbOpts["pass"];
 	$dbName = ltrim($dbOpts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($db->query("Update book set availability='yes', checkout_user='' where title like ('".$_POST["book_title"]."')") === TRUE)
	{
		echo 'Thank you! Come again';
	}
}

catch(PDOException $ex)
{
	echo 'Error: ' . $ex->getMessage();
	die();
}
?>
  <div class="main">
    <h2>THANK YOU!</h2>
    <br>
  </div>
</div>
<div class="footer">
  <h2></h2>
</div>

</body>
</html>
