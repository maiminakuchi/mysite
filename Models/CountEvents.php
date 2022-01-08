<?php

require_once '../dbconnect.php';
require_once('../Models/Db.php');

$s = $_SESSION['login_user']['id'];


class CountEvents extends Db  {

 public function __construct($dbh = null) {
 //コンストラクタ。引数は$dbhがnull←？
 parent::__construct($dbh);
 }




/**テスト
 * 全てのユーザー一覧
 * 引数：なし
 * 返り値：全てのユーザー
 **/
    public function viewUser(){

    $sql = 'SELECT*FROM users';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    return $result;
    }



    //ユーザーアップデートのため
    public function get_userdetail(){
           $sql = "SELECT * FROM users Where id = ".$_SESSION['login_user']['id'];
           $sth = $this->dbh->prepare($sql);
           $sth->execute();
           $result = $sth->fetchAll(PDO::FETCH_ASSOC);
           // var_dump($result);
           // $arr[] = $_GET['id'];
           return $result;
    }

    public function update_user (){
        // $id = $_GET['id'];
        $sql2 = "UPDATE users
                    SET username   = '".$_POST['username']."',
                        email   = '".$_POST['email']."',
                        password  = :password WHERE id = ".$_SESSION['login_user']['id'];
        // var_dump($update);
        // $dbh->commit();
        $a = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sth = $this->dbh->prepare($sql2);
        $sth->bindParam(':password', $a, PDO::PARAM_STR);
        $sth->execute();
        // header( "Location: contact.php" ) ;
    }


}
