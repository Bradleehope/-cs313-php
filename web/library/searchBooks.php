<?php include('nav.php');?>
<div class="row">
  <div class="side">
	<h2>Search to see all the books and movies currently in stock</h2>
	<h3>Books</h3>
<?php 
	$book_title = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["book_title"])){
			echo 'Enter title';
		}
		else{
			$book_title = form_input($_POST['book_title']);
		}
	}
	function form_input($data){
		return $data;
	}
?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	Title: <input type="text" name="book_title" value="<?php echo $book_title;?>"><br>
	<input type="submit" id="btnOrange" name="submit" value="Submit">  
	</form>
  </div>
</div>

<?php
	echo "<h3>Results:</h3>";
?>

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

	foreach($db->query("SELECT *  from book where title like ('".$_POST["book_title"]."')") as $row)
	{
		echo $row['title'] . ' ';
		echo '(' . $row['release_date'] . ') by ';
		echo $row['author'] . " ";
		echo '<br>';
	}

	/*foreach ($db->query('SELECT * from book') as $row)
	{
		echo 'Title: ' . $row['title'];
		echo 'Author: ' . $row['author'];
		echo '<br>';
	}*/
}
catch(PDOException $ex)
{
	echo 'Error: ' . $ex->getMessage();
	die();
}
?>
  <div class="main">
    <h2></h2>
    <br>
  </div>
</div>
<div class="footer">
  <h2></h2>
</div>

</body>
</html>
