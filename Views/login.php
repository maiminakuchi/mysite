<?php
session_start();

require_once '../Models/UserLogic.php';

// エラーメッセージ
$err = [];

// バリデーション
if(!$email = filter_input(INPUT_POST, 'email')) {
  $err['email'] = 'メールアドレスを記入してください。';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = 'パスワードを記入してください。';
}

if (count($err) > 0) {
  // エラーがあった場合は戻す
  $_SESSION = $err;
  header('Location: login_form.php');
  return;
}
// ログイン成功時の処理
$result = UserLogic::login($email, $password);
// ログイン失敗時の処理
if (!$result) {
  header('Location: login_form.php');
  return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/done.css">
  <title>ログイン完了</title>
</head>
<body>
<div class="right">
  <div class="right_inner">
    <p>ログイン完了</p>
    <p>ログインしました！</p>
    <a href="./mypage.php">マイページへ</a>
  </div>
</div>
<div class="under"></div>
</body>
</html>