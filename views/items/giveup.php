<div class="modal fade" id="trash_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;GIVEUP!</h4>

                  </div>
                  <form method="post" action="/bucket_lists/items/delete">
                  <div class="modal-body">
                    <p class="modal-title"></p>
                    <p>GiveUpコメントを入力して下さい。</p>
                      <textarea type="text" name="comment" class="form-control" rows="6" placeholder="give upコメントを入力してください"></textarea>

                    <input type="hidden" id="hidden" name="id">
                  </div>

                  <div class="modal-footer">
                  <button type="submit" class="btn btn-pink" id="modal-save"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;ゴミ箱へ</button>
                </div>
                </form>
              </div>
          </div>
        </div>