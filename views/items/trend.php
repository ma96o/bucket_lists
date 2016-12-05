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
                        並び替え
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class='active'><a href="#">人気度順</a></li>
                        <li><a href="#">新着順</a></li>
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
<?php foreach($this->viewsOptions as $item): ?>
        　<article class="white-panel">
            <a href="items_add.html">
                <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i><?php echo $item['item_name']; ?></h4>
                <span><i class="fa fa-star-half-o" aria-hidden="true"></i> doing 15</span>
                <span><i class="fa fa-star" aria-hidden="true"></i> done 3</span>
            </a>

            <p>
            <button type="button" class="btn btn-default btn-circle center-block" data-toggle="modal" data-target="#myModal-data" data-name="item_id">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            </p>
        　</article>
<?php endforeach; ?>

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
