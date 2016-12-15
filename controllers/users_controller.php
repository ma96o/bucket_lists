<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {

      case 'home';
        $controller->home($post,$option);
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
            header('Location: /bucket_lists/users/home');
            exit();
        }
        break;

      case 'logout';
        $controller->logout();
        break;

      case 'mypage':
        $controller->mypage($option, $list_id);
        break;

      case 'follow';
        $controller->follow($option);
        break;

      case 'unfollow';
        $controller->unfollow($option);
        break;

      case 'followings';
        $controller->followings($option);
        break;

      case 'followers';
        $controller->followers($option);
        break;

      case 'edit':
        $controller->edit($option);
        break;

      case 'update':
        $controller->update($post);
        break;
      case 'search':
        $controller->search($post);
        break;
      default:
        header('location: /bucket_lists/users/home');
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
        $this->viewsOptions = array('nick_name' => '', 'email' => '', 'password' => '',);
        }

      function home($post,$option) {
        if (!empty($post)) {
          if(!empty($post['token'])){
//新規登録処理
          $error = $this->user->home_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display(1);
            } else {
              $_SESSION['users'] = $post;
              header('Location: pre_create');
              exit();
            }
          } else {

//ログイン処理
          $error_login = $this->user->auth($post);
            if(!empty($error_login) && $error_login = "false"){
              $this->viewOptions = $post;
              $this->viewErrors = $error_login;
              $this->display(1);
            } else {
              header('Location: /bucket_lists/users/mypage/'.$_SESSION['user_id']);
              exit();
            }
          }

        } else {
            $this->display(1);
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

        }

      function pre_thanks() {
        $this->display($option);
      }

      function signup($post, $option) {
        $this->action = 'signup';
        $this->viewOptions = $this->user->signup_valid($post);

        if (!empty($post)) {
            $error = $this->user->signup_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display(1);
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
              $this->display(1);
            }
      }

      function check() {
        $this->viewOptions = $_SESSION['users'];
        $this->display(1);

      }

      function create($post) {
        $this->user->create($post);
      }

      function thanks(){
        $this->display(1);
      }

      function login(){
        $this->display(1);
      }

      function auth($post) {
        }

      function logout() {
        isLogin();
        $_SESSION = array();

        if(ini_get("session.use_cookeis")){
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('location: /bucket_lists/users/home');
        exit();

      }


      function mypage($option, $list_id){
        isLogin();
        if($list_id == 0){
          $list_id = getFirstListId($option);
          header('location: /bucket_lists/users/mypage/'.$option.'/'.$list_id);
        }


        $this->viewOptions = $this->user->mypage($option, $list_id);


        $this->displayProf($option, $list_id);

      }

      function edit($option){
        isLogin();
        $this->user->edit($option);

        $this->display($option);
      }
      function update($post){
        isLogin();
        $this->user->update($post);
        header('location: /bucket_lists/users/mypage/'.$_SESSION['user_id']);
      }

      function follow($option){
        isLogin();
        $this->user->follow($option);
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }
      function unfollow($option){
        isLogin();
        $this->user->unfollow($option);
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }


      function followings($option){
        $this->viewOptions = $this->user->followings($option);
        $this->displayProf($option, 0);
      }

      function followers($option){
        $this->viewOptions = $this->user->followers($option);
        $this->displayProf($option, 0);
      }
      function search($post){
        $this->viewOptions = $this->user->search($post);
        $this->display($post['search_word']);

      }
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option, $list_id){
        require('views/layouts/application_prof.php');
      }
    }
?>