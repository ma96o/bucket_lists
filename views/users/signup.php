    <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-xs-8 col-xs-offset-2 main-content">

                  <div class="item">
                    <h4><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;アカウント登録</h4>
                    <br />
                    <p>ここから本登録だよ。情報を入力してねん</p>
                    <br />
                    <form method="post" action="/bucket_lists/users/signup?url_token=$_GET['url_token']" class="form-horizontal" role="form">
                            <div class="form-group">
                            <label>E-mail</label>
                            <p>メールアドレス：<?php echo $this->viewOptions['email']; ?></p>
                            <input type="hidden" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
                            <br />
                            <p>アカウント名：
                            <input type="text" class="form-control" name="nick_name" value="<?php //echo $this->viewOptions['nick_name']; ?>">
                            <?php if(isset($this->viewErrors['nick_name']) && $this->viewErrors['nick_name'] == 'blank'): ?>
                            <p style="color:red;">* アカウント名を入力してください</p>
                            <?php endif; ?>
                            </p>
                            <p>パスワード:
                             <input type="password" class="form-control" name="password" value="<?php //echo $this->viewOptions['password']; ?>">
                            <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'blank'): ?>
                              <p style="color:red;">* パスワードを入力してください</p>
                            <?php endif; ?>
                            <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'length'): ?>
                              <p style="color:red;">* パスワードは４文字以上で入力してください</p>
                            <?php endif; ?>
                            </p>
                        </div>

                    <br />
                    <br />

                      <button class="btn btn-pink" type="submit" style="float: right;">確認画面</button>
                    </form>
                    <br />
                    <br />


                  </div>
            </section>
          </div>
          </div>
        </div>
    </div>