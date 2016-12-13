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

<?php 
    if($this->action == 'trend'){
        echo '<link rel="stylesheet" type="text/css" href="/bucket_lists/webroot/assets/css/trending.css">';
    } elseif($this->resource == 'actions' && $this->action == 'index') {
        echo '<link rel="stylesheet" type="text/css" href="/bucket_lists/webroot/assets/css/timeline.css">';
    }

?>

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
                <a class="navbar-brand" href="/bucket_lists/items/trend">BUCKET LISTS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                      <form action="/bucket_lists/users/search" method="post">
                        <input type="text" class="form-control input-lg" name="search_word" placeholder="ユーザ検索">
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                      </form>
                </div>
            </div>
                    </li>
                    <li class="page-scroll">
                        <a href="/bucket_lists/users/mypage/<?php echo $_SESSION['id']; ?>/<?php echo getFirstListId($_SESSION['id']); ?>">マイページ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/bucket_lists/actions/index/<?php echo $_SESSION['id']; ?>">タイムライン</a>
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


    <?php include('views/'.$this->resource.'/'.$this->action.'.php'); ?>


<?php
    if($this->action != 'trend'){

        echo '<footer class="container-fluid" style="min-height:200px; background-color:#00bcd4;color:#fff;text-align:center;padding-top:50px;">
            BUCKET LISTS 
        </footer>';
    }
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="/bucket_lists/webroot/assets/js/jquery.raty.js"></script>
    <script src="/bucket_lists/webroot/assets/js/bootstrap.min.js"></script>

<!--      if($this->action == 'trend'){
         echo "
 -->


<script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "/bucket_lists/views/image";
    $('.starRating').raty({
      // hints: [0,1,2,3,4,5]
      // click: function($score, $evt) {
      //          $.post('/bucket_lists/items/create',{score:$score, url:$evt.currentTarget.baseURI},
      //                 function(data){
      //                   location.href = '/bucket_lists/items/create';
      //                 }
      //                );
      // }
    });
</script>
        <script src='/bucket_lists/webroot/assets/js/pin.js'></script>
        <script>
          $('#add_new').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          // modal.find('.comment').text(recipientComment)
          modal.find('.modal-body input#title').val(recipientTitle) 
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
        <script>
          $('#item_detail').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
          var recipientTitle = button.data('title') //data-whatever の値を取得
          var recipientComment = button.data('comment')
          var recipientDoing = button.data('doing')
          var recipientDone = button.data('done')
          var recipientId = button.data('id')
          //Ajaxの処理はここに

          var modal = $(this)  //モーダルを取得
          //modal.find('.modal-title').text(recipientTitle) //モーダルのタイトルに値を表示
          modal.find('.modal-title').text(recipientTitle)
          // modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          modal.find('.modal-body span#doing').text(recipientDoing)
          modal.find('.modal-body span#done').text(recipientDone)
          modal.find('.modal-body p#item_comment').text(recipientComment)
          modal.find('.modal-body a#doing').attr("href", "/bucket_lists/items/doing/"+recipientId)
          modal.find('.modal-body a#done').attr("href", "/bucket_lists/items/done/"+recipientId)
          });
        </script>
<!--          ";
      }
 -->


</body>
</html>

