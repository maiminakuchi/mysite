<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();



// $insert = $a->insertEvent();

// var_dump($b);
// var_dump($b['sanka']);
// var_dump($_POST);

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

<?php
$_SESSION['title']=$_POST['title'];
$_SESSION['date']=$_POST['date'];
$_SESSION['place']=$_POST['place'];
$_SESSION['category']=$_POST['category'];
$_SESSION['content']=$_POST['content'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/confirm.css">
  <link rel="stylesheet" type="text/css" href="css/contact.css">

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

      <div class="container">
      <p class="my_index_title">確認画面</p>
      </div>


      <div class="post_form">


        <div class="ppp">

        <p>内容を訂正する場合は戻るを押してください。</p>
        </div>

        <dl>
          <dt>【タイトル】</dt>
          <dd class="margin">
          <?php echo $_POST['title']; ?>
          </dd>
          <!-- <input type="text" name="name" id="name" placeholder="海野守"> -->
          <dt>【日時】</dt>
          <dd class="margin">
          <?php echo $_POST['date']; ?>
          </dd>

          <dt>【場所】</dt>
          <dd class="margin">
          <?php echo $_POST['place']; ?>
          </dd>

          <dt>【カテゴリ】</dt>
          <dd class="margin">
          <?php echo $_POST['category'] ?>
          </dd>


          <dt>【詳細】</dt>
          <dd class="margin">
          <?php echo nl2br($_POST['content']); ?>
          </dd>



          <?php


          if (($_POST['title']==''||$_POST['date']==''||$_POST['place']==''||$_POST['content']=='')){
          echo
          '
          <input class="btn-stitch_conf" type="button" onclick="history.back()" value="戻る">
          <button class="btn-stitch_conf" disabled>投稿</button>
          ';
          }else{

          echo'<form method="post" action="complete.php">';
          echo'<input type="hidden" name="title" value="'.$_POST['title'].'">';
          echo'<input type="hidden" name="date" value="'.$_POST['date'].'">';
          echo'<input type="hidden" name="place" value="'.$_POST['place'].'">';
          echo'<input type="hidden" name="category" value="'.$_POST['category'].'">';
          echo'<input type="hidden" name="content" value="'.$_POST['content'].'">';

          echo'<dd>
          <input class="btn-stitch_conf" type="button" onclick="history.back()" value="戻る">
          <input class="btn-stitch_conf" type="submit" value="投稿">
          </dd>';
          echo'</form>';
          }
          ?>



        </dl>


      </div>
  <!-- <button class="btn-stitch"><a href="my_create.php"> go </a></button> -->
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