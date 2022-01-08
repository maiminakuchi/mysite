<?php
require_once '../dbconnect.php';
require_once('../Models/Db.php');


class All extends Db  {

    public function __construct($dbh = null) { //コンストラクタ。引数は$dbhがnull←？
    parent::__construct($dbh);
    }


    /**引数：なし
    *  新しいイベントを投稿する
    *  返り値：なし？
    */



    /**
  * eventテーブルから指定id(ログインユーザー)
  * @param integer $id   (user_id)
  * @return Array $result そのユーザーの投稿一覧
  */
    public function AllIndex($id = 0):Array {
        $sql = 'SELECT * FROM events WHERE del_flag = 0';
        // $sql .= ' WHERE user_id = :id';
        $sth = $this->dbh->prepare($sql);
        // $sth->bindParam(':id',$_SESSION['login_user']['id'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($_SESSION['login_user']['id']);

        return $result;
    }

    public function findByKeyword($keyword){
        $sql = "SELECT *,count(id) AS count
        FROM events
        WHERE del_flag = 0 AND
        title LIKE '%$keyword%'
        OR content LIKE '%$keyword%'
        OR place LIKE '%$keyword%'
        OR category LIKE '%$keyword%'
        OR date LIKE '%$keyword%'
        GROUP BY id";
        $sth = $this->dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function CountAllIndex($id = 0):Array {
        $sql = 'SELECT COUNT(*) FROM events WHERE del_flag = 0';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //     public function CountSearchIndex($id = 0):Array {
    //     $sql = "SELECT COUNT(id) FROM events
    //     WHERE del_flag = 0 AND
    //     title LIKE '%$keyword%'
    //     OR content LIKE '%$keyword%'
    //     OR place LIKE '%$keyword%'
    //     OR category LIKE '%$keyword%'
    //     OR date LIKE '%$keyword%'";
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    /**
    * playerテーブルから全データを取得
    *
    * @return Int $count 全選手の件数
    */
    public function AllcountPage():Int {
      $sql = 'SELECT COUNT(*) FROM events'; //全選手の数(736)
      // $sql .= ' WHERE id = :id';
      // $sql = 'SELECT count(*) as count FROM players';
      $sth = $this->dbh->prepare($sql); //SQL文を実行する準備
      // $sth->bindParam(':id', $_SESSION['login_user']['id'], PDO::PARAM_INT);
      $sth->execute(); //実行
      $count = $sth->fetchColumn(); //なぜfetchColumm?fetchでもいいのでは？
      return $count;
    }






}
