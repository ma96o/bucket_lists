<div class="modal fade" id="add_list" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>リスト追加</h4>
                </div>
              <form method="post" action="/bucket_lists/lists/create">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <label>リスト名</label>
                            <input type="text" class="form-control" name="list_name" placeholder="リスト名を入力してください">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        </div>
                    </div>
                </div>
                        <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-pink" id="modal-save">add</button>
                </div>
              </form>
              </div>
          </div>
        </div>