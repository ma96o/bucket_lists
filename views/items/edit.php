  <div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="/bucket_lists/items/update">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    
                                        <div class="form-group">
                                            <label for="exampleInput3">説明</label>
                                            <input type="text" class="form-control" id="comment" name="comment">
                                        </div>

                                        <div class="dropdown">
                                        <label>リスト選択</label>
                                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                list
                                                <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="#">hogehoge</a></li>
                                                <li><a href="#">hogehoge</a></li>
                                                <li><a href="#">hogehoge</a></li>
                                                <li role="separator" class="divider"></li>
                                              </ul>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInput1">期限</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline">
                                        </div>

                                        <label>わくわく度</label>
                                        <div class="starRating" class="form-control" id="exampleInput2">
                                            </div>
                                        <input type="hidden" id="hidden" name="id">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-pink" id="modal-save">更新</button>
                        </div>
                  </form>
              </div>
         </div>

