

        <div class="container-fluid">
          <div class="row" style="background-color:#fafafa;">
            <!--sidebar　左ページ　リスト一覧-->
            <section class="col-sm-4 sidebar">
              <ul class="list-unstyled">
                    <li class="active">new list
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>

                    <li>死ぬまでにやる
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                
                    <li>20代やることリスト
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
               
                    <li>プライベート
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                
              </ul>
              <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_list">リストを追加</button>

              
            </section>

            <!--main 右ページ　項目一覧-->
            <section class="col-sm-8 main-content">
                <!--項目追加-->

                <form>
                 <div class="input-group">
                    <input type="text" class="form-control" placeholder="+項目を追加する">
                        <span class="input-group-btn">
                            <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_new" data-name="item_id">add</button>
                        </span>
                </div>
                </form>
                    
                <!--項目一覧-->
            <ul class="list-unstyled">
                <a data-toggle="modal" href="#show_item" data-target="#show_item" data-name="item_id">
                    <li>
                        <dl>
                            <dt>これおわんないんやけど</dt>
                            <dd><a data-toggle="modal" href="" data-target="#edit_item" data-name="item_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#trash_item" data-name="item_id"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#success_item" data-name="item_id"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2016/7/10</p>
                            <p><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;26</p>
                            <p><img src="/bucket_lists/views/image/0.png"></p>
                        </div>
                    </li>
                </a>

                <a data-toggle="modal" href="#show_item" data-target="#show_item" data-name="item_id">
                    <li>
                        <dl>
                            <dt>絶対どっかおかしい</dt>
                            <dd><a data-toggle="modal" href="" data-target="#edit_item" data-name="item_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#trash_item" data-name="item_id"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#success_item" data-name="item_id"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2016/7/10</p>
                            <p><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;26</p>
                            <p><img src="/bucket_lists/views/image/1.png"></p>
                        </div>
                    </li>
                </a>

                <a data-toggle="modal" href="#show_item" data-target="#show_item" data-name="item_id">
                    <li>
                        <dl>
                            <dt>first-child後で修正</dt>
                            <dd><a data-toggle="modal" href="" data-target="#edit_item" data-name="item_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#trash_item" data-name="item_id"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#success_item" data-name="item_id"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2016/7/10</p>
                            <p><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;26</p>
                            <p><img src="/bucket_lists/views/image/2.png"></p>
                        </div>
                    </li>
                </a>

                <a data-toggle="modal" href="#show_item" data-target="#show_item" data-name="item_id">
                    <li>
                        <dl>
                            <dt>たぶんclearできてない</dt>
                            <dd><a data-toggle="modal" href="" data-target="#edit_item" data-name="item_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#trash_item" data-name="item_id"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#success_item" data-name="item_id"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2016/7/10</p>
                            <p><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;26</p>
                            <p><img src="/bucket_lists/views/image/4.png"></p>
                        </div>
                    </li>
                </a>

                    

                </ul>

                
                
            </section>
          </div>
        </div>


        <!--modal add_new-->
          <?php include('views/items/add.php'); ?>

        <!--modal add_list-->

          <?php include('views/lists/add.php'); ?>
       
        <!--modal edit_list-->

          <?php include('views/lists/edit.php'); ?>
        
        <!--modal edit_prof-->

        <div class="modal fade" id="edit_info" tabindex="-1" role="dialog">
          <?php include('views/users/edit.php'); ?>
        </div>

        <!--modal success_item-->

          <?php include('views/items/conglaturation.php'); ?>

        <!--modal giveup_item-->

          <?php include('views/items/giveup.php'); ?>

         <!--modal edit_item-->

          <?php include('views/items/edit.php'); ?>

         <!--modal show_item-->

          <?php include('views/items/show.php'); ?>
