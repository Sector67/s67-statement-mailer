<?php
include_once('header.php');
?>
    <div id="input">
      <form method="post">
        <input name="password">
        <input type="submit" value="submit">
      </form>
    </div>
    <div id="output">
      <?
      if($_REQUEST['password']){
        echo 'your hashed password is: '.md5($SALT.$_REQUEST['password']);
      }?
      ?>
    </div>
  </body>
</html>