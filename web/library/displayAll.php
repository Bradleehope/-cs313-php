<?php include('nav.php');?>
<div class="row">
  <div class="side">
	<h3>All books currently in stock:</h3>
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


	foreach ($db->query('SELECT * from book') as $row)
	{
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
</div>
<div class="side">
	<h3>All movies currently in stock:</h3>
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


	foreach ($db->query('SELECT * from movie') as $row)
	{
		echo $row['title'];
		echo ' on ' . $row['format']; 
		echo '<br>';
	}
}
catch(PDOException $ex)
{
	echo 'Error: ' . $ex->getMessage();
	die();
}
?>
</div>

</div>     
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
