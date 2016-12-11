
    <div class="container">
        <section class="content-main info">
            <form method="post" action="/bucket_lists/users/update" role="form">
            <div class="row">
            <?php $user = aboutUser($_SESSION['id']); ?>

                <div class="col-md-10 col-xs-offset-1">
                    <img class="center-block img-responsive img-circle" src="/bucket_lists/views/image/<?php echo $user['picture_path']; ?>" alt="" width="150" height="150">
                </div>
                <br />
                <br>
                <div class="col-xs-4 col-xs-offset-4">
                    <input type="file" name="picture_path" class="form-control">
                        <!--div class="preview" /-->    
                    <h3><input type="text" class="form-control" name="nick_name" value="<?php echo $user['nick_name']; ?>">
                    </h3>
                </div>
                <div class="col-xs-8 col-xs-offset-2">
                    <p>
                       <input type="text" class="form-control" name="description" value="<?php echo $user['description']; ?>">
                    </p>
                </div>
                </div>
                <br />
                <div class="col-xs-8 col-xs-offset-2">
                <button class="btn btn-pink" type="submit" style="float:right;">更新する</button>
                </div>
                <br />
                <br />
                </form>
            
        </section>
    </div>

