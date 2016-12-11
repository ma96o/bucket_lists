        <!-- フォローされている人の一覧 -->
        <div class="container-fluid">
          <div class="row">
            
            <section class="col-sm-10 col-xs-offset-1 main-content">
             
                <!--フォロー一覧-->
            <div class="follow_list">

              <?php foreach($this->followers as $follower): ?>
                <?php foreach($followall as $following): ?>
                   
                   <!-- <h1>folllowerテーブル</h1>
                   <?php echo '<pre>'; ?>
                   <?php var_dump($this->followers); ?>
                   <?php echo '</pre>'; ?> -->

                   <!-- <h1>followingsテーブル</h1>
                   <?php echo '<pre>'; ?>
                   <?php var_dump($followall) ?>
                   <?php echo '</pre>'; ?>  -->

                  <?php if($follower['following_id'] == $following['follower_id'] && $follower['follower_id'] == $following['following_id']): ?>
                    <div>
                      <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                      <span><?php echo $follower['nick_name']; ?></span>
                      <a href="/bucket_lists/users/unfollow/<?php echo $follower['user_id'] ?>" class="btn btn-default" style="float: right;">
                          フォローを外す
                      </a>
                    </div>  
                  <?php else: ?>
                    <div>
                        <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                        <span><?php echo $follower['nick_name']; ?></span>
                        <a href="/bucket_lists/users/follow/<?php echo $follower['user_id'] ?>" class="btn btn-pink" style="float: right;">
                            フォロー
                        </a>
                    </div>  

                  <!-- <?php if($follower['following_id'] !== $following['follower_id'] ): ?>

                        <div>
                            <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                            <span><?php echo $follower['nick_name']; ?></span>
                            <a href="/bucket_lists/users/follow/<?php echo $follower['user_id'] ?>" class="btn btn-pink" style="float: right;">
                                フォロー
                            </a>
                        </div>  
                  <?php else: ?>
                      <div>
                          <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                          <span><?php echo $follower['nick_name']; ?></span>
                          <a href="/bucket_lists/users/unfollow/<?php echo $follower['user_id'] ?>" class="btn btn-default" style="float: right;">
                              フォローを外す
                          </a>
                      </div>
                  <?php endif; ?> -->
                 <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
           </div>

                

            </section>
          </div>
        </div>