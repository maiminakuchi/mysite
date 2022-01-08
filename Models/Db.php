<?php
// define('ROOT_PATH', str_replace('public', '', $_SERVER["DOCUMENT_ROOT"]));

require_once('../database.php');

class Db {
	//👇プロパティ
	protected $dbh; //この値は固定。数字もあれば文字列もある。 private $name;  人間の名前
    //👇メソッド
	public function __construct($dbh = null) { //コンストラクタ。引数は$dbhがnull←？
		if(!$dbh) {  //もし$dbhがなかったら
			try {
				$this->dbh = new PDO( //変数dbhを呼び出して DB接続のクラスを呼び出している。初期化されたPDOクラスのオブジェクトが代入される。オブジェクトの生成。
					'mysql:dbname='.DB_NAME.
					';host='.DB_HOST, DB_USER, DB_PASSWD
				);
				//接続成功
			} catch (PDOException $e) {
				echo "接続失敗:" . $e->getMessage() . "\n";
				exit();
			}
		} else{ //接続情報が存在するばあい
			$this->dbh = $dbh;
		}
	}
	public function get_db_handler() {
		return $this->dbh;
	}
}