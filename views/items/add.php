<div class="modal fade" id="add_new" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">  
      <div class="modal-content">
          
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;新規追加</h4>
          </div>
                    <div class="modal-body">
                      <form method="post" action="/bucket_lists/items/create" role="form">
                          <input type="hidden" id="hidden" name="item_id">
                              <div class="form-group">
                                  <label>項目名</label>
                                  <input type="hidden" id="title" name="item_name">
                                  <input type="text" class="form-control" id="exampleInput2" name="item_name">
                                  <br />
                                  <label>内容詳細</label>
                                  <input type="hidden" id="title" name="item_name">
                                  <input type="text" class="form-control" id="exampleInput2" name="comment">
                              </div>
                                  <br />
                                  <label>リスト選択</label>
                                      <select name="list_id" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">list
                                      <span class="caret"></span>
                                      <?php $lists = getList($_SESSION['id']); foreach($lists as $list): ?>
                                        <option value="<?php echo $list['list_id']; ?>"><?php echo $list['list_name']; ?></option>
                                      <?php endforeach; ?>
                                      </select>
                                        <br />
                                        <br />

                              <div class="form-group">
                                  <label>期限</label>
                                    <input type="date" class="form-control" id="exampleInput1" name="deadline">
                              </div>

                              <label>わくわく度</label>
                                <div class="starRating"></div>

                  <div class="modal-footer">
                      <button type="submit" class="btn btn-pink" id="modal-save">add</button>
                  </div>
                    </form>
              </div>
         </div>
</div>
</div>


