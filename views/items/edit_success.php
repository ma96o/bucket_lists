<div class="modal fade" id="edit_success" tabindex="-1" role="dialog">
 <div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
                  </div>
                <form method="post" action="/bucket_lists/items/updateSuccess">
                  <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 ">
                                  <input type="text" name="comment" class="form-control" id="comment" value="">
                                  <input type="hidden" name="id" id="hidden">
                                </div>
                            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-pink" id="modal-save">更新する</button>
                </div>
              </form>
              </div>
</div>
</div>