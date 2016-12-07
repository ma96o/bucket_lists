<br><br><br><br>
<div class="msg">
   <h1>会員登録画面</h1>
    <?php if (count($this->viewErrors) === 0): ?>
      <form method="post" action="/bucket_lists/users/signup" class="form-horizontal" role="form">
        <p>メールアドレス：<?php echo $this->viewOptions['email']; ?></p>
        <p>アカウント名：
        <input type="text" class="form-control" name="nick_name" value="<?php echo $this->viewOptions['nick_name']; ?>">
        <?php if(isset($this->viewErrors['nick_name']) && $this->viewErrors['nick_name'] == 'blank'): ?>
          <p style="color:red;">* 名前を入力してください</p>
        <?php endif; ?>
        </p>
        <p>パスワード:
         <input type="password" class="form-control" name="password" value="<?php echo $this->viewOptions['password']; ?>">
        <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'blank'): ?>
          <p style="color:red;">* パスワードを入力してください</p>
        <?php endif; ?>
        <?php if(isset($this->viewErrors['password']) && $this->viewErrors['password'] == 'length'): ?>
          <p style="color:red;">* パスワードは４文字以上で入力してください</p>
        <?php endif; ?>
        </p>
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="submit" value="確認する">
      </form>
    <?php endif; ?>
  </form>
</div>
<br><br>