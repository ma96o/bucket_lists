<form method="post" action="/bucket_lists/items/create/1" class="form-horizontal" role="form">
      <label for="name" class="col-md-3 control-label">タイトル</label>
        <input type="text" class="form-control" name="title"></input>
      <label for="name" class="col-md-3 control-label">本文</label>
        <textarea name="body" class="form-control" cols="30" rows="5"></textarea>
      <p>
        <a href="/bucket_lists/items/index" class="btn btn-default">戻る</a>&nbsp;&nbsp;
        <!-- <a href="/bucket_lists/items/create" class="btn btn-success">投稿する</a> -->
        <input type="submit" class="btn btn-success" value="投稿する">
      </p>
  </form>