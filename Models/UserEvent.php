<?php
require_once '../dbconnect.php';
require_once('../Models/Db.php');

$s = $_SESSION['login_user']['id'];
class UserEvent extends Db  {

    public function __construct($dbh = null) { //コンストラクタ。引数は$dbhがnull←？
    parent::__construct($dbh);
    }

    public function countUserEvent($s){

    $sql = 'SELECT DISTINCT COUNT(ue.event_id) FROM user_event AS ue
            INNER JOIN events AS e ON e.id = ue.event_id
            WHERE e.del_flag = 0 AND ue.user_id = '
           .$_SESSION['login_user']['id'];

    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($sql);
    return $result;
    }

    public function UserEventIndex($s){
    //メソッド横のArrayは返り値の型を表します。

    $sql = 'SELECT e.id,e.title,e.content,e.place,e.date,e.category,e.user_id,e.del_flag
            FROM user_event AS ue
            INNER JOIN events AS e ON e.id = ue.event_id
            WHERE e.del_flag = 0 AND ue.user_id = '
           .$_SESSION['login_user']['id'];

    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($sql);
    return $result;
    }
    // public function CountUEIndex($id = 0):Array {
    // $sql = 'SELECT COUNT(*) FROM events WHERE del_flag = 0';
    // $sth = $this->dbh->prepare($sql);
    // $sth->execute();
    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // return $result;
    // }

    public function sanka(){

    $sql = "INSERT INTO
            user_event (user_id,event_id)
            VALUES
            ('".$_SESSION['login_user']['id']."',".$_POST['id'].")";

    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($sql);
    // return $result;
    }

    public function sanka_del(){

    $sql = "DELETE FROM user_event ";
    $sql.= "WHERE  user_id =".$_SESSION['login_user']['id']." AND event_id =".$_POST['id'];
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($sql);
    // return $result;
    }


}
