<?php  
session_start();
require_once "database.php";

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="wtl.css" type="text/css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <script src="wtl.js"></script>

  <title>OUTLINE</title>

</head>

<body>
 



  <div class="container">
        <nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top">
            <a href="#" class="navbar-brand">OUTLINE</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collpase navbar-collapse" id="navLinks">
                <ul class="navbar-nav">
    
                    <li class="nav-item px-2">
                        <a href="Wtl.html" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="" class="nav-link">ABOUT</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="" class="nav-link">BLOG</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="" class="nav-link">CONTACT</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="login.php" class="nav-link">SIGN-UP</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="logout.php" class="nav-link">LOG OUT</a>
                    </li>
					<li class="nav-item px-2">
                        <a href="#" class="nav-link">             </a>
                    </li>
					<li class="nav-item px-2">
                        <a href="#" class="nav-link">             </a>
                    </li>
					<li class="nav-item px-2">
                        <a href="#" class="nav-link">             </a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="#" class="nav-link">             </a>
                    </li>
					
					<li class="nav-item px-2">
                        <a href="main.php" class="nav-link"><?php echo $_SESSION['uname']; ?></a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        
  <div class="hey" style="display:flexbox;align-items: center;margin-top:100px;">
        <div class="tab-content">
            <form action="form.php">
                <div class="field-wrap">
                <button class="button" style="padding:10px">Upload Project  &#x21EA;</button>
            </div>
            </form>
        </div>
    </div>
  
  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Project name</th>
          <th scope="col">Domain</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `projects`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result))
			{
				$sno = $sno + 1;
		?>
				
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['domain']; ?></td>
				<td><a href="projectpage.php?id=<?php echo $row['id'];?>"><button class='view btn btn-sm btn-primary'>View</button></a> 
					<?php if($_SESSION['uname'] == $row['email']) {?>
					<a href="delete.php?id=<?php echo $row['id'];?>"><button class='delete btn btn-sm btn-primary'>Delete</button></a>  </td>
					<?php } ?>
			</tr>
		<?php
			} 
        ?>


      </tbody>
    </table>
  </div>
<hr>
  
</body>

</html>