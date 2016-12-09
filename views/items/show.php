<div class="modal fade" id="show_item" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">  
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>item_name</h4>
                  </div>
                  <div class="modal-body">
            <div class="item">
              <h4><i class="fa fa-check-circle-o" aria-hidden="true"></i>  エベレストに登っちゃうよん</h4>
              <p>イモトになりたいから！イモトになりたいから！イモトになりたいから！イモトになりたいから！イモトになりたいから！</p>
              <br>
              <div class="row">
                <div class="col-sm-4">
                  <label><i class="fa fa-calendar" aria-hidden="true"></i></i>&nbsp;期限</label>2016/7/10
                </div>

                <div class="col-sm-4">
                  <label><i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;status</label>doing
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





<!-- <div class="modal fade" id="item_show" tabindex="-1" role="dialog">

    <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-10 col-xs-offset-1 main-content">
                   
                  <div class="item">
                    <label><i class="fa fa-angle-right" aria-hidden="true"></i> list_name</label>
                    <h4><i class="fa fa-tags" aria-hidden="true"></i>  エベレストに登っちゃうよん</h4>
                    <p>ここに説明文を表示してくらふぁい。イモトになりたいから！イモトになりたいから！イモトになりたいから！イモトになりたいから！イモトになりたいから！</p>

                    <div class="action_icons">
                      <span><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;応援する</span>&nbsp;&nbsp;  
                      <span><a href=""><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;追加する</a></span>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-sm-4">
                        <label><i class="fa fa-calendar" aria-hidden="true"></i></i>&nbsp;期限</label>2016/7/10
                      </div>

                      <div class="col-sm-4">
                        <label><i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;status</label>doing
                      </div>

                      <div class="col-sm-4">
                        <label><i class="fa fa-star" aria-hidden="true"></i>&nbsp;ワクワク度</label>
                        
                        <img src="/bucket_lists/views/image/1.png">
                      </div>

                   </div>

                   <br>
                   <br>

                      
                      <button class="btn btn-pink" type="submit" data-toggle="modal" data-target="#edit_item" data-id="item_id"><i class="fa fa-pencil" aria-hidden="true"ß></i>&nbsp;編集</button>

                      <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#trash_item"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;ゴミ箱</button>

                      <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#success_item"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;done</button>

                  </div>
            </section>
          </div>
          </div>
        </div>        
    </div>
</div>
 -->
<!--edit_item-->
 <div class="modal fade" id="edit_item" tabindex="-1" role="dialog">
      <?php include('views/items/edit.php'); ?>
</div> 

<!--trash_item-->
<div class="modal fade" id="trash_item" tabindex="-1" role="dialog">
       <?php include('views/items/giveup.php'); ?>   
</div>

<!--success_item-->
<div class="modal fade" id="success_item" tabindex="-1" role="dialog">
       <?php include('views/items/conglaturation.php'); ?>   
</div>

