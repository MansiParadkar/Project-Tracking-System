<?php
	session_start();
	require_once "database.php";
	$id = $_GET['id'];
	if ( isset($_POST['delete']) ) 
	{
		$sql = "DELETE FROM projects WHERE id = $id";
		$q = mysqli_query($conn,$sql);
		header( 'Location: main.php' );
		return;
	}
	if ( isset($_POST['cancel']) ) 
	{
		header( 'Location: main.php' ) ;
		return;
	}
?>


<html>
<head>
    <link rel="stylesheet" href="wtl.css">
</head>
<body>
<style>
.btn {
  background-color: #800000;
  border: none;
  color: white;
  padding: 12px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.center
{
	text-align : center;
}
</style>
<br><br><br><br><br><br><br><br><br>
			<div class="center">
				<p><strong>Do you want to delete this project?</strong></p>
				<form method="post">
					<input class="btn" type="submit" value="Delete" name="delete"> <input class="btn" type="submit" value="Cancel" name="cancel"> 
				</form>
			</div>

</body>
