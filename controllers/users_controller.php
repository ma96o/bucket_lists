<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {

      case 'home';
        $controller->home($post);
        break;

      case 'pre_create';
        $controller->pre_create($post);
        break;

      case 'pre_thanks';
        $controller->pre_thanks();
        break;

      case 'signup';
        $controller->signup($post,$option);
        break;

      case 'check':
        $controller->check();
        break;

      case 'create';
        $controller->create($post);
        break;

      case 'thanks';
        $controller->thanks();
        break;

      case 'login':
          $controller->login($post);
        break;

      case 'auth':
        if (!empty($post['email']) && !empty($post['password'])) {
            $controller->auth($post);
        } else {
            header('Location: login');
            exit();
        }
        break;

      case 'logout';
        $controller->logout();
        break;

      case 'mypage':
        $controller->mypage($option, $list_id);
        break;

      case 'edit';
        $controller->edit();
        break;

      case 'update';
        $controller->update();
        break;

      case 'follow';
        $controller->follow($option);
        break;

      case 'unfollow';
        $controller->unfollow($option);
        break;

      case 'followings';
        $controller->followings();
        break;

      case 'followers';
        $controller->followers();
        break;

      case 'edit':
        $controller->edit($option);
        break;
      case 'update':
        $controller->update($post);

        break;
      default:
        break;
    }

    class UsersController {
      private $user;
      private $resource;
      private $action;
      private $viewOptions;
      private $followings;
      private $followers;
      private $viewErrors;

      function __construct($resource, $action) {
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->followings = array();
        $this->followers = array();
        $this->viewOptions = array('nick_name' => '', 'email' => '', 'password' => '',);
        }

      function home($post) {
        if (!empty($post)) {
          $error = $this->user->home_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display();
          } else {
              $_SESSION['users'] = $post;
              header('Location: pre_create');
              exit();
                }
        } else {
            $this->display();
        }
      }

      function pre_create($post) {
        $this->action = 'pre_create';

        $email = isset($post['email']) ? $post['email'] : NULL;
        $url_token = hash('sha256',uniqid(rand(),1));
        $url = "http://bucket-list.sakura.ne.jp/bucket_lists/users/signup"."?url_token=".$url_token;

        $_SESSION['url_token'] = $url_token;
        $this->user->pre_create($post);

        $emailTo = $email;
        $returnMail = 'bucket-lists@bucket-list.sakura.ne.jp';
        $nick_name = 'Bucket Lists.inc';
        $subject = '[Bucket Lists]新規アカウント登録用URLのお知らせ';

$body = <<< EOM
仮登録が完了しました!
24時間以内に下記のURLからご登録いただきますと、本登録となります。
本登録が完了しましたら、本サービスの利用を開始することができますので、
お手数ですが、引き続き登録作業よろしくお願い致します。
{$url}
EOM;

        mb_language('ja');
        mb_internal_encoding('utf8');

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "Message-Id: <" . md5(uniqid(microtime())) . "@gmail.com>\n";
        $header .= "Reply-To: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "Return-Path: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "X-Mailer: PHP/". phpversion();
        $header .= 'From: bucket-lists@bucket-list.sakura.ne.jp';

        if(mb_send_mail($emailTo, $subject, $body, $header, '-f' . $returnMail)) {

        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        session_destroy();
        header('Location: pre_thanks');
        exit();
        }
          $this->display();

        }

      function pre_thanks() {
        $this->action = 'pre_thanks';
        $this->display();
      }

      function signup($post, $option) {
        $this->action = 'signup';
        $this->viewOptions = $this->user->signup_valid($post);

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
            if (!empty($_GET)) {
               $url_token = $_GET['url_token'];
            }
              $this->display();
            }
      }

      function check() {
        $this->viewOptions = $_SESSION['users'];
        $this->action = 'check';
        $this->display();

      }

      function create($post) {
        $this->user->create($post);
      }

      function thanks(){
        $this->action = 'thanks';
        $this->display();
      }

      function login(){
        $this->action = 'login';
        $this->display();
      }

      function auth($post) {
            $login_flag = $this->user->auth($post);
            if ($login_flag) {
                header('Location: home');
                exit();
            } else {
                header('Location: login');
                exit();
            }
        }

      function logout() {
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


      function mypage($option, $list_id){
        if($list_id == 0){
          $list_id = getFirstListId($option);
          header('location: /bucket_lists/users/mypage/'.$option.'/'.$list_id);
        }

        $this->viewsOptions = $this->user->mypage($option, $list_id);

        $this->displayProf($option, $list_id);

      }
      function edit(){
        $this->user->edit();
        $this->display($option);
      }
      function update($post){
        $this->user->update($post);
        header('location: /bucket_lists/users/mypage/'.$_SESSION['id']);
      }

      function follow($option){
        $this->user->follow($option);
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }
      function unfollow($option){
        $this->user->unfollow($option);
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }

      function followings(){
        $this->followings = $this->user->followings();
        require('views/users/followings.php');
      }
      function followers(){
        $this->followers = $this->user->followers();
        require('views/users/followers.php');

      }
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option, $list_id){
        require('views/layouts/application_prof.php');
      }
    }

?>