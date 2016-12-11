       <!-- フォローしている人の一覧 -->
        <div class="container-fluid">
          <div class="row">
            
            <section class="col-sm-10 col-xs-offset-1 main-content">
                 <h1>アイウエオ</h1>
                <!--フォロー一覧-->

                <?php echo '<pre>'; ?>
                <?php var_dump($this->followings); ?>
                <?php echo '</pre>'; ?>

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

                    <!-- <div>
                        <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                        <span>umaibomentaiaji</span>
                        <a href="" class="btn btn-default" style="float: right;">
                            フォローを外す
                        </a>
                    </div>

                    <div>
                        <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                        <span>umaibomentaiaji</span>
                        <a href="" class="btn btn-default" style="float: right;">
                            フォローを外す
                        </a>
                    </div> -->
                </div>

                

            </section>
          </div>
        </div>