<?php

    if(!empty($_SESSION['id']) && $option == $_SESSION['id']){
        $user_flag = 0;
    } else {
        $user_flag = 1;
    }
    $user = aboutUser($option);

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bucket Lists</title>



    <link rel="stylesheet" type="text/css" href="/bucket_lists/webroot/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bucket_lists/webroot/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bucket_lists/webroot/assets/css/main.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">BUCKET LISTS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="/bucket_lists/users/mypage/1">マイページ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/bucket_lists/actions/index/1">タイムライン</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/bucket_lists/items/trend">トレンディング</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container">
        <section class="content-main info">
            <div class="row">
                <div class="col-md-10 col-xs-offset-1">
                    <img class="center-block img-responsive img-circle" src="/bucket_lists/views/image/<?php echo $user['picture_path']; ?>" alt="" width="150" height="150">
                    <h3><?php echo $user['nick_name']; ?><span class="edit_info"><a data-toggle="modal" href="#edit_prof" data-target="#edit_info" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </span></h3>
                    <p><?php echo $user['description']; ?></p>

                </div>
            </div>
        </section>

        <!--タブ-->
        <section class="row">
            <div class="col-md-8 col-xs-offset-2">
                  <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="">バケットリスト</a></li>
                    <li><a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a></li>
                    <li><a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a></li>
                    <li><a href="/bucket_lists/users/followings/<?php echo $user['user_id']; ?>">フォロー <?php echo countFollowing($user['user_id']); ?></a></li>
                    <li><a href="/bucket_lists/users/followers/<?php echo $user['user_id']; ?>">フォロワー <?php echo countFollower($user['user_id']); ?></a></li>
                  </ul>
            </div>
        </section>
        <br>


    <?php include('views/'.$this->resource.'/'.$this->action.'.php'); ?>

    </div>
      <div class="footer container-fluid">
          BUCKET LISTS
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bucket_lists/webroot/assets/js/bootstrap.min.js"></script>
<!--      if($action == "index"){
         echo "
 -->
        <script>
          $('#edit_list').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-body input#list_title').val(recipientTitle)
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
        <script>
          $('#trash_item').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
        <script>
          $('#success_item').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
        <script>
          $('#edit_item').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          var recipientComment = button.data('comment')
          var recipientDeadline = button.data('deadline')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body input#comment').val(recipientComment)
          modal.find('.modal-body input#deadline').val(recipientDeadline)
          });
        </script>
<!--          ";
    } -->
  </body>
</html>