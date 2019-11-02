<?php include('nav.php');?>
<div class="row">
  <div class="side">
<?php
session_start();
echo 'Thank you ' . $_SESSION['username'] . '<br>';
echo '<a href="/library/displayAll.php" style="color:orange">Home</a>';

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
