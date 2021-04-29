<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "concert";

$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_REQUEST["submit"]))
{
    $file = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $path = "upload/".$file;
    $file1 = explode(".",$file);
    $ext = $file1[1];
    $allowed=array("jpg","png","gif","pdf","wmv","html","css","js","php");
    if(in_array($ext,$allowed))
    {
        move_uploaded_file($tmp_name,$path);
        $sql = "INSERT INTO `upload`(`file`) VALUES('$file')";
        $result = mysqli_query($conn, $sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="upload">
</form>
</body>
</html>