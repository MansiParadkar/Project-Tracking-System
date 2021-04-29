<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "concert";

$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM `upload`";
$result = mysqli_query($conn, $sql);
$files = scandir("upload");
for ($i = 2;$i<count($files);$i++){
?>
<a href="upload/<?php echo $files[$i]?>"><?php echo $files[$i] ?></a>
<?php
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
    
</body>
</html>