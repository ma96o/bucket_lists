<div class="modal fade" id="add_new" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
                  </div>
                  <form method="post" action="/bucket_lists/items/create" class="form-horizontal" role="form">
                  <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <input type="hidden" id="hidden" name="item_id">
                                        <div class="form-group">
                                            <label for="exampleInput3">内容詳細</label>
                                            <input type="text" class="form-control" id="exampleInput2" name="comment">
                                        </div>
                                        <label>リスト選択</label>
                                        <select class="custom-select">
                                          <option selected>リスト</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <br />
                                        <br />
                                        <div class="form-group">
                                            <label for="exampleInput1">期限</label>
                                            <input type="date" class="form-control" id="exampleInput1" name="deadline">
                                        </div>

                                        <label>わくわく度</label>
                                        <div class="starRating" class="form-control" id="exampleInput2">
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-pink" id="modal-save" data-dismiss="modal">add</button>
                        </div>
                        </form>
              </div>
         </div>
</div>