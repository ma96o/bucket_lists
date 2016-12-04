<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>wkwkdo jQueryRaty</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/jquery.raty.js"></script>
</head>
<body>
  <form method="post" action="result.php">
  <div class="starRating">わくわくど</div>
  <input type="submit" name="送信">
  </form>
  <script type="text/javascript">
    $.fn.raty.defaults.path = "lib/images";
    $('.starRating').raty({
      // hints: [0,1,2,3,4,5]
      // click: function($score, $evt) {
      //          $.post('result.php',{score:$score, url:$evt.currentTarget.baseURI},
      //                 function(data){
      //                   location.href = 'result.php';
      //                 }
      //                );
      // }
    });
  </script>
</body>
</html>