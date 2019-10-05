<?php include('nav.php');
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
Enter the following information: <br>
<form action="confirmation.php" method="post">
Name: <input type="text" name="name"><br>
Address: <input type="text" name="street"><br>
Country: <input type="text" name="country"><br>
State: <input type="text" name="state"><br>
<input type="submit" value="Complete Purchase">
</form>
<br>
<br>
<a href="/w3shopping/checkout.php">Return to Cart</a>
</body>
</html>
