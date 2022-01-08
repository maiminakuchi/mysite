<?php

require_once '../dbconnect.php';

class UserLogic
{
  /**
   * ユーザを登録する
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData)
  {
    $result = false;

    $sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';

    // ユーザデータを配列に入れる
    $arr = [];
    // $arr[] = str_repeat('あ', '64');
    $arr[] = $userData['username'];
    $arr[] = $userData['email'];
    $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch(\Exception $e) {
      echo $e; // エラーを出力
      error_log($e, 3, '../error.log'); //ログを出力
      return $result;
    }
  }

  /**
   * ログイン処理
   * @param string $email
   * @param string $password
   * @return bool $result
   */
  public static function login($email, $password)
  {
    // 結果
    $result = false;
    // ユーザをemailから検索して取得
    $user = self::getUserByEmail($email);

    if (!$user) {
      $_SESSION['msg'] = 'emailが一致しません。';
      return $result;
    }

    //パスワードの照会
    if (password_verify($password, $user['password'])) {
      //ログイン成功
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    }

    $_SESSION['msg'] = 'パスワードが一致しません。';
    return $result;
  }

  /**
   * emailからユーザを取得
   * @param string $email
   * @return array|bool $user|false
   */
  public static function getUserByEmail($email)
  {
    // SQLの準備
    // SQLの実行
    // SQLの結果を返す
    $sql = 'SELECT * FROM users WHERE email = ?';

    // emailを配列に入れる
    $arr = [];
    $arr[] = $email;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      // SQLの結果を返す
      $user = $stmt->fetch();
      // $_SESSION = $user;
      //👆これはいる❗️
      //やっぱいらない。$_SESSION['login_user']['role']でOK
      return $user;
    } catch(\Exception $e) {
      return false;
    }
  }

  /**
   * ログインチェック
   * @param void
   * @return bool $result
   */
  public static function checkLogin()
  {
    $result = false;
    
    // セッションにログインユーザが入っていなかったらfalse
    if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
      return $result = true;
    }

    return $result;

  }

  /**
   * ログアウト処理
   */
  public static function logout()
  {
    $_SESSION = array();
    session_destroy();
  }

}







// require_once'../dbconnect.php';


// class UserLogic
// {
//   /**
//    * 🌟１🌟ユーザを登録する
//    * @param array $userData
//    * @return bool $result
//    */
//   public static function createUser($userData) //これは＄_POSTの値。registerで呼び出した時に受け取っている
//   {
//     $result = false;

//     $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

//     // ユーザデータを配列に入れる
//      $arr = [];
//     $arr[] = str_repeat('あ', '64');
//     $arr[] = $userData['email'];
//     $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

//     try {
//       $stmt = connect()->prepare($sql);
//       $result = $stmt->execute($arr);
//       return $result;
//     } catch(\Exception $e) {
//       echo $e; // エラーを出力
//       // error_log($e, 3, '../error.log'); //ログを出力
//       return $result;
//     }
//   }

//   /**
//    * 🌟２🌟ログイン処理
//    * @param string $email,$password
//    * @return bool $result
//    */
//   public static function login($email,$password) {
//     //結果
//     $result = false;
//     //ユーザーをemailから検索して取得
//     $user = self::getUserByEmail($email);

//     if (!$user) {
//       $_SESSION['msg'] = 'emailが一致しません。';
//       return $result;
//     }
//     //パスワードの照会
//     if(password_verify($password, $user['password'])){
//     //ログイン成功
//     session_regenerate_id(true);
//     $_SESSION['login_user'] = $user;
//     $result = true;
//     return $result;
//     }

//     $_SESSION['msg'] = 'パスワードが一致しません。';
//     return $result;
    
//     }


//     /**
//    * 🌟３🌟emailからユーザーを取得
//    * @param string $email
//    * @return $user
//    */
//   public static function getUserByEmail($email) {
//   //SQLの準備⇨実行⇨結果を返す
//   // $result = false;

//     $sql = 'SELECT * FROM users WHERE email = ?';

//     // emailを配列に入れる
//     $arr = [];
//     $arr[] = $email;

//     try {
//       $stmt = connect()->prepare($sql);
//       $stmt->execute($arr);
//       //SQLの結果を返す
//       $user = $stmt->fetch();
//       return $user;
//     } catch(\Exception $e) {

//       // error_log($e, 3, '../error.log'); //ログを出力
//       return false;
//     }
//   }


// }
//👇セッションファイルに入っていた文字列

//id|s:1:"1";username|s:3:"mai";email|s:23:"mai.minakuchi@gmail.com";password|s:60:"$2y$10$j0mURmzJMhemsjYi3UqR1udwjg4FC/9hxqVct0hB/OKEAdFQV/rry";role|s:1:"1";insert_date|N;update_date|N;del_flag|s:1:"0";login_user|a:8:{s:2:"id";s:1:"1";s:8:"username";s:3:"mai";s:5:"email";s:23:"mai.minakuchi@gmail.com";s:8:"password";s:60:"$2y$10$j0mURmzJMhemsjYi3UqR1udwjg4FC/9hxqVct0hB/OKEAdFQV/rry";s:4:"role";s:1:"1";s:11:"insert_date";N;s:11:"update_date";N;s:8:"del_flag";s:1:"0";}