<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$c = $a->detail();

// var_dump($c[0]['id']);
$id = $c[0]['id'];


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
  <link rel="stylesheet" type="text/css" href="css/my_create.css">
  <link rel="stylesheet" type="text/css" href="css/contact.css">

  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->


  <title>新しい投稿</title>
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
      <p class="my_index_title">新規作成</p>
      </div>


      <div class="post_form">

<form method="post" action="my_edit_confirm.php">
  <input type="hidden" name="id" value="<?php echo $id; ?>">

    <dl>
      <dt><label for="title">タイトル<span class="kome">*</span></label></dt>
      <!-- エラー表示 -->
      <dd class="err">
       <?php
       if ($_POST){
       echo $err_msg[
        0
        // 'name'
      ];
       }
       ?>
      </dd>
      <!-- ここまで -->
      <dd>
      <input class="a" type="text" name="title" id="title" value="<?php echo $c[0]['title']; ?>">
      </dd>

      <dt><label for="date">日時<span class="kome">*</span></label></dt>

      <!-- エラー表示 -->
      <dd class="err">
       <?php
       if($_POST){
       echo $err_msg[
        1
        // 'kana'
      ];
       }
       ?>
      </dd>
      <!-- ここまで -->
      <dd>
        <input class="a" type="date" name="date" id="date" value="<?php echo $c[0]['date']; ?>"></dd>

      <dt><label for="place">場所</label></dt>
      <!-- エラー表示 -->
      <dd class="err">
       <?php
       if($_POST){
       echo $err_msg[
        2
        // 'phone'
      ];
       }
       ?>
      </dd>
      <!-- ここまで -->
      <dd><input class="a" type="text" name="place" id="place" value="<?php echo $c[0]['place']; ?>"></dd>

      <dt><label for="category">カテゴリ<span class="kome">*</span></label></dt>
      <!-- エラー表示 -->
      <dd class="err">
       <?php
       if($_POST){
       echo $err_msg[
        3
        // 'email'
      ];
       }
       ?>
      </dd>
      <!-- ここまで -->
      <dd><input class="a" type="text" name="category" id="category" value="<?php echo $c[0]['category']; ?>"></dd>
      <h3>詳細<span class="kome">*</span></h3>
        </dl>
        <dl>
          <!-- エラー表示 -->
          <dd class="err">
           <?php
           if($_POST){
           echo $err_msg[
            4
            // 'body'
          ];
           }
           ?>
          </dd>
          <!-- ここまで -->
          <dd><textarea name="content" id="content" value="<?php echo $c[0]['content']; ?>"><?php echo $c[0]['content']; ?></textarea></dd>
          <dd id="submit1"><input class="btn-stitch2" type="submit" value="確認画面へ"></dd>
        </dl>

    </form>

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