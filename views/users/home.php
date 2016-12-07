<div class="msg" style="margin-top: 100px;">
  <form method="post" action="/bucket_lists/users/pre_create" class="form-horizontal" role="form">
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">メールアドレス</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="email" value="<?php //echo $this->viewOptions['email']; ?>">
        <?php if(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'blank'): ?>
          <p style="color:red;">* メールアドレスを入力してください</p>
        <?php elseif(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'false'): ?>
          <p style="color:red;">* 正しい形式で入力してください</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="form-group pull-right">
      <p style="margin-right: 50px;">
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="submit" class="btn btn-success"  value="登録する">
      </p>
    </div>
  </form>
</div>
<br><br>