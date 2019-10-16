<?php include('nav.php');?>
<div class="row">
  <div class="side">
  </div>

  <div class="main">
    <h2>Login</h2>
    <br>
    <form action="/action_page.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit" id="btnOrange">Login</button>
    <label>
    <br>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
 </form>
 </div>
</div>
<div class="footer">
  <h2></h2>
</div>

</body>
</html>
