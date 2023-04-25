<?php
 require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/login.css">
	<title>LOGIN</title>

<body>
  
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" method="POST" action="<?=$base;?>/login_action.php">
     <?php  if(!empty($_SESSION['flash'])): ?>
                <?=$_SESSION['flash'];?>
                <?php $_SESSION['flash'] = ''; ?>

            <?php endif; ?>
    <p><input type="email" placeholder="Email" name="email" type="email"></p>
    <p><input type="password" placeholder="Password" name="password" type="password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
</head>

</body>
</html>