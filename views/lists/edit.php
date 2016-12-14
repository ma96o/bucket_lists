<div class="modal fade" id="edit_list" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">  
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;リストを編集</h4>
      </div>

      <form method="post" action="/bucket_lists/lists/update">
        <div class="modal-body">
          　<label>リスト名</label>
              <input type="text" class="form-control" id="list_title" name="list_name" value="">
              <input type="hidden" id="hidden" name="list_id">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        </div>
        
        <div class="modal-footer">
              <button type="submit" class="btn btn-pink" id="modal-save">更新</button>
        </div>
      </form>
    
    </div>
  </div>
</div>