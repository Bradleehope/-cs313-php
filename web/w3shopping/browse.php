<?php include('nav.php');
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<div class="main">
	<h2> Current Products for Sale </h2>
<form action="cart.php" method="post">
	<input type="number" name="product0">
	<?php 
	echo $products[0] . "---$" . $prices[0];
	?>
	<br>
	<input type="number" name="product1">
	<?php
	echo $products[1] . "---$" . $prices[1];
	?>
	<br>
	<input type="number" name="product2">
	<?php
	echo $products[2] . "---$" . $prices[2];
	?>
	<br>
	<input type="number" name="product3">
	<?php
	echo $products[3] . "---$" . $prices[3];
	?>
	<br>
	<input type="number" name="product4">
	<?php
	echo $products[4] . "---$" . $prices[4];
	?>
	<br>
	<input type="submit" value="Add to Cart">
</form>

</div>
<div class="footer">
  <h2></h2>
</div>

</body>
</html>
