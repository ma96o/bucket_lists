    <div class="container">
        <section class="content-main">
            <div class="center-block">
                <div class="col-md-10 col-xs-offset-1">
                    <!--search box-->
                    <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search_word">
                      <span class="input-group-btn">
                        <button class="btn btn-pink" type="submit">
                          <i class='glyphicon glyphicon-search'></i>
                        </button>
                      </span>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

<br>
<div class="container">
    <div class="center-block">
    <div class="col-md-8 col-xs-offset-2">
          <ul class="nav nav-pills nav-justified">
          <?php if(!empty($option) && $option == 'hot'): ?>
              <li><a href="/bucket_lists/items/trend">NEW</a></li>
              <li class="active"><a href="/bucket_lists/items/trend/hot">HOT</a></li>
          <?php else: ?>
              <li class="active"><a href="/bucket_lists/items/trend">NEW</a></li>
              <li><a href="/bucket_lists/items/trend/hot">HOT</a></li>
          <?php endif; ?>
          </ul>
    </div>
    </div>
</div>
 <br />
    <div class="container">
      <div class="row">
        <section id="pinBoot">

          <!--content-->  
<?php foreach($this->viewsOptions as $item): ?>
        　<article class="white-panel">
            <a href="" data-toggle="modal" data-target="#item_detail" data-title="<?php echo $item['item_name']; ?>" data-comment="<?php echo $item['comment']; ?>" data-done="<?php echo countDone($item['item_id']); ?>" data-doing="<?php echo countDoing($item['item_id']); ?>" data-id="<?php echo $item['item_id']; ?>">
                <h4 class="item_name"><?php echo $item['item_name']; ?></h4>
                <span class="doing">doing <?php echo countDoing($item['item_id']); ?></span>
                <span class="done">done <?php echo countDone($item['item_id']); ?></span>
            </a>
            <p>
            <button type="button" class="btn btn-pink btn-circle center-block" data-toggle="modal" data-target="#add_new" data-id="<?php echo $item['item_id']; ?>" data-title="<?php echo $item['item_name']; ?>" data-comment="<?php echo $item['comment']; ?>">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            </p>
            
        　</article>
<?php endforeach; ?>

        </section>
        </div>
    </div>

    <?php include('views/items/add.php'); ?>

    <?php include('views/items/show_trend.php'); ?>
