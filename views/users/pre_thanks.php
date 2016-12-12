    <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-xs-8 col-xs-offset-2 main-content">

                  <?php if (count($this->viewErrors['email']) === 0) : ?>
                  <div class="item">
                    <h4><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;メールを送信しました。24時間以内にメールに記載されたURLからご登録ください。</h4>
                    <br />
                    <p>リンクのURLに遷移して本登録を完了してください。<br />※仮登録の状態で24時間が経過した場合は、再度最初から登録の方を行っていただく必要があります。</p>
                    <input type="button" value="戻る" onClick="history.back()">
                  <?php endif ; ?>

                    <br />
                    <br />

                  </div>
            </section>
          </div>
          </div>
        </div>
    </div>