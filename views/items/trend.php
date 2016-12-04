<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bucket Lists</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../webroot/assets/js/bootstrap.min.js"></script>
    <!--content style-->
    <script src="../webroot/assets/js/pin.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../webroot/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../webroot/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../webroot/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../webroot/assets/css/trending.css">
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
                        <a href="users_mypage.html">マイページ</a>
                    </li>
                    <li class="page-scroll">
                        <a href="actions_index.html">タイムライン</a>
                    </li>
                    <li class="page-scroll">
                        <a href="tranding.html">トレンディング</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    
       
    <div class="container">
        <section class="content-main">
            <div class="center-block">
                <div class="col-md-10 col-xs-offset-1">
                    <!--search box-->
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class='glyphicon glyphicon-search'></i>
                        </button>
                      </span>
                    </div>
                        <!--並べ替え-->
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Dropdown
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>


<br>

 
    <div class="container">
      <div class="row">
        <section id="pinBoot">

          <!--content-->  
        　<article class="white-panel">
            <a href="items_add.html">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> 世界一周する四んんんんんん</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>

            <p>
            <button type="button" class="btn btn-default btn-circle center-block" data-toggle="modal" data-target="#myModal-data" data-name="item_id">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            </p>
        　</article>

          <article class="white-panel">
            <a href="">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> 細かいところは後で治すのでこれで一旦お願い！</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>
            <p>
            <a href="fugafuga">
                 <button type="button" class="btn btn-default btn-circle center-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
            </p>
        　</article>

        <article class="white-panel">
            <a href="">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> addボタンのリンクと詳細ページへのリンクが変</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>
            <p>
            <a href="fugafuga">
                 <button type="button" class="btn btn-default btn-circle center-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
            </p>
        　</article>

        <article class="white-panel">
            <a href="">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> addボタンの位置がイマイチ</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>
            <p>
            <a href="fugafuga">
                 <button type="button" class="btn btn-default btn-circle center-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
            </p>
        　</article>

        <article class="white-panel">
            <a href="">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> キーカラーが決まってない</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>
            <p>
            <a href="fugafuga">
                 <button type="button" class="btn btn-default btn-circle center-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
            </p>
        　</article>

        <article class="white-panel">
            <a href="">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> 英語の時改行されてしまう</h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>
            <p>
            <a href="fugafuga">
                 <button type="button" class="btn btn-default btn-circle center-block"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
            </p>
        　</article>


          <article class="white-panel"> <img src="http://i.imgur.com/3gXW3L3.jpg" alt="">
            <h4><a href="#">Title 4</a></h4>
            <p>アイコンも結構イマイチだよね。後で相談させてくださいLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
              irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </article>

          <article class="white-panel"> <img src="http://i.imgur.com/o2RVMqm.jpg" alt="">
            <h4><a href="#">Title 5</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </article>

          <article class="white-panel"> <img src="http://i.imgur.com/kFFpuKA.jpg" alt="">
            <h4><a href="#">Title 6</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
              irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </article>


        </section>
        </div>
    </div>

     <!--modal-->
            <div class="modal fade" id="myModal-data" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">  
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>item_name</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-sm-8 ">
                                <div class="modal-box">
                                <label>内容：</label>
                                <p>ホゲホゲおホゲホゲホゲホゲホゲホゲホゲホゲホゲおホゲホゲホゲホゲホゲホゲホゲっす！</p>

                                <div class="dropdown">
                                <label>リスト選択</label>
                                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        list
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">hogehoge</a></li>
                                        <li><a href="#">hogehoge</a></li>
                                        <li><a href="#">hogehoge</a></li>
                                        <li role="separator" class="divider"></li>
                                      </ul>
                                </div>
                                <form>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInput1">期限</label>
                                        <input type="date" class="form-control" id="exampleInput1" placeholder="数値を入力してください">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInput2">説明</label>
                                        <input type="text" class="form-control" id="exampleInput2" placeholder="数値を入力してください">
                                    </div>
                                </form>
                                 </div>
                            </div>
                             <div class="col-sm-4 ">
                                <div class="modal-box">
                                <label><i class="fa fa-star-half-o" aria-hidden="true"></i> 35 doing </label>
                                <div class="thumbnail_circle">
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <span><a href="users_doing">doing一覧へ</a></span>
                                </div>
                                <br>
                                <label><i class="fa fa-star" aria-hidden="true"></i> 6 done </label>
                                <div class="thumbnail_circle">
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <a href="users_mypage"><img src="views/image/plofile_fb_n.jpg"></a>
                                    <span><a href="users_done">done一覧へ<a/></span>
                                </div>
                                </div>
                            </div>
                        </div>
                            
                
            </div>
            <button type="button" class="btn btn-default btn-circle btn-lg center-block">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <br>
            <!--div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modal-save" data-dismiss="modal">更新</button>
                        </div>
                    </div>
                </div-->
            </div>
            <div id="modal-result"></div>

    <script>
        /*表示　モーダルにidを渡す*/
        $('#myModal-data').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('name');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
        });
        /*表示　モーダルからデータを渡す*/
        $("#modal-save").click(function () {
        var input1 = $("#exampleInput1").val();
        var input2 = $("#exampleInput2").val();
     
        if (!$.isNumeric(input1) || !$.isNumeric(input2)) {
            alert("数値を入力してください");
            return false;
        }
     
        var sum = parseInt(input1) + parseInt(input2);
        $("#modal-result").html("<p>足すと " + sum + "になります。</p>");
    });

    </script>

        
  </body>
</html>