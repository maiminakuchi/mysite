<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$err = [];
// バリデーション
if(!$username = filter_input(INPUT_POST, 'username')) {
  $err[] = 'ユーザ名を記入してください。';
}
if(!$email = filter_input(INPUT_POST, 'email')) {
  $err[] = 'メールアドレスを記入してください。';
}
$password = filter_input(INPUT_POST, 'password');
// 正規表現
if (!preg_match("/\A[a-z\d]{3,100}+\z/i",$password)) {
  $err[] = 'パスワードは英数字3文字以上100文字以下にしてください。';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
  $err[] = '確認用パスワードと異なっています。';
}

if (count($err) === 0) {
  // ユーザを登録する処理
$up = $a->up_date_user();
}
// var_dump($c[0]['id']);
// var_dump($_POST);
// var_dump($count['sanka']);
// var_dump($_POST);




// $sql = 'SELECT*FROM users WHERE id =1';
// $stmt = $dbh->prepare($sql);
// $data[] = $code;
// $stmt->execute($data);




//ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();
if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
  header('Location: signup_form.php');
  return;}


$login_user = $_SESSION['login_user'];
// var_dump($_SESSION['login_user']['id']);
?>
<?php

// $_SESSION['title']=$_POST['title'];
// $_SESSION['date']=$_POST['date'];
// $_SESSION['place']=$_POST['place'];
// $_SESSION['category']=$_POST['category'];
// $_SESSION['content']=$_POST['content'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/complete.css">

  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->


  <title>確認画面</title>
</head>
<body>

<!-- Header Start -->
<?php include("header.php"); ?>
<!-- Header End -->

<!-- Header Start -->
<?php
// include("side.php");
?>
<!-- Header End -->

<article>
  <?php
  include("side.php");
  ?>


  <div class="content2">
    <div class="center">
      <?php if (count($err) > 0) : ?>
      <?php foreach($err as $e) : ?>
      <p><?php echo $e ?></p>
      <?php endforeach ?>
      <?php else : ?>
      <p>ユーザー情報を変更しました</p>
      <?php endif ?>
      <a href="account.php">戻る</a>
    </div>


  </div>



</article>
<div>
<?php
include("footer.php");
?>
</div>
<!-- ①ログアウト画面の作成 -->
<!-- ②ログアウトメソッドの作成 -->
</body>
</html>