<?php 

require('dbconnect.php');

$sql = sprintf('SELECT * FROM `followings`
                WHERE `follower_id` = %d',
                mysqli_real_escape_string($db,$_SESSION['id'])
                );
$rec = mysqli_query($db,$sql) or die(mysqli_error($db));
$follows = array();
 while($table = mysqli_fetch_assoc($rec)){
     $follows[] = $table['following_id'];
 }

$sql = 'SELECT u.* 
        FROM u.`users`
        WHERE u.`user_id`=f.`following_id`'
                
                
                ;
$users = mysqli_query($db,$sql) or die(mysqli_error($db));

while($user = mysqli_fetch_assoc($users)){

    if(in_array($user['']))
}

 ?>

 <a href="http://192.168.33.10/bucket_lists/users/follow/3">フォローするぞ</a>
<a href="http://192.168.33.10/bucket_lists/users/unfollow/3">フォローを外すぞ</a>
