<?php
 require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/login.css">
  <title>SIGNUP</title>

<body>

  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">cadastrar</h2>

  <form class="login-container" method="POST" action="signup_action.php">
    <p><input type="email" placeholder="Email" name="email"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="text" placeholder="name" name="name"></p>
    <p><input type="text" placeholder="00/00/0000" name="birthdate"></p>
    <p><input type="submit" value="CADASTRAR"></p>
  </form>
</div>
</head>

</body>

<!-- mascara o campo-->
    <script src="https://unpkg.com/imask"></script>
    <script >
        IMask(
            document.getElementById("birthdate"),
            {mask: '00/00/0000'}
            );
    </script>
</html>