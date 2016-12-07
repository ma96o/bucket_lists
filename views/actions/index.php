  <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-10 col-xs-offset-1 main-content">
  
                <div class="timeline_list">
                    <h4><i class="fa fa-tags" aria-hidden="true"></i>  timeline</h4>

                    <?php foreach($this->viewsOptions as $action): $user = aboutUser($action['user_id']); $item = aboutItem($action['item_id']); ?>
                      <?php if($action['user_id'] == 1): ?>

                            <div class="timeline">
                                  <img class="img-circle" src="/bucket_lists/views/image/<?php echo $user['picture_path']; ?>" width="50" height="50">
                                  <p>自分！！！！</p>
                                  <span class="date"><?php echo $action['created']; ?></span>
                          <?php if($action['status_id'] == 1): ?>
                                  <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>">バケットリスト</a>に追加しました。
                                </span>
                          <?php elseif($action['status_id'] == 2): ?>
                                  <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a>に追加しました。
                                </span>
                          <?php elseif($action['status_id'] == 3): ?>
                                  <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a>に追加しました。
                                </span>
                          <?php endif; ?>
                            </div>

                      <?php else: ?>

                        <div class="timeline">
                              <img class="img-circle" src="/bucket_lists/views/image/<?php echo $user['picture_path']; ?>" width="50" height="50">
                              <p><?php echo $user['nick_name']; ?></p>
                              <span class="date"><?php echo $action['created']; ?></span>
                      <?php if($action['status_id'] == 1): ?>
                              <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>">バケットリスト</a>に追加しました。
                            </span>
                      <?php elseif($action['status_id'] == 2): ?>
                              <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/success/<?php echo $user['user_id']; ?>">達成リスト</a>に追加しました。
                            </span>
                      <?php elseif($action['status_id'] == 3): ?>
                              <span class="detail"><a href="/bucket_lists/items/index/<?php echo $user['user_id']; ?>"><?php echo $user['nick_name']; ?></a>ちゃんが<a href="items_show.html"><?php echo $item['item_name']; ?></a>を<a href="/bucket_lists/items/trash/<?php echo $user['user_id']; ?>">ゴミ箱リスト</a>に追加しました。
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
