<!-- フォローしている人の一覧 -->
        <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-8 col-xs-offset-2 main-content">

                <div class="follow_follower_list">
                    <h4><i class="fa fa-user-circle" aria-hidden="true"></i>  follow</h4>

                <ul class="list-unstyled">
                <?php foreach($this->viewsOptions as $following): ?>
                    <a href="">
                        <li class="follow_followers">
                            <img class="img-circle" src="views/pf_image/<?php echo $following['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="/bucket_lists/users/unfollow/<?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローを外す</a>
                        </li>
                        </a>
                <?php endforeach; ?>
                </ul>
                </div>
             </section>
            </div>
          </div>
        </div>
        </div>
