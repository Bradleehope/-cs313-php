<?php include('nav.php');?>
<div class="row">
	<h3>All books currently in stock:</h3>
<br>
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


	foreach ($db->query("SELECT * from book where availability ='yes'") as $row)
	{
		echo '<br>';	
		echo $row['title'];
		echo ' by ' . $row['author'];
		echo '<br>';
	}
}
catch(PDOException $ex)
{
	echo 'Error: ' . $ex->getMessage();
	die();
}
?>
<div class="side">

</div>

</div>     
  <div class="main">	
<h3>All books NOT currently in stock:</h3>
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


	foreach ($db->query("SELECT * from book where availability ='no'") as $row)
	{
	
		echo $row['title'];
		echo ' by ' . $row['author'];
		echo ' checked out by ' . $row['checkout_user'];
		echo '<br>';
	}
}
catch(PDOException $ex)
{
	echo 'Error: ' . $ex->getMessage();
	die();
}
?>

   <br>
    <a class="checkoutLink"href="/library/addBook.php">Add New Book</a>
    <br>
  </div>
</div>
<div class="footer">
  <h2></h2>
</div>

</body>
</html>
