
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
<!--   <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link rel="stylesheet" type="text/css" href="css/mypage.css">


</head>
<body>

<div class="side">

    <a class="rink" href="my_index.php">自分の投稿</a>
    <a class="rink" href="user_event_index.php">参加するイベント</a>
    <a class="rink" href="all_index.php">イベントを見つける</a>
    <a class="rink" href="account.php">アカウント編集</a>
    <?php if($_SESSION['login_user']['role'] == 1): ?>
    <a class="rink_under" href="users.php">ユーザー一覧(管理者)</a>
    <?php endif; //roleのif ?>
  </div>

</body>
</html>