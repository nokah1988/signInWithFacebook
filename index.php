<?php

require_once 'app/init.php';

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Facebook Sign In</title>
    </head>
    
    <body>
       <?php if (!isset($_SESSION['facebook'])); ?>
        <a href="<?php echo $facebook->getLoginUrl(); ?>">Sign In With Facebook</a> <br><br>
        
        <? else;  ?>
        <p>You are signed in, <?php echo $user['name']; ?><a href="signOut.php">Sign out</a></p>
        
        
      <? endif; ?>
    </body>
</html>



