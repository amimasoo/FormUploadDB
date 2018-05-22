<?php
$conn= new mysqli('localhost','root','','php_test');
$sql="SELECT * FROM user_tbl";
$res=mysqli_query($conn,$sql);

    //var_dump($row);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="js/bootstrap.min.js" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>user-list</title>
</head>
<body>
    <div class="container">
        <table class="table table-responsive-xl table-bordered text-center" style="box-shadow: 5px 10px 35px #3e3e3e">
            <thead class="table-dark">
            <tr>
                <th scope="row">Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Field</th>
                <th>Comment</th>
                <th>Picture</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                while ($row=mysqli_fetch_assoc($res)){
            ?>
            <tr class="text-center">
                <td><?= $row['name'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['field'] ?></td>
                <td><?= $row['comment'] ?></td>
                <td>
                    <img src="<?= $row['picture'] ?>" style="height: 30px"/>
                </td>
                <td>
                    <a href="delete.php?id=<?= $row['user_id'] ?>">
                        <img src="delete.png" style="height: 30px"/>
                    </a>
                </td>
                <td>
                    <a href="edit.php?id=<?= $row['user_id'] ?>">
                        <img src="edit.png" align="right" style="width: 30px"/>
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="8">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Open Modal</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Modal body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
