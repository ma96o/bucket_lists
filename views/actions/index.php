  <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-10 col-xs-offset-1 main-content">
  
                <div class="timeline_list">
                    <h4><i class="fa fa-tags" aria-hidden="true"></i>  timeline</h4>

                    <?php foreach($this->viewOptions as $action): $user = aboutUser($action['user_id']); $item = aboutItem($action['item_id']); ?>
                      <?php if($action['user_id'] == $_SESSION['user_id']): ?>

                            <div class="timeline">
                                  <img class="img-circle" src="/bucket_lists/views/pf_image/<?php echo $user['picture_path']; ?>" width="50" height="50">
                                  <p class="name"><a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>">Your action</a></p>
                                  <p class="date"><?php echo $action['created']; ?></p>
                          <?php if($action['status_id'] == 1): ?>
                                  <span class="detail_doing"><q><?php echo $item['item_name']; ?></q>を<a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>">バケットリスト</a>に追加しました。
                                </span>
                          <?php elseif($action['status_id'] == 2): ?>
                                  <span class="detail_done"><q><?php echo $item['item_name']; ?></q>を<a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a>に追加しました。
                                </span>
                          <?php elseif($action['status_id'] == 3): ?>
                                  <span class="detail_trash"><q><?php echo $item['item_name']; ?></q>を<a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a>に追加しました。
                                </span>
                          <?php endif; ?>
                            </div>

                      <?php else: ?>

                        <div class="timeline bg_w">
                              <img class="img-circle" src="/bucket_lists/views/pf_image/<?php echo $user['picture_path']; ?>" width="50" height="50">
                              <p class="name"><a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a></p>
                              <p class="date"><?php echo $action['created']; ?></p>
                      <?php if($action['status_id'] == 1): ?>
                              <span class="detail_doing"><a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<q><?php echo $item['item_name']; ?></q>を<a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>">バケットリスト</a>に追加しました。
                                </span>
                      <?php elseif($action['status_id'] == 2): ?>
                              <span class="detail_done"><a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが「<?php echo $item['item_name']; ?>」を<a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a>に追加しました。
                                </span>
                      <?php elseif($action['status_id'] == 3): ?>
                              <span class="detail_trash"><a href="/bucket_lists/users/mypage/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが「<?php echo $item['item_name']; ?>」を<a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a>に追加しました。
                                </span>
                      <?php endif; ?>
                        </div>

                      <?php endif; ?>
                    <?php endforeach; ?>

            </section>
          </div>
        </div>
    </div>
</div>
