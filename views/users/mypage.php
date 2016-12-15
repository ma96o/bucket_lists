
<div class="container-fluid">
  <div class="row" style="background-color:#fafafa;">
    <!--sidebar　左ページ　リスト一覧-->
    <section class="col-sm-4 sidebar">
      <ul class="list-unstyled">

      <?php $lists = getList($option); foreach($lists as $list): ?>
        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $option; ?>/<?php echo $list['list_id']; ?>">
            <li<?php if($list_id == $list['list_id']){echo ' class="active"';} ?>><?php echo $list['list_name'] ?>
            <?php if($user_flag == 0): ?>
            <p><a id="button" data-toggle="modal" href="" data-target="#edit_list" data-title="<?php echo $list['list_name']; ?>" data-id="<?php echo $list['list_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
            <?php endif; ?>
            </li>
        </a>
      <?php endforeach; ?>
      </ul>
      <?php if($user_flag == 0): ?>
      <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_list">リストを追加</button>
      <?php endif; ?>

      
    </section>

    <!--main 右ページ　項目一覧-->
    <section class="col-sm-8 main-content">
        <!--項目追加-->
      <?php if($user_flag == 0): ?>
      <!--form method="post" action="">
         <div class="input-group">
            <input type="text" class="form-control" placeholder="+項目を追加する">
                <span class="input-group-btn">
                    <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_new" data-name="item_id">add</button>
                </span>
         </div>
      </form-->
      <br />
      <button class="btn btn-pink btn-block" type="button" data-toggle="modal" data-target="#add_new">+項目を追加する</button>
      <br />

      <?php endif; ?>
        <!--項目一覧-->
         <ul class="list-unstyled">
               <?php $i = 1; foreach($this->viewOptions as $item): ?>
              <a data-toggle="modal" href="" data-target="#show_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>" <?php if($item['status'] == 1){echo 'data-status="doing"';}else{echo 'data-status="done"';} ?> data-priority="<?php echo $item['priority']; ?>">
                  <li>
                      <dl>
                          <dt<?php if($item['status'] == 2){echo ' class="success"';}elseif($item['status'] == 3){echo ' class="trash"';} ?>><span><?php echo $i++; ?></span><?php echo $item['item_name']; ?></dt>
                      <?php if($user_flag == 0 && $item['status'] == 1): ?>
                          <dd><a data-toggle="modal" href="" data-target="#edit_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>" data-priority="<?php echo $item['priority']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                          <dd><a data-toggle="modal" href="" data-target="#trash_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                          <dd><a data-toggle="modal" href="" data-target="#success_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                      <?php endif; ?>
                      </dl>
                      <div class="status-icon">
                          <p class="calendar"><?php echo $item['deadline']; ?></p>

          <?php if(isLike($item['id']) == 0): ?>
                <p><a href="<?php echo makePath('items/like/'); ?><?php echo $item['id'] ?>"><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;<?php echo countLike($item['id']); ?></a></p>

          <?php else: ?>
                <p><a href="<?php echo makePath('items/unlike/'); ?><?php echo $item['id'] ?>"><i class="fa fa-smile-o" aria-hidden="true" style="color:#00bcd4;"></i></i>&nbsp;<?php echo countLike($item['id']); ?></a></p>

          <?php endif; ?>

                <p><img src="<?php echo makePath('views/image/'); ?><?php echo $item['priority']; ?>.png"></p>
                </div>
            </li>
        </a>
        <?php endforeach; ?>
        </ul>

    </section>
  </div>
</div>


<!--modal add_new-->
  <?php include('views/items/add.php'); ?>

<!--modal add_list-->

  <?php include('views/lists/add.php'); ?>

<!--modal edit_list-->

  <?php include('views/lists/edit.php'); ?>


<!--modal success_item-->

  <?php include('views/items/conglaturation.php'); ?>

<!--modal giveup_item-->

  <?php include('views/items/giveup.php'); ?>

 <!--modal edit_item-->

  <?php include('views/items/edit.php'); ?>

 <!--modal show_item-->

  <?php include('views/items/show.php'); ?>
