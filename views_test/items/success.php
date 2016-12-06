<?php
    session_start();
    require('../../dbconnect.php');
        $sql = sprintf('SELECT * FROM `likes` WHERE `user_id`=%d',
      mysqli_real_escape_string($db, $_SESSION['id'])
      );
    $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
    $like_items = array();
    while($table = mysqli_fetch_assoc($rec)){
      $like_items[] = $table['item_id'];
    }

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
                        <a href="#portfolio">マイページ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">タイムライン</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">トレンディング</a>
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
                            <img class="img-responsive img-circle" src="../image/plofile_fb_n.jpg" alt="" width="200" height="200">
                            <div class="intro-text">
                                <span class="name">masaaki kubo</span>
                                <p class="skills">プロフィール文</p>
                                <hr class="star-light">
                            </div>
                            <nav class="nav nav-tabs" style="width: 100%;">
                                <ul class="nav nav-tabs nav-justified">
                                    <li><a href="">バケットリスト</a></li>
                                    <li class="active"><a href="">達成リスト</a></li>
                                    <li><a href="">ゴミ箱リスト</a></li>
                                    <li><a href="/bucket_lists/views_test/users/followings.html">フォロー</a></li>
                                    <li><a href="/bucket_lists/views_test/users/followers.html">フォロワー</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

        </div>
      </div>
    </div>

    <div class="container-fluid content-main">
      <div class="row">
        <div class="col-md-4">
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 content-margin-top">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                 <table class="table table-list-search">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>項目</th>
                                    <th>達成日</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><strong>世界一周する</strong></td>
                                    <td>2016/11/02</td>
                                    <td>
                                        <i class="fa fa-flag" aria-hidden="true">&nbsp;1

<!-- 取得していた全ツイートデータの中からいいねが押される対象となるデータを取得 -->
<?php foreach($this->viewOptions as $viewOption): ?>
<?php if(in_array($viewOption['item_id'], $like_items)): ?>
  <!-- いいねが押されてたらオレンジで表示。ボタンを押したらアンライク発動 -->
[<a href="<?php echo "/bucket_lists/items/unlike/".$option ?>" style="color: orange;"><i class="fa fa-flag" aria-hidden="true"></i>

<!-- いいねされている数をカウント↓ -->
<?php echo $like_cnt; ?></a>]

<?php else: ?>
  <!-- いいねが押されてなければ無色のまま。ボタンを押したらライク発動 -->
[<a href="<?php echo "/bucket_lists/items/like/".$option ?>"><i class="fa fa-flag" aria-hidden="true"></i>

<!-- いいねされている数をカウント↓ -->
<?php echo $like_cnt; ?></a>]

<!-- in_array終了↓ -->
<?php endif; ?>
<!-- いいね機能の終了 -->
</i>
                                        &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star-empty"></i><i class="glyphicon glyphicon-star-empty"></i><i class="glyphicon glyphicon-star-empty"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><strong>スカイダイビングする</strong></td>
                                    <td>2016/12/13</td>
                                    <td>
                                        <i class="fa fa-flag" aria-hidden="true">&nbsp;3</i>
                                        &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star-empty"></i>
                                    </td>
                                </tr>
                            </tbody>
                 </table>
                </div>
            </div>
        </div>
<?php endforeach; ?>

      <div class="row">
        <div class="col-md-4">
        </div>
      </div>
    </div></div></div>

    <div class="content-wrapper">


        <footer class="container-fluid" style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
            BUCKET LISTS 
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bucket_lists/webroot/assets/js/bootstrap.min.js"></script>
  </body>
</html>