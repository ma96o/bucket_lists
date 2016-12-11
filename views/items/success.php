        <div class="container-fluid">
          <div class="row">

            <section class="col-sm-10 col-xs-offset-1 main-content">
                
                <!--項目一覧-->
                 <ul class="list-unstyled">
        <?php $i = 1; foreach($this->viewsOptions as $item): ?>
                    <a data-toggle="modal" href="" data-target="#item_success" data-name="item_id" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>">
                    <li>
        <?php echo $i++; ?>
                        <dl>
                            <dt class="success"><?php echo $item['item_name']; ?></dt>
<?php if($user_flag == 0): ?>
                            <dd><a data-toggle="modal" href="" data-target="#edit_success" data-title="<?php echo $item['item_name']; ?>" data-comment="<?php echo $item['comment']; ?>" data-id="<?php echo $item['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></dd>
<?php endif; ?>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $item['deadline']; ?></p>
                        </dl>
                    </li>
                    </a>
        <?php endforeach; ?>
                </ul>
            </section>
          </div>
        </div>


    <!--modal item_success-->
          <?php include('views/items/show_success.php'); ?>

    <!--modal edit_success-->
          <?php include('views/items/edit_success.php'); ?>
