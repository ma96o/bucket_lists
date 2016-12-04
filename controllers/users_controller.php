<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'pre_check';
        $controller->pre_check();
        break;

      case 'check':
        $controller->check();
        break;

      case 'create';
      if(!empty($post['nick_name']) && !empty($post['password'])) {
          $controller->create($post);
        }
        break;

      case 'thanks';
        $controller->thanks();
        break;

      case 'login':
        if(!empty($post['email']) && !empty($post['password'])){
          $controller->login($post);
        } else {
          header('location:');
          exit();
        }
        break;

      case 'auth';
        if (!empty($post['email']) && !empty($post['password'])) {
            $controller->auth($post);
        } else {
            header('Location: login');
            exit;
        }
        break;

      case 'logout';
        $controller->logout();
        break;

      case 'mypage';
        $controller->mypage();
        break;

      case 'edit';
        $controller->edit();
        break;

      case 'update';
        $controller->update();
        break;

      case 'follow';
        $controller->follow();
        break;

      case 'unfollow';
        $controller->unfollow();
        break;

      case 'followings';
        $controller->followings();
        break;

      case 'followers';
        $controller->followers();
        break;

      default:
        break;
    }


    class UsersController {
      private $user;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action) {
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array('name' => '','email' => '','password' => '',);
      }

      function pre_check() {
        special_echo('Controllerのpre_check()が呼び出されました。');
        $errors = array();

        if(empty($_POST)) {
          header("Location: ");
          exit();
        } else{

        $email = isset($_POST['email']) ? $_POST['email'] : NULL;

        if ($email == ''){
          $errors['email'] = "メールが入力されていません。";
        } else{
          if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
            $errors['mail_check'] = "メールアドレスの形式が正しくありません。";
          }
          }
        }

        if (count($errors) === 0){

        $url_token = hash('sha256',uniqid(rand(),1));
        $url = "http://bucket-list.sakura.ne.jp/reg_practice/reg_form.php"."?url_token=".$url_token;

        //メールの宛先
        $emailTo = $email;
        //Return-Pathに指定するメールアドレス
        $returnMail = 'bucket-lists@bucket-list.sakura.ne.jp';
        $nick_name = 'Bucket Lists.inc';
        $subject = '[Bucket Lists]新規アカウント登録用URLのお知らせ';

$body = <<< EOM
24時間以内に下記のURLからご登録下さい。
{$url}
EOM;

        mb_language('ja');
        mb_internal_encoding('utf8');

        //Fromヘッダーを作成
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "Message-Id: <" . md5(uniqid(microtime())) . "@gmail.com>\n";
        $header .= 'From: bucket-lists@bucket-list.sakura.ne.jp';
        $header .= "Reply-To: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "Return-Path: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "X-Mailer: PHP/". phpversion();

        if(mb_send_mail($emailTo, $subject, $body, $header, '-f' . $returnMail)) {
        //セッション変数を全て解除
        $_SESSION = array();

        //クッキーの削除
        if (isset($_COOKIE["PHPSESSID"])) {
          setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        //セッションを破棄する
        session_destroy();

        $message = "メールを送信しました。24時間以内にメールに記載されたURLからご登録下さい。";
        } else {
          echo $errors['email_error'] = "メールの送信に失敗しました。";
          }
        }

      function check() {
        special_echo('Controllerのcheck()が呼び出されました。');
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
        $token = $_SESSION['token'];
        header('X-FRAME-OPTIONS: SAMEORIGIN');

        if ($_POST['token'] != $_SESSION['token']){
          echo "不正アクセスの可能性あり";
        exit();
        }

        if ($nick_name == '') {
          $errors['nick_name'] = "アカウントが入力されていません。";
        } elseif(mb_strlen($nick_name)>15) {
          $errors['nick_name_length'] = "アカウントは15文字以内で入力して下さい。";
        }

        //パスワード入力判定
        if ($password == '') {
          $errors['password'] = "パスワードが入力されていません。";
        } elseif(!preg_match('/^[0-9a-zA-Z]{5,30}$/', $_POST["password"])) {
          $errors['password_length'] = "パスワードは半角英数字の5文字以上30文字以下で入力して下さい。";
        } else {
          $password_hide = str_repeat('*', strlen($password));
        }
      }

        if (count($errors) === 0) {
          $_SESSION['nick_name'] = $nick_name;
          $_SESSION['password'] = $password;
        }
      }

      function create($post) {
        special_echo('Controllerのcreate()が呼び出されました。');
        $this->user->create($post);
        header('Location: thanks');
        exit();
      }

      function thanks(){
        special_echo('Controllerのthanks()が呼び出されました。');
        $this->action = 'thanks';
        $this->display();
      }
      function login($post){
        special_echo('Controllerのlogin()が呼び出されました。');
        $login_flag = $this->user->login($post);
        if($login_flag){
          header('location: ');
          exit();
        } else {
          header('location: ');
          exit();
        }

      }
      function auth(){
        special_echo('Controllerのauth()が呼び出されました。');
        $login_flag = $this->user->auth($post);
        if ($login_flag) {
            header('Location: ../items/trend');
            exit();
        } else {
            header('Location: login');
            exit();
        }
      }

      function logout(){
        special_echo('Controllerのlogout()が呼び出されました。');
        $_SESSION = array();

        if(ini_get("session.use_cookeis")){
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('location:');
        exit();

      }

      function mypage(){
        special_echo('Controllerのmypage()が呼び出されました。');
      }
      function edit(){
        special_echo('Controllerのedit()が呼び出されました。');
      }
      function update(){
        special_echo('Controllerのupdate()が呼び出されました。');
      }

      function follow($option){
        special_echo('Controllerのfollow()が呼び出されました。');
        $this->action = 'follow';
        $this->display();
        $this->displayProf();
        header('Location: ../index');
      }

      function unfollow($option){
        special_echo('Controllerのunfollow()が呼び出されました。');
        $this->action = 'unfollow';
        $this->display();
        $this->displayProf();
        header('Location: ../index');
      }

      function followings(){
        special_echo('Controllerのfollowings()が呼び出されました。');
      }
      function followers(){
        special_echo('Controllerのfpllowers()が呼び出されました。');
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }
    }

?>
