

        <div class="container-fluid">
          <div class="row" style="background-color:#fafafa;">
            <!--sidebar　左ページ　リスト一覧-->
            <section class="col-sm-4 sidebar">
              <ul class="list-unstyled">

              <?php $lists = getList($_SESSION['id']); foreach($lists as $list): ?>
                <a href="<?php echo $list['id']; ?>">
                    <li class="active"><?php echo $list['list_name'] ?>
                    <p><a id="button" data-toggle="modal" href="" data-target="#edit_list" data-title="<?php echo $list['list_name']; ?>" data-id="<?php echo $list['list_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                    </li>
                </a>
              <?php endforeach; ?>
                
              </ul>
              <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_list">リストを追加</button>

              
            </section>

            <!--main 右ページ　項目一覧-->
            <section class="col-sm-8 main-content">
                <!--項目追加-->
                 <div class="input-group">
                    <form class="form-inline">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="+項目を追加する">
                        <span class="input-group-btn">
                            <button class="btn btn-pink" type="button" data-toggle="modal" data-target="#add_new" data-name="item_id">add</button>
                        </span>
                    </div>
                    </form>
                </div>
                <!--項目一覧-->
                 <ul class="list-unstyled">
                 <?php foreach($this->viewsOptions as $item): ?>
                <a data-toggle="modal" href="" data-target="#show_item" data-name="item_id" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>">
                    <li>
                        <dl>
                            <dt><?php echo $item['item_name']; ?></dt>
                            <dd><a data-toggle="modal" href="" data-target="#edit_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#trash_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></dd>
                            <dd><a data-toggle="modal" href="" data-target="#success_item" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></dd>
                        </dl>
                        <div class="status-icon">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo $item['deadline']; ?></p>
                            <p><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;<?php echo countLike($item['id']); ?></p>
                            <p><img src="/bucket_lists/views/image/0.png"></p>
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

        <div class="modal fade" id="add_list" tabindex="-1" role="dialog">
          <?php include('views/lists/add.php'); ?>
        </div>

        <!--modal edit_list-->

        <div class="modal fade" id="edit_list" tabindex="-1" role="dialog">
          <?php include('views/lists/edit.php'); ?>
        </div>
        
        <!--modal edit_prof-->

        <div class="modal fade" id="edit_info" tabindex="-1" role="dialog">
          <?php include('views/users/edit.php'); ?>
        </div>

        <!--modal success_item-->

         <div class="modal fade" id="success_item" tabindex="-1" role="dialog">
          <?php include('views/items/conglaturation.php'); ?>
        </div>

        <!--modal trash_item-->

         <div class="modal fade" id="trash_item" tabindex="-1" role="dialog">
          <?php include('views/items/giveup.php'); ?>
        </div> 

         <!--modal edit_item-->

         <div class="modal fade" id="edit_item" tabindex="-1" role="dialog">
          <?php include('views/items/edit.php'); ?>
        </div> 

          <?php include('views/items/show.php'); ?>
