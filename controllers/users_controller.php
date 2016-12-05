<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'pre_signup';
        $controller->pre_signup();
        break;

      case 'pre_create';
        $controller->pre_create();
        break;

      case 'signup';
        $controller->signup();
        break;

      case 'check':
        if(!empty($post['nick_name']) && !empty($post['password'])) {
            $controller->create($post);
        } else {
          header('Location: ');
        }
        break;

      case 'create';
        $controller->create($post);
        break;

      case 'thanks';
        $controller->thanks();
        break;

      case 'login':
        if(!empty($post['email']) && !empty($post['password'])){
          $controller->login($post);
        } else {
          header('Location: ');
          exit();
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
      private $viewErrors;

      function __construct($resource, $action) {
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function pre_signup() {
        special_echo('Controllerのpre_create()が呼び出されました。');
        $this->action = 'pre_signup';
        if (!empty($post)) {
            $error = $this->user->pre_signup_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display();
          } else {
              $_SESSION['users'] = $post;
              header('Location: signup');
              exit();
                }
            }
                $this->display();
            }
      }

      function pre_create() {
        special_echo('Controllerのpre_create()が呼び出されました。');
        $this->action = 'pre_create';
        $error = $this->user->signup_valid($post);

        if(empty($_POST)) {
          header("Location: / ");
          exit();
        }

        if (count($error) === 0) {
        $url_token = hash('sha256',uniqid(rand(),1));
        $url = "http://bucket-list.sakura.ne.jp/reg_practice/reg_form.php"."?url_token=".$url_token;

        $emailTo = $email;
        $returnMail = 'bucket-lists@bucket-list.sakura.ne.jp';
        $nick_name = 'Bucket Lists.inc';
        $subject = '[Bucket Lists]新規アカウント登録用URLのお知らせ';

$body = <<< EOM
仮登録が完了しました。
24時間以内に下記のURLからご登録いただきますと、本登録が完了いたします。
本登録が完了しましたら、本サービスの利用を開始することができますので、
お手数ですが、引き続き登録作業よろしくお願いいたします！
{$url}
EOM;

        mb_language('ja');
        mb_internal_encoding('utf8');

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "Message-Id: <" . md5(uniqid(microtime())) . "@gmail.com>\n";
        $header .= 'From: bucket-lists@bucket-list.sakura.ne.jp';
        $header .= "Reply-To: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "Return-Path: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "X-Mailer: PHP/". phpversion();

        if(mb_send_mail($emailTo, $subject, $body, $header, '-f' . $returnMail)) {

        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
          setcookie("PHPSESSID", '', time() - 1800, '/');
        }

        session_destroy();

        $message = "メールを送信しました。24時間以内にメールに記載されたURLからご登録下さい。";
        } else {
          $errors['email_error'];
          }

          $this->display();
        }

      function signup($post, $option) {
        special_echo('Controllerのsignup()が呼び出されました。');
        $this->action = 'signup';
        if (!empty($post)) {
            $error = $this->user->signup_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display();
          } else {
              $_SESSION['users'] = $post;
              header('Location: check');
              exit();
                }
            } else {
            if ($option == 'rewrite') {
                $this->viewOptions = $_SESSION['users'];
            }
                $this->display();
            }
      }


      function check() {
        special_echo('Controllerのcheck()が呼び出されました。');
        $this->action = 'check';
        $this->display();

        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
        $token = $_SESSION['token'];

        if ($_POST['token'] != $_SESSION['token']){
          exit();
        }

        if (count($errors) === 0) {
          $_SESSION['nick_name'] = $nick_name;
          $_SESSION['password'] = $password;

          $_SESSION = array();

          if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
          }

            session_destroy();
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
