<div class="modal fade" id="edit_trash" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">  
     <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;GIVEUPコメント編集</h4>
        </div>
        
        <form method="post" action="/bucket_lists/items/updateTrash">
          <div class="modal-body">
               <p class="modal-title"></p>
              <textarea type="text" name="comment" class="form-control" rows="6" id="comment" value=""></textarea>
              <input type="hidden" name="id" id="hidden">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-pink" id="modal-save"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;更新</button>
          </div>
        </form>
  
     </div>
  </div>
</div>