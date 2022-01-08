<?php
// require_once($_SERVER["DOCUMENT_ROOT"].'/Models/CountEvents.php');
require_once('../Models/CountEvents.php');
require_once('../Models/MyPage.php');
require_once('../Models/All.php');
require_once('../Models/UserEvent.php');
// require_once('/Users/minakuchimai/Desktop/get/get_together/Models/CountEvents.php');

$s = $_SESSION['login_user']['id'];




class PlayerController {
	private $request;  //リクエストパラメータ（GET,POST）
	private $Player;

	  public function __construct() {
			//リクエストパラメータの取得
			$this->request['get'] = $_GET;
			$this->request['post'] = $_POST;
			//モデルオブジェクトの生成
		$this->CountEvents = new CountEvents(); //インスタンス生成
		$this->MyPage = new MyPage();
		$this->All = new All();
		$this->UserEvent = new UserEvent();
	  }


	public function countUE() {
		$s = $_SESSION['login_user']['id'];
		$countevent = $this->UserEvent->countUserEvent($s);
    //var_dump($countevent);
		return $countevent;
	}

	public function countM() {
		$s = $_SESSION['login_user']['id'];
		$countmine = $this->MyPage->countMine($s);
    // $c = ['sanka'=>$countevent];
		return $countmine;
	}


	public function insertEvent() {
		$result = $this->MyPage->insert($this->request['post']);
    // $result = ['sanka'=>$countevent];
		return $result;
	}


  public function view() {
	$users = $this->CountEvents->viewUser();
	$params = ['users' => $users]; //返り値を配列にセット
	return $params;
  }


  public function my_index() {  //①indexメソッド

	$page = 0;
	if(isset($this->request['get']['page'])){
		$page = $this->request['get']['page'];
	}//Playerクラスの中のfindAllメソッドを呼び出している
	$my_posts = $this->MyPage->myIndex($page);
	$my_index_count = $this->MyPage->countPage();
	$params = [
          'my_posts'
          => $my_posts//返り値を配列にセット
          ,'pages' => $my_index_count / 20
        ];
	return $params;
	}

	public function detail() {
	$detail = $this->MyPage->getdetail($this->request['get']);
	// var_dump($detail);
	return $detail;
	}

	public function update() {
	$up = $this->MyPage->update_post($this->request['get']);
	}

	public function delete() {
  if(empty($this->request['get']['id'])){
  	echo '指定のパラメータが不正です。このページを表示できません。';
  	exit;
  }
  $delete = $this->MyPage->delete_post($this->request['get']['id']);
  return $delete;
  }


  public function all_index() {
	$page = 0;
	if(isset($this->request['get']['page'])){
		$page = $this->request['get']['page'];
	}//Playerクラスの中のfindAllメソッドを呼び出している
	$all_posts = $this->All->AllIndex();

	$all_index_count = $this->All->AllcountPage($page);

	$allparams = [
          'all_posts'
          => $all_posts//返り値を配列にセット
          ,'pages' => $all_index_count / 20
        ];
	return $allparams;
	}

  public function search_index() {
    $keyword = $_POST["search"];
	  $search_posts = $this->All->findByKeyword($keyword);
	  $searchparams = [
          'search_posts'
          => $search_posts//返り値を配列にセット
        ];
	  return $searchparams;
  }

 //  public function search_index() {
	// $search_posts = $this->All->findByKeyword($keyword);
	// $searchparams = [
 //          'search_posts'
 //          => $search_posts//返り値を配列にセット
 //        ];
	// return $searchparams;
	// }

	public function countS() {
	$keyword = $_GET["search"];
	$countsaerch = $this->All->CountSearchIndex();
	// $c = ['sanka'=>$countevent];
	return $countsaerch;
	}

	public function countA() {
	$countall = $this->All->CountAllIndex();
	// $c = ['sanka'=>$countevent];
	return $countall;
	}

	public function ue_index() {
	// $page = 0;
	// if(isset($this->request['get']['page'])){
	// 	$page = $this->request['get']['page'];
	// }
	$ue_posts = $this->UserEvent->UserEventIndex(0);//(内に$page
	// $ue_index_count = $this->UserEvent->countUserEvent();
	$ueparams = [
          'ue_posts'
          => $ue_posts//返り値を配列にセット
          // ,'pages' => $ue_index_count / 20
        ];
        // var_dump($ueparams)
	return $ueparams;
	}

	public function all_sanka() {
  // if(empty($this->request['get']['id'])){
  // 	echo '指定のパラメータが不正です。このページを表示できません。';
  // 	exit;
  // }
  $sanka = $this->UserEvent->sanka($this->request['post']['id']);
  return $sanka;
  }

	public function all_sanka_del() {
  // if(empty($this->request['get']['id'])){
  // 	echo '指定のパラメータが不正です。このページを表示できません。';
  // 	exit;
  // }
  $sanka_del = $this->UserEvent->sanka_del($this->request['post']['id']);
  return $sanka_del;
  }


  //🌟以下二つ↓アカウント編集
  public function get_user_detail() {
	$udetail = $this->CountEvents->get_userdetail($this->request['get']);
	// var_dump($detail);
	return $udetail;
	}

	public function up_date_user() {
	$up = $this->CountEvents->update_user($this->request['get']);
	}






}
?>

