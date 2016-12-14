<?php

    if(!empty($_SESSION['id']) && $option == $_SESSION['id']){
        $user_flag = 0;
    } else {
        $user_flag = 1;
    }
    $user = aboutUser($option);
    $rtn = follow_all($option);

?>
        <div class="container-fluid">
          <div class="row">

            <section class="col-sm-10 col-xs-offset-1 main-content">
                <!--フォロー一覧-->

                <?php foreach($this->followings as $following): ?>
                    <div class="follow_list">
                    <?php if($user_flag == 0): ?>
                        <div>
                            <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="/bucket_lists/users/unfollow/<?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローを外す
                            </a>
                        </div>
                    <?php elseif($user_flag == 1): ?>
                    <?php  ?>
                        <div>
                            <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                            <span><?php echo $follower['nick_name']; ?></span>
                            <a href="/bucket_lists/users/follow/<?php echo $follower['user_id']; ?>" class="btn btn-pink" style="float: right;">
                                フォロー
                            </a>
                        </div>
                    <?php else: ?>
                        <div>
                            <img class="img-circle" src="image/plofile_fb_n.jpg" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="/bucket_lists/users/unfollow/<?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローを外す
                            </a>
                        </div>
                    <?php endif ; ?>
                    </div>
                <?php endforeach; ?>

            </section>
          </div>
        </div>