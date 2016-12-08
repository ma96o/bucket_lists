<form method="post" action="/bucket_lists/items/create" class="form-horizontal" role="form">
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
        <!-- <a href="/bucket_lists/items/create" class="btn btn-success">投稿する</a> -->
        <input type="submit" class="btn btn-success" value="投稿する">
      </p>
  </form>