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
    <div class="container col-3 border">
        <form action="process.php" method="post" enctype="multipart/form-data">
            <table class="table table-primary" style="position: absolute">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="frm[name]">
                    </td>
                </tr>
                <tr>
                    <td>Lastename:</td>
                    <td>
                        <input type="text" name="frm[lastname]">
                    </td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td>
                        <input type="number" name="frm[age]">
                    </td>
                </tr>
                <tr>
                    <td>Field:</td>
                    <td>
                        <select name="frm[field]" >
                            <option value="group1">Group1</option>
                            <option value="group2">Group2</option>
                            <option value="group3">Group3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Picture:</td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>Comment:</td>
                    <td>
                        <textarea name="frm[comment]"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2">
                        <input type="submit" value="Confirm" name="btn" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>