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

        echo '<div class="footer container-fluid">
                 BUCKET LISTS
              </div>';
    }
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/bucket_lists/webroot/assets/js/bootstrap.min.js"></script>
    <script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "/bucket_lists/views/image";
    $('.starRating').raty({
      // hints: [0,1,2,3,4,5]
      // click: function($score, $evt) {
      //          $.post('result.php',{score:$score, url:$evt.currentTarget.baseURI},
      //                 function(data){
      //                   location.href = 'result.php';
      //                 }
      //                );
      // }
    });
    </script>


<!--      if($this->action == 'trend'){
         echo "
 -->
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
          modal.find('.modal-body input#hidden').val(recipientId) //inputタグにも表示
          });
        </script>
<!--          ";
      }
 -->


</body>
</html>

