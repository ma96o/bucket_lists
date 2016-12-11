<div class="modal fade" id="trash_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
                  </div>
                  <form method="post" action="/bucket_lists/items/delete">
                  <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 ">
                                  <input type="text" name="comment" class="form-control" placeholder="give upコメントを入力してくださああああああい">
                                  <input type="hidden" id="hidden" name="id">
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-pink" id="modal-save">give up</button>
                </div>
                </form>
              </div>
          </div>
        </div>