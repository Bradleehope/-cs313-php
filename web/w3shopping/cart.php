<?php include('nav.php');
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<h1>You added to cart: </h1><br>

Brain Blast..................... <?php echo $_POST["product0"];?><br>
Terrific Taster................. <?php echo $_POST["product1"];?><br>
Jumping Jelly................... <?php echo $_POST["product2"];?><br>
Secret Speed.................... <?php echo $_POST["product3"];?><br>
Liquid Luck..................... <?php echo $_POST["product4"];?><br>
<br>
<br>
<br>
<a href="/w3shopping/browse.php">Keep Shopping</a><br>
<a href="/w3shopping/checkout.php">Check Out </a>
</body>
</html>
