        <div class="container-fluid">
          <div class="row">

            <section class="col-sm-10 col-xs-offset-1 main-content">
                
                <!--項目一覧-->
        <?php $i = 1; foreach($this->viewsOptions as $item): ?>
                 <ul class="list-unstyled">
                    <a href="hogehoge">
                    <li>
        <?php echo $i++; ?>
                        <dl>
                            <dt class="success"><?php echo $item['item_name']; ?></dt>
                            <dd><?php echo $item['created']; ?></dd>
                        </dl>
                    </li>
                    </a>
                </ul>
        <?php endforeach; ?>
            </section>
          </div>
        </div>

    <!--modal edit_prof-->

    <div class="modal fade" id="edit_info" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">  
          <div class="modal-content">
             <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">プロフィール編集</h4>
            </div>
           
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 ">
                        <label>nickname</label>
                            <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" role="form">

                        <input type="text" class="form-control" id="exampleInput1" placeholder="" value="編集前のnicknameを表示">
                        <br>
                        <label>説明文</label>
                        <input type="text" class="form-control" id="exampleInput2" placeholder="" value="編集前の説明文を表示">
                        <br>
                        <label>プロフィール画像</label>
                        <input type="file" name="picture_path" class="form-control">
                    </form>
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