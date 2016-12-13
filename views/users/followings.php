       <!-- フォローしている人の一覧 -->
        <div class="container-fluid">
          <div class="row">
            
            <section class="col-sm-10 col-xs-offset-1 main-content">
                <!--フォロー一覧-->


                <?php foreach($this->followings as $following): ?>
                    <div class="follow_list">
                        <div>
                            <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="/bucket_lists/users/unfollow/<?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローを外す
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            </section>
          </div>
        </div>