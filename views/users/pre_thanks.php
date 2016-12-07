<div class="msg" style="margin-left: 20px;">
    <h1>メール確認画面</h1>
    <?php if (count($this->viewErrors['email']) === 0) : ?>
      <p>メールを送信しました。24時間以内にメールに記載されたURLからご登録ください。</p>
      <h4>※仮登録の状態で24時間が経過した場合は、再度最初から登録の方を行っていただく必要があります。</h4>
      <input type="button" value="戻る" onClick="history.back()">
    <?php endif ; ?>
</div>
<br><br>