<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$params = $a->view();
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
  <link rel="stylesheet" type="text/css" href="css/mypage.css">

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

    <p>ユーザー一覧</p>

    <div class="userinfo">

    </div>

    <div class="countevent">
          <table>
          <tr>
          <td>id</td>
          <td>名前</td>
          <td>メールアドレス</td>
          <td>パスワード（ハッシュ後）</td>
          <td>権限</td>
          <td>delflg</td>
          </tr>

          <?php foreach ($params['users'] as $user): ?>
          <?php
          if($user['del_flag'] == 1):
          ?>
          <?php else: //del_flgの ?>

          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><?php echo $user['del_flag']; ?></td>
            <?php endif; //del_flgのif ?>
          </tr>
            <?php endforeach; ?>
          </table>




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