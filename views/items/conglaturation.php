<div class="modal fade" id="success_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4><i class="fa fa-check" aria-hidden="true"></i>&nbsp;CONGLATURATION!</h4>
                  </div>
                  <form method="post" action="<?php echo makePath('items/tassei'); ?>">
                  <div class="modal-body">
                  <p class="modal-title"></p>
                  <p>達成おめでとうございます。達成コメントを入力して下さい。</p>
                  <textarea type="text" name="comment" class="form-control" rows="6" placeholder="達成コメントを入力してください"></textarea>
                  <input type="hidden" id="hidden" name="id">
                  </div>
                  <div class="modal-footer">
                <button type="submit" class="btn btn-pink" id="modal-save"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;達成</button>

                </div>
                </form>
              </div>
          </div>
        </div>