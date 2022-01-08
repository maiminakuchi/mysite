<?php
session_start();
require_once '../Models/UserLogic.php';

if (!$logout = filter_input(INPUT_POST, 'logout')) {
  exit('不正なリクエストです。');
}

//　ログインしているか判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = UserLogic::checkLogin();

if (!$result) {
  exit('セッションが切れましたので、ログインし直してください。');
}

// ログアウトする
UserLogic::logout();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/done.css">
  <title>ログアウト</title>
</head>
<body>
  <div class="right">
    <div class="right_inner">
      <p>ログアウト完了</p>
      <p>ログアウトしました！</p>
      <a href="login_form.php">ログイン画面へ</a>
    </div>
  </div>
  <div class="under"></div>
</body>
</html>