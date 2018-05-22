<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','php_test');
$sql="SELECT * FROM user_tbl WHERE user_id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if(isset($_POST['btn'])){
    $data=$_POST['frm'];

    if($_FILES['image']['name']){
        $dir='uploader/';
        $file='image';
        if($data['name']!=$row['name']){
            mkdir($dir.$data['name']);
        }
        $picname=$_FILES[$file]['name'];
        $array=explode(".",$picname);
        $ext=end($array);
        $new_name=rand().".".$ext;
        $from=$_FILES[$file]['tmp_name'];
        if($data['name'] != $row['name']) {
            $to = $dir.$data['name']."/".$new_name;
        }
        else{
            $to = $dir.$row['name']."/".$new_name;
        }
        move_uploaded_file($from,$to);
    }
    else{
        $to=$row['picture'];
    }

    $sql1="UPDATE user_tbl SET name='$data[name]',lastname='$data[lastname]',age='$data[age]',field='$data[field]',comment='$data[comment]',picture='$to' WHERE user_id=$id ";
    mysqli_query($conn,$sql1);
    header("location:users_list.php?id=$id");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="js/bootstrap.min.js" media="screen">
    <title>Upload</title>
</head>
<body>
<div class="container col-3">
    <form method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name="frm[name]" value="<?= $row['name'] ?>" style="height: 30px">
                </td>
            </tr>
            <tr>
                <td>Lastename:</td>
                <td>
                    <input type="text" name="frm[lastname]" value="<?= $row['lastname'] ?>">
                </td>
            </tr>
            <tr>
                <td>Age:</td>
                <td>
                    <input type="number" name="frm[age]"value="<?= $row['age'] ?>">
                </td>
            </tr>
            <tr>
                <td>Field:</td>
                <td>
                    <select name="frm[field]" >
                        <option value="group1" <?php if($row['field']== 'group1'){echo "selected";} ?> >Group1</option>
                        <option value="group2" <?php if($row['field']== 'group2'){echo "selected";} ?> >Group2</option>
                        <option value="group3" <?php if($row['field']== 'group3'){echo "selected";} ?> >Group3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Picture:</td>
                <td>
                    <input type="file" name="image" />
                    <img src="<?=$row['picture'] ?>">
                </td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td>
                    <textarea name="frm[comment]"><?= $row['comment']?></textarea>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <input type="submit" value="Save Changes" name="btn" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
