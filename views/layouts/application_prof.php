<?php

    if(!empty($_SESSION['user_id']) && $option == $_SESSION['user_id']){
        $user_flag = 0;
    } else {
        $user_flag = 1;
    }
    $user = aboutUser($option);
    $rtn = follow_all($option);

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bucket Lists</title>


    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo makePath('webroot/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo makePath('webroot/assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo makePath('webroot/assets/css/main.css'); ?>">

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
                <a class="navbar-brand" href="<?php echo makePath('items/trend'); ?>">BUCKET LISTS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                      <div id="custom-search-input">
                        <form action="<?php echo makePath('users/search'); ?>" method="post" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                              <input type="text" class="form-control" name="search_word" placeholder="ユーザ検索">
                              <span class="input-group-btn">
                                <button class="btn btn-pink" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                                </button>
                              </span>
                            </div>                     
                        </form>
                      </div>
                    </li>

                    <li class="page-scroll">
                        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $_SESSION['user_id']; ?>/<?php echo getFirstListId($_SESSION['user_id']); ?>">マイページ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo makePath('actions/index/'); ?><?php echo $_SESSION['user_id']; ?>">タイムライン</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo makePath('items/trend'); ?>">トレンディング</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo makePath('users/logout'); ?>">ログアウト</a>
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
                    <img class="center-block img-responsive img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $user["picture_path"]; ?>" alt="" width="150" height="150">
                    <h3><?php echo $user['nick_name']; ?>
<?php if($user_flag == 0): ?>
                    <span class="edit_info"><a href="<?php echo makePath('users/edit/'); ?><?php echo $_SESSION['user_id']; ?>" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </span>
<?php elseif($user_flag == 1 && empty($rtn)): ?>
                    <a href="<?php echo makePath('users/follow/'); ?><?php echo $user['user_id']; ?>" class="btn btn-pink">フォロー</a>
<?php elseif($user_flag == 1 && !empty($rtn)): ?>
                    <a href="<?php echo makePath('users/unfollow/'); ?><?php echo $user['user_id'] ?>" class="btn btn-pink">フォローを外す</a>
<?php endif; ?>
                    </h3>
                    <p><?php echo $user['description']; ?></p>

                </div>
            </div>
        </section>

        <!--タブ-->
        <section class="row">
            <div class="col-md-8 col-xs-offset-2">
                  <ul class="nav nav-pills nav-justified">
                    <li<?php if($this->action == 'mypage'){echo ' class="active"';} ?>><a href="<?php echo makePath('users/mypage/'); ?><?php echo $user['user_id']; ?>/<?php echo getFirstListId($user['user_id']); ?>">バケットリスト</a></li>
                    <li<?php if($this->action == 'success'){echo ' class="active"';} ?>><a href="<?php echo makePath('items/success/'); ?><?php echo $user['user_id']; ?>">達成リスト</a></li>
                    <li<?php if($this->action == 'trash'){echo ' class="active"';} ?>><a href="<?php echo makePath('items/trash/'); ?><?php echo $user['user_id']; ?>">ゴミ箱リスト</a></li>
    <?php if($user_flag == 0): ?>
                    <li<?php if($this->action == 'followers'){echo ' class="active"';} ?>><a href="<?php echo makePath('users/followings/'); ?><?php echo $user['user_id']; ?>">フォロー <?php echo countFollowing($user['user_id']); ?></a></li>
                    <li<?php if($this->action == 'followings'){echo ' class="active"';} ?>><a href="<?php echo makePath('users/followers/'); ?><?php echo $user['user_id']; ?>">フォロワー <?php echo countFollower($user['user_id']); ?></a></li>
    <?php elseif($user_flag == 1): ?>
                    <li<?php if($this->action == 'followings'){echo ' class="active"';} ?>><a href="<?php echo makePath('users/followings/'); ?><?php echo $user['user_id']; ?>">フォロー <?php echo countFollower($user['user_id']); ?></a></li>
                    <li<?php if($this->action == 'followers'){echo ' class="active"';} ?>><a href="<?php echo makePath('users/followers/'); ?><?php echo $user['user_id']; ?>">フォロワー <?php echo countFollowing($user['user_id']); ?></a></li>
    <?php endif; ?>
                  </ul>
            </div>
        </section>
        <br>


    <?php include('views/'.$this->resource.'/'.$this->action.'.php'); ?>

    </div>
        <footer class="container-fluid" style="min-height:200px; background-color:#00bcd4;color:#fff;text-align:center;padding-top:50px;">
            BUCKET LISTS 
        </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo makePath('webroot/assets/js/jquery.raty.js'); ?>"></script>
    <script src="<?php echo makePath('webroot/assets/js/bootstrap.min.js'); ?>"></script>
<!--      if($this->action == "index"){
         echo "
 -->
<script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "<?php echo makePath('views/image'); ?>";
    $('.starRating').raty({
      // hints: [0,1,2,3,4,5]
      // click: function($score, $evt) {
      //          $.post('./items/create',{score:$score, url:$evt.currentTarget.baseURI},
      //                 function(data){
      //                   location.href = './items/create';
      //                 }
      //                );
      // }
    });
</script>
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
          var recipientPriority = button.data('priority')

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body input#comment').val(recipientComment)
          modal.find('.modal-body input#deadline').val(recipientDeadline)
          modal.find('.modal-body div.starRating input').val(recipientPriority)
          });
        </script>
        <script>
          $('#show_item').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          var recipientComment = button.data('comment')
          var recipientDeadline = button.data('deadline')
          var recipientStatus = button.data('status')
          var recipientPriority = button.data('priority')

          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body h4#item_name').text(recipientTitle)
          // modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body p#item_comment').text(recipientComment)
          modal.find('.modal-body span#item_deadline').text(recipientDeadline)
          modal.find('.modal-body span#status').text(recipientStatus)
          modal.find('.modal-body img#wkwk').attr("src", "<?php echo makePath('views/image/'); ?>"+recipientPriority+".png")
          });
        </script>
        <script>
          $('#item_success').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          var recipientComment = button.data('comment')
          var recipientCreated = button.data('created')
          //Ajaxの処理はここに
          var recipientPriority = button.data('priority')

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body h4#item_name').text(recipientTitle)
          // modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body p#item_comment').text(recipientComment)
          modal.find('.modal-body span#item_created').text(recipientCreated)
          modal.find('.modal-body img#wkwk').attr("src", "<?php echo makePath('views/image/'); ?>"+recipientPriority+".png")
          });
        </script>
        <script>
          $('#item_trash').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          var recipientComment = button.data('comment')
          var recipientCreated = button.data('created')
          //Ajaxの処理はここに
          var recipientPriority = button.data('priority')

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body h4#item_name').text(recipientTitle)
          // modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body p#item_comment').text(recipientComment)
          modal.find('.modal-body span#item_created').text(recipientCreated)
          modal.find('.modal-body img#wkwk').attr("src", "<?php echo makePath('views/image/'); ?>"+recipientPriority+".png")
          });
        </script>
        <script>
          $('#edit_trash').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientComment = button.data('comment')
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body input#comment').val(recipientComment)
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
        <script>
          $('#edit_success').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientComment = button.data('comment')
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          modal.find('.modal-body input#comment').val(recipientComment)
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>

<!--          ";
    } -->
  </body>
</html>