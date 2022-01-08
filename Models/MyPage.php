<?php
require_once '../dbconnect.php';
require_once('../Models/Db.php');

$s = $_SESSION['login_user']['id'];

class MyPage extends Db  {

    public function __construct($dbh = null) { //コンストラクタ。引数は$dbhがnull←？
    parent::__construct($dbh);
    }


    /**引数：なし
    *  新しいイベントを投稿する
    *  返り値：なし？
    */

    public function insert(){

    $sql = "INSERT INTO
            events (title,content,place,date,category,user_id)
            VALUES
            ('".$_POST['title']."',
                '".$_POST['content']."',
                '".$_POST['place']."',
                '".$_POST['date']."',
                '".$_POST['category']."',
                ".$_SESSION['login_user']['id'].")";

    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($sql);
    // return $result;
    }

    /**
  * eventテーブルから指定id(ログインユーザー)
  * @param integer $id   (user_id)
  * @return Array $result そのユーザーの投稿一覧
  */
    public function myIndex($id = 0):Array {
        $sql = 'SELECT * FROM events';
        $sql .= ' WHERE user_id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id',$_SESSION['login_user']['id'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($_SESSION['login_user']['id']);

        return $result;
    }

    public function countMine($s) {
        $sql = 'SELECT COUNT(id) FROM events
                WHERE del_flag = 0 AND user_id = '.$_SESSION['login_user']['id'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    }

    /**
    * playerテーブルから全データを取得
    *
    * @return Int $count 全選手の件数
    */
    public function countPage():Int {
      $sql = 'SELECT COUNT(*) FROM events'; //全選手の数(736)
      $sql .= ' WHERE id = :id';
      // $sql = 'SELECT count(*) as count FROM players';
      $sth = $this->dbh->prepare($sql); //SQL文を実行する準備
      $sth->bindParam(':id', $_SESSION['login_user']['id'], PDO::PARAM_INT);
      $sth->execute(); //実行
      $count = $sth->fetchColumn(); //なぜfetchColumm?fetchでもいいのでは？
      return $count;
    }

    public function detail2($id = 0):Array {
        $sql = 'SELECT * FROM events';
        $sql .= ' WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id',$_SESSION['login_user']['id'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        // var_dump($_SESSION['login_user']['id']);

        return $result;
    }

    public function getdetail(){
           $sql = "SELECT * FROM events Where id = ".$_GET['id'];
           $sth = $this->dbh->prepare($sql);
           $sth->execute();
           $result = $sth->fetchAll(PDO::FETCH_ASSOC);
           // var_dump($result);
           $arr[] = $_GET['id'];
           return $result;
    }

    public function update_post (){
        // $id = $_GET['id'];
        $sql2 = "UPDATE events
                    SET title   = '".$_POST['title']."',
                        date   = '".$_POST['date']."',
                        place  = '".$_POST['place']."',
                        category  = '".$_POST['category']."',
                        content   = '".$_POST['content']."' WHERE id = ".$_POST['id'];
        // var_dump($update);
        // $dbh->commit();
        $sth = $this->dbh->prepare($sql2);
        $sth->execute();
        // header( "Location: contact.php" ) ;
    }
    public function delete_post ($id = 0, $del_flg = 0){
        // $id = $_GET['id'];
        $sql2 = "UPDATE events
                    SET del_flag = 1 WHERE id = ".$_GET['id'];
        // var_dump($update);
        // $dbh->commit();
        $sth = $this->dbh->prepare($sql2);
        $sth->execute();
        // header( "Location: contact.php" ) ;
    }

      public function deleteId($id = 0, $del_flg = 0){
      $sql = 'UPDATE events SET del_flag = 1 WHERE id = :id';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
      // $sth->bindParam(':del_flg', $del_flg, PDO::PARAM_INT);
      $sth->execute();
    }




}
