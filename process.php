<?php
$data=$_POST['frm'];


$dir='uploader/';
$file='image';
mkdir($dir.$data['name']);
$picname=$_FILES[$file]['name'];
$array=explode(".",$picname);
$ext=end($array);
$new_name=rand().".".$ext;
$from=$_FILES[$file]['tmp_name'];
$to=$dir.$data['name']."/".$new_name;
move_uploaded_file($from,$to);
//var_dump($_FILES);


if(isset($_POST['btn'])){
    $user_name=$_POST['frm'];
    $conn= new mysqli('localhost','root','','php_test');
    if ($conn->connect_error){
        echo "Connection failed: " . $conn->connect_error;
        exit;
    }
    $sql="INSERT INTO user_tbl (`name`,lastname,age,field,comment,picture)
              VALUES ('$data[name]','$data[lastname]','$data[age]','$data[field]','$data[comment]','$to')";
    $result = $conn->query($sql);

    if (!$result){
        echo "Query: " . $sql . "failed due to " . mysqli_error($conn);
        exit;
    }
    header("location:users_list.php");
}
