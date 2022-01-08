<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();
//クラスをnewする（インスタンス化）
$b = $a->countUE();
$c = $a->countM();
//クラスの中のcountメソッドを呼び出す（オブジェクトの生成）

// var_dump($b);
// var_dump($_SESSION);

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
  <link rel="stylesheet" type="text/css" href="css/mypage.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <title>マイページ</title>
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


  <div class="content">

    <p class="welcome">WELCOME!</p>

    <div class="userinfo">
    <p>ログインユーザ：<?php echo h($login_user['username']) ?></p>
    <p>メールアドレス：<?php echo h($login_user['email']) ?></p>
    </div>

    <div class="countevent">
    <p>これまで作成したイベント<?php echo $c[0]["COUNT(id)"]; ?>件</p>
    <p>参加ボタンを押したイベント<?php echo $b[0]["COUNT(ue.event_id)"]; ?>件</p>
    </div>
  </div>
</article>

<?php
include("footer.php");
?>
<!-- ①ログアウト画面の作成 -->
<!-- ②ログアウトメソッドの作成 -->
</body>
</html>