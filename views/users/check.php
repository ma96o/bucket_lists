    <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-xs-8 col-xs-offset-2 main-content">

                  <div class="item">
                    <h4><i class="fa fa-check" aria-hidden="true"></i>&nbsp;登録内容確認</h4>
                    <br />
                    <form method="post" action="<?php echo makePath('users/create'); ?>" class="form-horizontal" role="form">
                    <div class="form-group">
                    <label for="nick_name" class="col-md-3 control-label">名前</label>
                      <div class="col-md-9">
                        <p><?php echo $this->viewOptions['nick_name']; ?></p>
                        <input type="hidden" class="form-control" name="nick_name" value="<?php echo $this->viewOptions['nick_name']; ?>">
                      </div>
                    </div>
                    <br />
                    <div class="form-group">
                    <label for="email" class="col-md-3 control-label">メールアドレス</label>
                      <div class="col-md-9">
                        <p><?php echo $this->viewOptions['email']; ?></p>
                        <input type="hidden" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
                      </div>
                    </div>
                    <br />
                    <div class="form-group">
                      <label for="password" class="col-md-3 control-label">パスワード</label>
                      <div class="col-md-9">
                        <p>●●●●●●●●</p>
                        <input type="hidden" class="form-control" name="password" value="<?php echo $this->viewOptions['password']; ?>">
                      </div>
                    </div>
                    <br />
                    <br />

                     <div class="form-group pull-right">
                     <p>
                        <a href="<?php echo makePath('users/signup'); ?>" class="btn btn-default">戻る</a>&nbsp;&nbsp;
                        <input type="submit" class="btn btn-pink" value="ユーザー登録">
                      </p>
                    </div>
                    </form>
                    <br />
                    <br />

                  </div>
            </section>
          </div>
          </div>
        </div>
    </div>