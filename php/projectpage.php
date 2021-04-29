<?php
	session_start();
	require_once "database.php";
	$id=$_GET['id'];
	$sql = "SELECT * FROM projects where id=$id";
	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query))
	{
		$pname = $row['name'];
		$domain = $row['domain'];
		$members = $row['members'];
		$email = $row['email'];
		$contact = $row['phone'];
		$date = $row['date'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="wtl.css">
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
                        <a href="login.html" class="nav-link">SIGN-UP</a>
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
                
                    <a href="view.php?id=<?php echo $id; ?>"><button class="button" style="padding:10px">View Project</button></a>

            </div>
        </div>

<h3><b>Project Name: </b><?php echo $pname;?> </h3>
<h3><b>Domain: </b><?php echo $domain;?></h3>
<h3><b>Members: </b><?php echo $members;?></h3>
<h3><b>email: </b><?php echo $email;?></h3>
<h3><b>Contact: </b><?php echo $contact;?></h3>
<h3><b>Date: </b><?php echo $date;?></h3>
<br><br>
<a href="main.php"><button class='view btn btn-sm btn-primary'>Back</button></a>


</body>
</html>