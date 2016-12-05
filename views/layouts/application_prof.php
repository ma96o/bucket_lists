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

    <div class="container-fluid" id="pf-top">
      <div class="row">
        <div class="col-md-4 content-margin-top">
            <header id="page-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img class="img-responsive img-circle" src="/bucket_lists/views/image/<?php echo $user['picture_path']; ?>" alt="" width="200" height="200">
                            <div class="intro-text">
                                <span class="name"><?php echo $user['nick_name']; ?></span>
                                <p class="skills"><?php echo $user['description']; ?></p>
                                <hr class="star-light">
                            </div>
                            <nav class="nav nav-tabs" style="width: 100%;">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active"><a href="">バケットリスト</a></li>
                                    <li><a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a></li>
                                    <li><a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a></li>
                                    <li><a href="/bucket_lists/users/followings/<?php echo $user['user_id']; ?>">フォロー <?php echo countFollowing($user['user_id']); ?></a></li>
                                    <li><a href="/bucket_lists/users/followers/<?php echo $user['user_id']; ?>">フォロワー <?php echo countFollower($user['user_id']); ?></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
        </div>
      </div>
    </div>


    <?php include('views/'.$this->resource.'/'.$this->action.'.php'); ?>


    <div class="content-wrapper">


        <footer class="container-fluid" style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
            BUCKET LISTS 
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bucket_lists/webroot/assets/js/bootstrap.min.js"></script>
  </body>
</html>