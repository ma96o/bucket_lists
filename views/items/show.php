
<a href="/bucket_lists/items/like/1">いいねする</a>
<a href="/bucket_lists/items/unlike/1">いいねを外す</a>

<?php foreach($this->viewOptions as $viewOption): ?>
<?php if(!$viewOption['is_like']): ?>
<?php if($user['id'] == $viewOption['item_id']): ?>

        [<a href="/bucket_lists/items/like/1">いいねする<i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>]

<?php else: ?>
<!-- とりあえずlikeができてからunlikeの修正する -->
        [<a href="unlike/<?php echo $viewOption['id']; ?>">いいねを外す<i class="fa fa-thumbs-up" aria-hidden="true"></i></a>]

<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>