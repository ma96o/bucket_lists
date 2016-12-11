<form method="post" action="/bucket_lists/items/create" class="form-horizontal" role="form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><?php echo $this->viewOptions['list_name']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 ">
            <div class="form-group">
              <label for="exampleInput3">項目詳細</label>
              <input name="comment" type="text" class="form-control" id="exampleInput2" value="<?php echo $this->viewOptions['comment']; ?>" placeholder="元の説明文を表示してねん">
            </div>
            <div class="dropdown">
              <label>リスト選択</label>
              
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInput1">期限</label>
              <input name="deadline" type="date" class="form-control" id="exampleInput1" value="<?php echo $this->viewOptions['deadline']; ?>" placeholder="数値を入力してください">
            </div>

            <label for="name" class="col-md-3 control-label">item_id</label>
            <input name="item_id" class="form-control" cols="30" rows="1" value="<?php echo $this->viewOptions['item_id']; ?>"></input>

            <label for="name" class="col-md-3 control-label">user_id</label>
            <input name="user_id" class="form-control" cols="30" rows="1" value="<?php echo $this->viewOptions['user_id']; ?>"></input>


            <label for="name" class="col-md-3 control-label">tag_id</label>
            <input name="tag_id" class="form-control" cols="30" rows="1" value="<?php echo $this->viewOptions['tag_id']; ?>"></input>

            <label>わくわく度</label>
            <div class="starRating" class="form-control" id="exampleInput2">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <p>
          <a href="/bucket_lists/items/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
          <input type="hidden" name="id" value="<?php echo $this->viewOptions['id']; ?>">
          <input type="submit" class="btn btn-pink" id="modal-save" data-dismiss="modal" value="更新する">
        </p>
      </div>
    </div>
  </div>
<script src="/bucket_lists/webroot/assets/js/jquery.raty.js"></script>


<script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "image";
    $('.starRating').raty({
      hints: [0,1,2,3,4,5]
      click: function($score, $evt) {
               $.post('/bucket_lists/items/edit',{score:$score, url:$evt.currentTarget.baseURI},
                      function(data){
                        location.href = '/bucket_lists/items/edit';
                      }
                     );
      }
    });
</script>
</form>