<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$b = $a->countUE();
$params = $a->ue_index();

// var_dump($params['ue_posts'][1]['title']);
// var_dump($UEindex);
// var_dump($params);

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
  <link rel="stylesheet" type="text/css" href="css/all_index.css">
  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <title>参加ボタンを押した投稿一覧</title>
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
    <p class="my_index_title">参加ボタンを押した投稿<?php echo $b[0]["COUNT(ue.event_id)"]; ?>件</p>
<!--     <button class="btn-stitch"><a href="my_create.php">create new event</a></button> -->

    </div>

<div class="view">

      <table class="db_table">
        <tr>
            <th>タイトル</th>
            <th>日時</th>
            <th>場所</th>
            <th>カテゴリ</th>
            <th>内容</th>

        </tr>
        <?php foreach ($params['ue_posts'] as $ue_post): ?>
        <?php if($ue_post['del_flag'] == 1):?>
        <?php else: //del_flgの ?>

        <tr class="contents_conainer">
            <td><?php echo $ue_post['title']; ?></td>
            <td class="date"><?php echo $ue_post['date']; ?></td>
            <td><?php echo $ue_post['place']; ?></td>
            <td class="cate"><?php echo $ue_post['category']; ?></td>
            <td class="contents"><?php echo mb_strimwidth($ue_post['content'], 0, 40, '…', 'UTF-8' ); ?></td>


            <td>
            <a href="my_detail.php?id=<?php echo $ue_post['id']; ?>">詳細</a>
            </td>
            <?php endif; //del_flgのif ?>
            <?php endforeach; ?>
          </table>

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

<script>
      //confirmメソッドで選択処理をする
      $('.delete_btn').on("click", function(){
        var de = confirm("削除しますか?");
        return de;
      });
    </script>
<script>
function de(){
var checked = confirm("削除しますか？");
      if (checked == true) {
          return true;
      } else {
          return false;
      }
}
</script>
