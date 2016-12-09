<!-- <form method="post" action="/bucket_lists/items/create" class="form-horizontal" role="form">
      <label for="name" class="col-md-3 control-label">item_id</label>
        <textarea name="item_id" class="form-control" cols="30" rows="1"></textarea>


      <label for="name" class="col-md-3 control-label">item_name</label>
        <textarea name="item_name" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">deadline</label>
        <textarea name="deadline" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">comment</label>
        <textarea name="comment" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">status</label>
        <textarea name="status" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">priority</label>
        <textarea name="priority" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">list_id</label>
        <textarea name="list_id" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">user_id</label>
        <textarea name="user_id" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">tag_id</label>
        <textarea name="tag_id" class="form-control" cols="30" rows="1"></textarea>
      <p>
        <a href="/bucket_lists/items/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
        <input type="submit" class="btn btn-success" value="投稿する">
      </p>
  </form> -->



<form method="post" action="/bucket_lists/items/create" class="form-horizontal" role="form">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>item_name</h4>
    </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 ">
            <div class="form-group">
            <label for="exampleInput3">項目詳細</label>
            <input name="comment" type="text" class="form-control" id="exampleInput2" placeholder="詳細を入力してください">
          </div>



          <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">hogehoge</a></li>
            <li><a href="#">hogehoge</a></li>
            <li><a href="#">hogehoge</a></li>
            <li role="separator" class="divider"></li>
          </ul> -->



          <div class="dropdown">
            <label>リスト選択</label>
              <select name="list_id" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">list
              <span class="caret"></span>
                <option value="1">リスト1</option>
                <option value="2">リスト2</option>
                <option value="3">リスト3</option>
                <option value="4">リスト4</option>
                <option value="5">リスト5</option>
              </select>
          </div>
          <br>
          <div class="form-group">
            <label for="exampleInput1">期限</label>
            <input name="deadline" type="date" class="form-control" id="exampleInput1" placeholder="数値を入力してください">
          </div>




            <label for="name" class="col-md-3 control-label">item_id</label>
        <textarea name="item_id" class="form-control" cols="30" rows="1"></textarea>


      <label for="name" class="col-md-3 control-label">item_name</label>
        <textarea name="item_name" class="form-control" cols="30" rows="1"></textarea>


        <!-- <label for="name" class="col-md-3 control-label">deadline</label>
        <textarea name="deadline" class="form-control" cols="30" rows="1"></textarea> -->


        <!-- <label for="name" class="col-md-3 control-label">comment</label>
        <textarea name="comment" class="form-control" cols="30" rows="1"></textarea> -->


        <!-- <label for="name" class="col-md-3 control-label">status</label>
        <textarea name="status" class="form-control" cols="30" rows="1"></textarea> -->

        <!-- <label for="name" class="col-md-3 control-label">priority</label>
        <textarea name="priority" class="form-control" cols="30" rows="1"></textarea> -->

        <!-- <label for="name" class="col-md-3 control-label">list_id</label>
        <textarea name="list_id" class="form-control" cols="30" rows="1"></textarea> -->


        <label for="name" class="col-md-3 control-label">user_id</label>
        <textarea name="user_id" class="form-control" cols="30" rows="1"></textarea>


        <label for="name" class="col-md-3 control-label">tag_id</label>
        <textarea name="tag_id" class="form-control" cols="30" rows="1"></textarea>

            <label>わくわく度</label>
            <div class="starRating" class="form-control" id="exampleInput2">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <p>
        <input type="submit" class="btn btn-success" value="add">
      </p>
    </div>
  </div>
</div>

<script src="/bucket_lists/webroot/assets/js/jquery.raty.js"></script>


<script>
    /*ワクワク度表示*/
    $.fn.raty.defaults.path = "image";
    $('.starRating').raty({
      hints: [0,1,2,3,4,5]
      click: function($score, $evt) {
               $.post('/bucket_lists/items/create',{score:$score, url:$evt.currentTarget.baseURI},
                      function(data){
                        location.href = '/bucket_lists/items/create';
                      }
                     );
      }
    });
</script>
</form>