<?php include('nav.php');?>
  <h3>Book to be checked out:</h3>
	<?php
        session_start();
	echo $_SESSION['book_title'];

	?>
<?php
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
                if(empty($_POST["user_name"])){
                        echo 'Enter name';
                }
                else{
                        $_SESSION['username'] = form_input($_POST['user_name']);
                        echo '<a href="/library/confirmation.php" style="color:orange;">Confirm?</a>';
                }
        }
        function form_input($data){
                return $data;
        }
?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="user_name" value="<?php echo $username;?>"><br>
        <input type="submit" id="btnOrange" name="submit" value="Checkout">
        </form>

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

        if($db->query("UPDATE book set checkout_user =('".$_POST["user_name"]."'), availability='no' where title=('".$_SESSION['book_title']."')") === TRUE)
        {
              echo 'Thank you ' . $_POST['user_name'];
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
