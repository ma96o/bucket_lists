<div class="modal fade" id="edit_item" tabindex="-1" role="dialog">
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
                                            <label for="exampleInput3">内容詳細</label>
                                            <input type="text" class="form-control" id="comment" name="comment">
                                        </div>

                                        <label>リスト選択</label>
                                          <select name="list_id" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">list
                                          <span class="caret"></span>
                                      <?php $lists = getList($_SESSION['id']); foreach($lists as $list): ?>
                                            <option value="<?php echo $list['list_id']; ?>"><?php echo $list['list_name']; ?></option>
                                      <?php endforeach; ?>
                                        </select>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInput1">期限</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline">
                                        </div>

        <label for="name" class="col-md-3 control-label">tag_id</label>
        <textarea name="tag_id" class="form-control" cols="30" rows="1"></textarea>
      <p>

                                        <label>わくわく度</label>
                                        <div class="starRating" class="form-control" id="exampleInput2">
                                            </div>
                                        <input type="hidden" id="hidden" name="id">
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-pink" id="modal-save">更新</button>
                        </div>
                  </form>
              </div>
         </div>
         </div>
        </div>


