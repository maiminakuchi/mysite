<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

// $c = $a->detail();
$sanka = $a->all_sanka();


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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
      <p>参加を受け付けました</p>
      <a href="javascript:history.go(-2)">一覧へ戻る</a>
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