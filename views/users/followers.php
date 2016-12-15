              <!-- フォローされている人の一覧 -->
 <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-8 col-xs-offset-2 main-content">

                <div class="follow_follower_list">
                    <h4><i class="fa fa-user-circle" aria-hidden="true"></i>  follower</h4>


              <ul class="list-unstyled">
              <?php foreach($this->viewsOptions as $follower): ?>
                <?php $followall = follow_all($option); ?>
                   <?php if($follower['following_id'] !== $followall['follower_id'] && $follower['follower_id'] !== $followall['following_id']): ?>
                     <a href="">
                     <li class="follow_followers">
                            <img class="img-circle" src="views/pf_image/<?php echo $following['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $follower['nick_name']; ?></span>
                            <a href="/bucket_lists/users/follow/<?php echo $follower['user_id']; ?>" class="btn btn-pink" style="float: right;">
                                フォロー</a>
                            </li>
                            </a>
                    <?php else: ?>
                      <a href="">
                      <li class="follow_followers">
                          <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                          <span><?php echo $follower['nick_name']; ?></span>
                          <a href="/bucket_lists/users/unfollow/<?php echo $follower['user_id'] ?>" class="btn btn-default" style="float: right;">
                              フォローを外す
                          </a>
                          </li>
                        </a>
                  <?php endif; ?>
              <?php endforeach; ?>
              </ul>
              </div>
            </section>
          </div>
        </div>
      </div>
  </div>