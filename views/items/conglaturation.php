<form method="post" action="/bucket_lists/items/tassei" class="form-horizontal" role="form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><?php echo $this->viewOptions['item_name']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 ">
            <div class="form-group">
              <label for="exampleInput3">項目詳細</label>
              <input name="comment" type="text" class="form-control" id="exampleInput2" value="" placeholder="達成時の説明文を書いてね">
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInput1">達成日</label>
              <input name="deadline" type="date" class="form-control" id="exampleInput1" value="" placeholder="数値を入力してください">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <p>
          <a href="/bucket_lists/items/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
          <input type="hidden" name="id" value="<?php echo $this->viewOptions['id']; ?>">
          <input type="submit" class="btn btn-pink" id="modal-save" data-dismiss="modal" value="達成しました！">
        </p>
      </div>
    </div>
  </div>
</form>