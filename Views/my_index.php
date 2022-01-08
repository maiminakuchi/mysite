<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();
//クラスをnewする（インスタンス化）
$b = $a->countUE();
$c = $a->countM();
$params = $a->my_index();
//クラスの中のcountメソッドを呼び出す（オブジェクトの生成）
// var_dump($b);
// var_dump($b['sanka']);
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
  <link rel="stylesheet" type="text/css" href="css/my_index.css">
  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <title>自分の投稿一覧</title>
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
    <p class="my_index_title">自分の投稿<?php echo $c[0]["COUNT(id)"]; ?>件</p>
    <button class="btn-stitch"><a href="my_create.php">create new event</a></button>

    </div>

<div class="view">

      <table class="db_table">
        <tr>
            <th class="title">タイトル</th>
            <th class="date">日時</th>
            <th class="place">場所</th>
            <th class="cate">カテゴリ</th>
            <th lass="contents">内容</th>

        </tr>
        <?php foreach ($params['my_posts'] as $my_post): ?>
        <?php if($my_post['del_flag'] == 1):?>
        <?php else: //del_flgの ?>

        <tr class="contents_conainer">
            <td><?php echo mb_strimwidth($my_post['title'], 0, 10, '…', 'UTF-8' ); ?></td>
            <td class="date"><?php echo $my_post['date']; ?></td>
            <td><?php echo $my_post['place']; ?></td>
            <td class="cate"><?php echo $my_post['category']; ?></td>
            <td class="contents"><?php echo mb_strimwidth($my_post['content'], 0, 40, '…', 'UTF-8' ); ?></td>


            <td>
            <a href="my_detail.php?id=<?php echo $my_post['id']; ?>">詳細</a>
            </td>
            <?php //if($_SESSION['role'] == 1): ?>
            <td>
            <a href="my_edit.php?id=<?php echo $my_post['id']; ?>">編集</a>
            </td>
            <td>
           <a style="cursor: pointer;"
                    href="my_delete_complete.php?id=<?php echo $my_post['id']; ?>" onclick="return de()">削除</a>
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
