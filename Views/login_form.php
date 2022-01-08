<?php
ini_set('display_errors', "On");
session_start();
require_once '../Models/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/login_form.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <title>ログイン画面</title>
</head>
<body>
<div class="left">
<img class="img" src="css/img/logo.png">
</div>

<div class="right">
  <div class="right_inner">

          <?php if (isset($err['msg'])) : ?>
          <p><?php echo $err['msg']; ?></p>
          <?php endif; ?>

          <div class="form">
          <form action="login.php" method="POST">
          <p>
          <label for="email">メールアドレス：</label>
          <input type="email" name="email">
          <?php if (isset($err['email'])) : ?>
          <p><?php echo $err['email']; ?></p>
          <?php endif; ?>
          </p>
          <p>
          <label for="password">パスワード：</label>
          <input type="password" name="password">
          <?php if (isset($err['password'])) : ?>
          <p><?php echo $err['password']; ?></p>
          <?php endif; ?>
          </p>
          <p>
          <input type="submit" value="ログイン">
          </p>
          </form>
          <a href="signup_form.php">新規登録はこちら</a>
          <!-- <a href="signup_form.php">パスワードを忘れた方はこちら</a> -->
          </div>

   </div>

  </div>
  <div class="under"></div>
</body>
</html>