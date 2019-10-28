<?php
  session_start();
  require 'templates/header.php'

?>
<body>
  <h2>D&D Character Sheet</h2>
  <?php
    require 'templates/nav.php';
  ?>

  <div class="login">
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
      <label for="username">
        <i class="fa fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fa fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <input type="submit" value="Login">
    </form>
  </div>

  <?php
    include "templates/js.php";
  ?>
</body>
</html>



