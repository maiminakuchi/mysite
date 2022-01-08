<?php
session_start();
require_once '../Models/UserLogic.php';
require_once '../functions.php';
require_once '../Controllers/Controller1.php';
$a = new PlayerController();

$params = $a->all_index();
$countAll = $a->countA();


// var_dump($countAll);
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
  <link rel="stylesheet" type="text/css" href="css/all_index.css">
  <!-- BootstrapのCSS読み込み -->
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/7-2-3/css/7-2-3.css">
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
    <p class="my_index_title">すべての投稿<?php echo $countAll[0]["COUNT(*)"]; ?>件</p>
<!--     <button class="btn-stitch"><a href="my_create.php">create new event</a></button> -->

    </div>

<div class="margin"> <p> </p>
<div class="open-btn1"></div>

<div id="search-wrap">

<form role="search" method="post" id="searchform" action="search_index.php">
<input type="text"  name="search" placeholder="search">
<input type="submit" id="searchsubmit" value="">
</form>

<!--/search-wrap--></div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/7-2-3/js/7-2-3.js"></script>
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
        <?php foreach ($params['all_posts'] as $all_post): ?>
        <?php if($all_post['del_flag'] == 1):?>
        <?php else: //del_flgの ?>

        <tr class="contents_conainer">
            <td class="title"><?php echo $all_post['title']; ?></td>
            <td class="date"><?php echo $all_post['date']; ?></td>
            <td class="place"><?php echo $all_post['place']; ?></td>
            <td class="cate"><?php echo $all_post['category']; ?></td>
            <td class="contents"><?php echo mb_strimwidth($all_post['content'], 0, 40, '…', 'UTF-8' ); ?></td>


            <td class="detail">
            <a href="my_detail.php?id=<?php echo $all_post['id']; ?>">詳細</a>
            </td>
            <?php //if($_SESSION['login_user']['id'] == $all_post['id']): ?>
<!--             <td>
            <a href="my_edit.php?id=<?php //echo $all_post['id']; ?>">編集</a>
            </td>
            <td>
            <button id="delete_btn"><a style="cursor: pointer;"
                    href="my_delete_complete.php?id=<?php //echo $all_post['id']; ?>" onclick="return de()">削除</a>
            </button>
            </td> -->
            <?php //endif; //idのif ?>
            <?php endif; //del_flagのif ?>
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

//開閉ボタンを押した時には
$(".open-btn1").click(function () {
    $(this).toggleClass('btnactive');//.open-btnは、クリックごとにbtnactiveクラスを付与＆除去。1回目のクリック時は付与
    $("#search-wrap").toggleClass('panelactive');//#search-wrapへpanelactiveクラスを付与
  $('#search-text').focus();//テキスト入力のinputにフォーカス
});
</script>
