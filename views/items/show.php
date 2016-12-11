<div class="modal fade" id="show_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></h4>
                  </div>
                  <div class="modal-body">
            <div class="item">
              <h4 id="item_name"><i class="fa fa-check-circle-o" aria-hidden="true"></i></h4>
              <p id="item_comment"></p>
              <br>
              <div class="row">
                <div class="col-sm-4">
                  <label><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;期限</label><span id="item_deadline"></span>
                </div>

                <div class="col-sm-4">
                  <label><i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;status</label><span id="status"></span>
                </div>

                <div class="col-sm-4">
                  <label><i class="fa fa-star" aria-hidden="true"></i>&nbsp;ワクワク度</label>
                  <!--0-1の画像で出し分け-->
                  <img src="/bucket_lists/views/image/3.png">
                </div>

              </div>

            </div>
                   <br>
                   <br>
        </div>
      </div>
</div>
</div>

<!--edit_item-->

      <?php include('views/items/edit.php'); ?>

<!--trash_item-->
       <?php include('views/items/giveup.php'); ?>

<!--success_item-->
       <?php include('views/items/conglaturation.php'); ?>

