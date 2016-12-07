<?php echo '<br> . <br> . <br>'; ?>


 <?php if(!$this->viewOptions['is_like']): ?>

        [<a href="/bucket_lists/items/like/1">Like <i class="fa fa-thumbs-o-up" aria-hidden="true"></i><?php echo countLike(1); ?></a>]

<?php else: ?>

        [<a href="/bucket_lists/items/unlike/1">Unlike <i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo countLike(1); ?></a>]

<?php endif; ?>