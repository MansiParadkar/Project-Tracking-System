<?php
	session_start();
	require_once "database.php";
	$id=$_GET['id'];

	$sql = "SELECT * FROM `projects` WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$filename = $row['filename'];
	}
	$files = scandir("upload");
	for ($i = 2;$i<count($files);$i++)
	{
		if($files[$i] == $filename)
		{
			header("Location: upload/$files[$i]");
			return;
			?>
				<!--<a href="upload/<?php echo $files[$i]?>"><?php echo $files[$i] ?></a>-->
				
			<?php
		}
	}
?>