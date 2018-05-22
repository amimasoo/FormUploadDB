<?php

$id=$_GET['id'];
$conn= new mysqli('localhost','root','','php_test');

//delete file & folder
$sql1="SELECT * FROM user_tbl WHERE user_id='$id'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$folder="uploader/".$row['name'];
$file=$row['picture'];

unlink($file);
rmdir($folder);

//delete from DB
$sql="DELETE FROM user_tbl WHERE user_id='$id'";
mysqli_query($conn,$sql);
header("location:users_list.php?delete=ok");
