<div class="modal fade" id="add_list" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;リストを追加</h4>
                </div>
              <form method="post" action="<?php echo makePath('lists/create'); ?>">
                <div class="modal-body">
                            <label>リスト名</label>
                            <input type="text" class="form-control" name="list_name" placeholder="リスト名を入力してください">
                            <input type="hidden" name='user_id' value="<?php echo $_SESSION['user_id']; ?>">
                        </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-pink" id="modal-save">add</button>
                </div>
              </form>
              </div>
          </div>
        </div>