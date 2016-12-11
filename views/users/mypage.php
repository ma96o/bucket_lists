<?php 

require('dbconnect.php');

$sql = sprintf('SELECT * FROM `followings`
                WHERE `follower_id` = %d',
                mysqli_real_escape_string($db,$_SESSION['id'])
                );
$rec = mysqli_query($db,$sql) or die(mysqli_error($db));
$follows = array();
 while($table = mysqli_fetch_assoc($rec)){
     $follower[] = $table['follower_id'];
     $following[] = $table['following_id'];
 }

$sql = sprintf('SELECT * 
                FROM `users`
                WHERE `user_id` = %d',
        mysqli_real_escape_string($db,$option)
        );

$users = mysqli_query($db,$sql) or die(mysqli_error($db));

while($user = mysqli_fetch_assoc($users)){

    if($follower[`follower_id`] == 1 && $following[`following_id`] == 3){
        echo '<a href="http://192.168.33.10/bucket_lists/users/follow/3">フォローする</a>';
    }else{
        echo '<a href="http://192.168.33.10/bucket_lists/users/unfollow/3">フォローを外す</a>';
    }
}

 ?>

 <a href="http://192.168.33.10/bucket_lists/users/follow/3">フォローするぞ</a>
<a href="http://192.168.33.10/bucket_lists/users/unfollow/3">フォローを外すぞ</a>
