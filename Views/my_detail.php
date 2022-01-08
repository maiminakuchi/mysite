<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

// var_dump($_SERVER['DOCUMENT_ROOT']);
$c = $a->detail();
// $arr = $c[0]['id'];
// var_dump($c[0]['id']);
// var_dump($c);
// var_dump($b['sanka']);

//ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
  header('Location: signup_form.php');
  return;
}

$login_user = $_SESSION['login_user'];
// var_dump($_SESSION['login_user']['id']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/my_detail.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="iine_app/iine.css">

  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->


  <title>イベント詳細</title>
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
      <p class="my_index_title"><?php echo $c[0]['date']; ?></p>

      <div class="container">
      <p class="my_index_title2"><?php echo $c[0]['title']; ?></p>
      <p class="my_index_title">場所：<?php echo $c[0]['place']; ?>｜カテゴリー：<?php echo $c[0]['category']; ?></p>
      </div>
      <hr>

      <p class="shousai">詳細</p>
      <div class="content_detail">
      <?php echo $c[0]['content']; ?>
      </div>

      
      <form method="post" action="sanka.php">
        <input class="btn-stitch3" type="submit" name="id" value="参加する">
        <input type="hidden" name="id" value="<?php echo $c[0]['id']; ?>">
      </form>

      <form method="post" action="sanka-del.php">
        <input class="btn-stitch3" type="submit" name="id" value="参加をキャンセル">
        <input type="hidden" name="id" value="<?php echo $c[0]['id']; ?>">
      </form>

<!-- いいねボタンここから -->
<div id="iine_wrap">
<!-- ボタン本体ここから -->
<button type="submit" id="iine">
<div class="iine_wrap">
<i class="material-icons heart">favorite</i>
<div class="circle"></div>
<span id="countnum"></span>
</div>
</button>
<!-- ボタン本体ここまで -->

<!-- お礼メッセージここから -->
<div id="iine_thanks" style="display:none;">
<div class="box">
<!-- <img src="iine_app/example.jpg" alt="THANK YOU!"> -->
<p>like👍</p>
</div>
</div>
<!-- お礼メッセージここまで -->
</div>
<!-- いいねボタンここまで -->

          <div class="back">

          <a href="#" onclick="history.back()">戻る</a>
          </div>
  </div>


<form action="sanka.php" method="post">
  
</form>



</article>
<div>
<?php
include("footer.php");
?>
</div>
<!-- ①ログアウト画面の作成 -->
<!-- ②ログアウトメソッドの作成 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="iine_app/iine.js"></script>
</body>
</html>