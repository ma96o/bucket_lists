<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
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

      case 'login';
        $controller->login();
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

      function check() {
        special_echo('Controllerのcheck()が呼び出されました。');
        $this->c = $_SESSION['users'];
        $this->action = 'check';
        $this->display;
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
      function login(){
        special_echo('Controllerのlogin()が呼び出されました。');
        $this->action = 'login';
        $this->display();
      }
      function auth(){
        special_echo('Controllerのauth()が呼び出されました。');
        $login_flag = $this->user->auth($post);
        if ($login_flag) {
            header('Location: ../blogs/index');
            exit();
        } else {
            header('Location: login');
            exit();
        }
      }

      function logout(){
        special_echo('Controllerのlogout()が呼び出されました。');
        // セッション変数を全て解除する
        $_SESSION = array();
        // セッションを切断するにはセッションクッキーも削除する。
        // Note: セッション情報だけでなくセッションを破壊する。
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        // 最終的に、セッションを破壊する
        session_destroy();
        header('Location: /seed_blog/users/login');
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
      function follow(){
        special_echo('Controllerのfollow()が呼び出されました。');
      }
      function unfollow(){
        special_echo('Controllerのunfollow()が呼び出されました。');
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
