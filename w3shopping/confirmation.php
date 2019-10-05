<?php include('nav.php');
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<h1>Thank you for shopping!</h1> <br>
<?php 
	echo "<h2>Your order:</h2>";
	echo $_POST["product0"];
	if(isset($_POST["product0"])){
		echo "Brain Blast     qty:"; 
		echo $_POST["product0"];
	}
	if(isset($_POST['product1'])){
		echo"<br> Terrific Taster qty:" ;
		echo $_POST["product1"];
	}
	if(isset($_POST['product2'])){
		echo "<br> Jumping Jelly  qty:";
	        echo $_POST["product2"];
	}
	if(isset($_POST['product3'])){
		echo "<br> Secret Speed   qty:";
	        echo $_POST["product3"];
	}
	if(isset($_POST['product4'])){
		echo "<br>Liquid Luck    qty:";
	        echo $_POST["product4"];
	}
?>
<br>
<br>
Shipping to : <?php $_POST['name']?> <br>
<?php
	echo $_POST['address']
?> 
<br>
</body>
</html>
