<div class="modal fade" id="show_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">  
        <div class="modal-content show_item">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title" id="item_name"><i class="fa fa-trash-o" aria-hidden="true"></i><i class="fa fa-sticky-note-o" aria-hidden="true"></i>&nbsp;</h4>


                  </div>
                  <div class="modal-body">
            <div class="comment">
              <h4 id="item_name"><i class="fa fa-check-circle-o" aria-hidden="true"></i></h4>
              <p id="item_comment"></p>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <dl class="modal_status">
                    <dt><i class="fa fa-calendar" aria-hidden="true"></i></dt>
                    <dd>deadline</dd>
                    <span id="item_deadline"></span>
                  </dl>
                </div>

                <div class="col-sm-4">
                  <dl class="modal_status">
                    <dt><i class="fa fa-thermometer-half" aria-hidden="true"></i></dt>
                    <dd>status</dd>
                    <span id="status"></span>
                  </dl>
                </div>

                <div class="col-sm-4">
                  <dl class="modal_status">
                    <dt><i class="fa fa-star" aria-hidden="true"></i></dt>
                    <dd>ワクワク度</dd>
                  <!--0-1の画像で出し分け-->
                  <img id="wkwk" src="/bucket_lists/views/image/.png">
                  </dl>
                </div>

              </div>

            </div>
                   <br>
                   <br>
        </div>
      </div>
</div>

<!--edit_item-->

      <?php include('views/items/edit.php'); ?>

<!--trash_item-->
       <?php include('views/items/giveup.php'); ?>

<!--success_item-->
       <?php include('views/items/conglaturation.php'); ?>

