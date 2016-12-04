    <div class="container-fluid content-main">
      <div class="row">
        <div class="col-md-4">
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 content-margin-top">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                 <table class="table table-list-search">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>項目</th>
                                    <th>捨てた日</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach($this->viewsOptions as $item): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><strong><?php echo $item['item_name']; ?></strong></td>
                                    <td><?php echo $item['created']; ?></td>
                                    <td>
                                        <i class="fa fa-flag" aria-hidden="true">&nbsp;1</i>
                                        &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star-empty"></i><i class="glyphicon glyphicon-star-empty"></i><i class="glyphicon glyphicon-star-empty"></i>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                 </table>
                </div>
            </div>
        </div>


      <div class="row">
        <div class="col-md-4">
        </div>
      </div>
    </div></div></div>