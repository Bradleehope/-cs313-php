<?php include('nav.php');?>
<div class="row">
  <div class="side">
  <h3>New book form:</h3>
  </div>
<?php
        session_start();
	$_SESSION['title'];
	$_SESSION['author'];
	$_SESSION['genre'];
	$_SESSION['release_date'];

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
                if(empty($_POST["title"])){
                        echo 'Enter name';
                }
                else{
                        $_SESSION['title'] = form_input($_POST['title']);
			$_SESSION['author'] = form_input($_POST['author']);
			$_SESSION['genre'] = form_input($_POST['genre']);
			$_SESSION['release_date'] = form_input($_POST['release_date']);
                }
        }
        function form_input($data){
                return $data;
        }
?>

<div class="main">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Book Title: <input type="text" name="title" value="<?php echo $title;?>"><br>
        Author: <input type="text" name="author" value="<?php echo $author;?>"><br>
        Genre: <input type="text" name="genre" value="<?php echo $genre;?>"><br>
        Release Date: <input type="text" name="release_date" value="<?php echo $release_date;?>"><br>
        <input type="submit" id="btnOrange" name="submit" value="Add">
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

        if($db->query("INSERT INTO book (title, author, genre, release_date, availability) values ('".$_POST["title"]."', '".$_POST["author"]."', '".$_POST["genre"]."', '".$_POST["release_date"]."', 'yes')") === TRUE)
        {
              echo 'Thank you ' . $_POST['title'];
	}
}

catch(PDOException $ex)
{
        echo 'Error: ' . $ex->getMessage();
        die();
}
?>

<div class="footer">
  <h2></h2>
</div>

</body>
</html>
