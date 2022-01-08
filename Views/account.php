<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$c = $a->get_user_detail();

// var_dump($c[0]['password']);

$pass = $c[0]['password'];
$id = $c[0]['id'];

//クラスの中のcountメソッドを呼び出す（オブジェクトの生成）
// var_dump($b);
// var_dump($b['sanka']);
// var_dump($params);s

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
  <link rel="stylesheet" type="text/css" href="css/account.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <title>ユーザー一覧</title>
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

    <p class="userinfotitle">ユーザー情報</p>

    <div class="userinfo">
    <p>ログインユーザ：<?php echo h($login_user['username']) ?></p>
    <p>メールアドレス：<?php echo h($login_user['email']) ?></p>
    </div>

    <div class="countevent">
      <div class="form">

  <form  action="account_update.php" method="POST">
  <input class="waku" type="hidden" name="id" value="<?php echo $id; ?>">
  <p>
    <label class="wakuue" for="username">ユーザ名</label>
    <input class="waku" type="text" name="username" value="<?php echo $c[0]['username']; ?>">
  </p>
  <p>
    <label class="wakuue" for="email">メールアドレス</label>
    <input class="waku" type="email" name="email" value="<?php echo $c[0]['email']; ?>">
  </p>
  <p>
    <label class="wakuue" for="password">パスワード</label>
    <input class="waku" type="password" name="password" >
  </p>
  <p>
    <label class="wakuue" for="password_conf">パスワード確認</label>
    <input class="waku" type="password" name="password_conf">
  </p>

  <p>
    <input class="waku2" class="btn-stitch2" type="submit" value="変更する">
  </p>
  </form>





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