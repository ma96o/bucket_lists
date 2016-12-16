
<div class="bg">
    <div class="container">
        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
                <div class="col-md-8 site_info">
                    <h1>BUCKET LIST</h1>
                    <p>死ぬまでにしたい100のことを共有して、同じ思いを持つひとと繋がろう。</p>
                </div>
                <div class="col-md-4">
                    <br />
                    <!--新規登録-->
                    <div class="side_content">
                    <h4><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;アカウント登録</h4>
                        <form method="post" action="<?php echo makePath('users/home'); ?>" class="form-inline">
                            <div class="form-group">
                                <p>メールアドレスを入力して下さい</p>
                                <input type="email" name="email" class="form-control" placeholder="hogehoge@egmail.com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'blank'): ?>
                                <?php elseif(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'false'): ?>
                                  <p class="blue">正しい形式で入力してください</p>
                                <?php elseif(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'duplicate'): ?>
                                  <p style="color:red;">* メールアドレスが既に登録されています。</p>
                                <?php endif; ?>
                                  <input type="hidden" name="token" value="<?=$token?>">
                                  <input type="submit" class="btn btn-pink" style="float: right;"  value="登録">
                            </div>
                        </form>
                    </div>
                    <br />
                    <!--ログイン-->
                    <div class="side_content">
                    <h4><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;ログイン</h4>
                    <form method="post" action="<?php echo makePath('users/home'); ?>" role="form">
                        <div class="form-group">
                        <?php if(!empty($this->viewErrors) && $this->viewErrors == 'false'): ?>
                              <p class="blue">メールアドレスとパスワードを正確に入力してください。</p>
                            <input type="email" name="email" class="form-control pd" placeholder="hogehoge@egmail.com" value="<?php echo $this->viewOptions['email']; ?>">
                        <?php else: ?>
                            <input type="email" name="email" class="form-control pd" placeholder="hogehoge@egmail.com">
                        <?php endif; ?>
                            <input type="password" name="password" class="form-control pd" placeholder="password">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-pink" type="submit" style="float: right;">ログイン</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            
          </div>
        </div>
    </div> 
</div> 
