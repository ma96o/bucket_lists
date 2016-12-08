

        <div class="container-fluid">
          <div class="row" style="background-color:#fafafa;">
            <!--sidebar　左ページ　リスト一覧-->
            <section class="col-sm-4 sidebar">
              <ul class="list-unstyled">
                <a href="hogehoge/list_id">
                    <li class="active">new list
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                </a>
                
                <a href="list_id">
                    <li class="active">死ぬまでにやる
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                </a>

                <a href="list_id">
                    <li class="active">20代やることリスト
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                </a>

                <a href="list_id">
                    <li class="active">プライベート
                    <p><a data-toggle="modal" href="#edit_list" data-target="#edit_list" data-name="list_id"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                </a>
                
              </ul>
              <button class="btn btn-default" type="button" data-toggle="modal" data-target="#add_list">リストを追加</button>

              
            </section>

            <!--main 右ページ　項目一覧-->
            <section class="col-sm-8 main-content">
                <!--項目追加-->
                 <div class="input-group">
                    <from>
                    <input type="text" class="form-control" placeholder="+項目を追加する">
                        <span class="input-group-btn">
                            <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_new" data-name="item_id">add</button>
                        </span>
                    </form>
                </div>
                <!--項目一覧-->
                 <ul class="list-unstyled">
                    <a href="items_show.html">
                    <li>
                        <dl>
                            <dt>これおわんないんやけど</dt>
                            <dd>2016/7/10</dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-flag" aria-hidden="true">&nbsp;26</i></p>
                            <img src="/bucket_lists/views/image/0.png">
                        </div>
                    </li>
                    </a>
                </ul>

                <ul class="list-unstyled">
                    <a href="items_show.html">
                    <li>
                        <dl>
                            <dt>なんか変なバランスやねん</dt>
                            <dd>2016/7/10</dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-flag" aria-hidden="true">&nbsp;26 </i></p>
                            <img src="/bucket_lists/views/image/1.png">
                        </div>
                    </li>
                    </a>
                </ul>

                <ul class="list-unstyled">
                    <a href="items_show.html">
                    <li>
                        <dl>
                            <dt>どないしよか</dt>
                            <dd>2016/7/10</dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-flag" aria-hidden="true">&nbsp;26</i></p>
                            <img src="/bucket_lists/views/image/2.png">
                        </div>
                    </li>
                    </a>
                </ul>

                <ul class="list-unstyled">
                    <a href="items_show.html">
                    <li>
                        <dl>
                            <dt>どないしよか</dt>
                            <dd>2016/7/10</dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-flag" aria-hidden="true">&nbsp;5</i></p>
                            <img src="/bucket_lists/views/image/3.png">
                        </div>
                    </li>
                    </a>
                </ul>

                <ul class="list-unstyled">
                    <a href="items_show.html">
                    <li>
                        <dl>
                            <dt>どないしよか</dt>
                            <dd>2016/7/10</dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-flag" aria-hidden="true">&nbsp;6</i></p>
                            <img src="/bucket_lists/views/image/4.png">
                        </div>
                    </li>
                    </a>
                </ul>

            </section>
          </div>
        </div>


    <!--modal add_new-->
    <div class="modal fade" id="add_new" tabindex="-1" role="dialog">
          <?php include('views/items/add.php'); ?>
        </div> 

        <!--modal add_list-->

        <div class="modal fade" id="add_list" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">  
              <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>リスト追加</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <label>リスト名</label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="リスト名を入力してください">
                        </div>
                    </div>
                </div>
                        <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-pink" id="modal-save" data-dismiss="modal">add</button>
                </div>
              </div>
          </div>
        </div>

        <!--modal edit_list-->

        <div class="modal fade" id="edit_list" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">  
              <div class="modal-content">
                 <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">リスト編集</h4>
                </div>
               
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <label></label>
                            <input type="text" class="form-control" id="exampleInput2" placeholder="" value="編集前のリスト名を表示">
                        </div>
                    </div>
                </div>
                        <br>
                <div class="modal-footer">
                    <button type="button" class="btn" id="modal-save" data-dismiss="modal">更新</button>
                </div>
              </div>
          </div>
        </div>
        
        <!--modal edit_prof-->

        <div class="modal fade" id="edit_info" tabindex="-1" role="dialog">
          <?php include('views/users/edit.php'); ?>
        </div>

    <script>
        

    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "image";
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

  

  </body>
</html>