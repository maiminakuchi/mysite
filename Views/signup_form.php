<?php

session_start();

require_once '../functions.php';
require_once '../Models/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/login_form.css">
  <title>ユーザ登録画面</title>
</head>
<body>

<div class="left">
<img class="img" src="css/img/logo.png">
</div>



<div class="right">
  <div class="right_inner">

<p class="form2">ユーザ登録フォーム</p>
<?php if (isset($login_err)) : ?>
    <p class="err"><?php echo $login_err; ?></p>
<?php endif; ?>

<div class="form">

  <form action="register.php" method="POST">
  <p>
    <label for="username">ユーザ名：</label>
    <input type="text" name="username">
  </p>
  <p>
    <label for="email">メールアドレス：</label>
    <input type="email" name="email">
  </p>
  <p>
    <label for="password">パスワード：</label>
    <input type="password" name="password">
  </p>
  <p>
    <label for="password_conf">パスワード確認：</label>
    <input type="password" name="password_conf">
  </p>
  <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
  <p>
    <input type="submit" value="新規登録">
  </p>
  </form>

  <a href="login_form.php">ログイン画面はこちら</a>


  </div>

</div>

</div>

</body>




</html>