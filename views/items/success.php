        <div class="container-fluid">
          <div class="row">

            <section class="col-sm-10 col-xs-offset-1 main-content">
                
                <!--項目一覧-->
        <?php $i = 1; foreach($this->viewsOptions as $item): ?>
                 <ul class="list-unstyled">
                    <a data-toggle="modal" href="" data-target="#item_success" data-name="item_id" data-title="<?php echo $item['item_name']; ?>" data-id="<?php echo $item['id']; ?>" data-comment="<?php echo $item['comment']; ?>" data-deadline="<?php echo $item['deadline']; ?>">
                    <li>
        <?php echo $i++; ?>
                        <dl>
                            <dt class="success"><?php echo $item['item_name']; ?></dt>
                            <dd><?php echo $item['deadline']; ?></dd>
                        </dl>
                    </li>
                    </a>
                </ul>
        <?php endforeach; ?>
            </section>
          </div>
        </div>

    <!--modal edit_prof-->

    <?php include('views/items/show_success.php'); ?>