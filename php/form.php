<?php
session_start();
require_once "database.php";
	$pattern = "/@/i";
	$failure = false;

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$domain = $_POST['domain'];
		$members = $_POST['members'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		
		$file = $_FILES['file']["name"];
		$tmp_name = $_FILES['file']["tmp_name"];
		$path = "upload/".$file;
		$file1 = explode(".",$file);
		$ext = $file1[1];
		$allowed=array("jpg","png","pdf","html","css","js","php","py","c","cpp");

			if ( strlen($_POST['name']) < 1 || strlen($_POST['domain']) < 1 || strlen($_POST['members']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['phone']) < 1 || strlen($_POST['date']) < 1) 
			{
			  $_SESSION['error'] = 'All fields are required';
			  header("Location: form.php");
			  return;
			}
			if (is_numeric($_POST['name'])) 
			{
				$_SESSION['error'] = 'Name cannot be numeric';
				header("Location: form.php");
				return;
			}
			if (is_numeric($_POST['domain'])) 
			{
				$_SESSION['error'] = 'Domain cannot be numeric';
				header("Location: form.php");
				return;
			}
			if (!is_numeric($_POST['phone'])) 
			{
				$_SESSION['error'] = 'Phone number must be numeric';
				header("Location: form.php");
				return;
			}
			if (!preg_match($pattern, $_POST['email'])) 
			{
				$_SESSION['error'] = "Email must have an at-sign (@)";
				header("Location: form.php");
				return;
			}
			if(in_array($ext,$allowed))
			{
				move_uploaded_file($tmp_name,$path);
				$sql1 = "INSERT INTO projects (name, domain, members, email, phone, date, filename) VALUES ('$name', '$domain', '$members', '$email','$phone', '$date','$file')";
				$query1 = mysqli_query($conn, $sql1);
				$_SESSION['success'] = 'Project Uploaded Successfully.';
				header( 'Location: form.php' ) ;
				return;
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="wtl.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <script src="wtl.js"></script>
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

        <div class="form">
    
            <div class="tab-content">
			
				<p>
				<?php
					if ( isset($_SESSION['error']) ) 
					{
					  echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
					  unset($_SESSION['error']);
					}
					if ( isset($_SESSION['success']) ) 
					{
					  echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
					  unset($_SESSION['success']);
					}
				?>
				</p>
			
                <form method="post" enctype="multipart/form-data">
    
                    <div class="row">
                        <div class="field-wrap">
                            <input type="text" placeholder="Project Name*" name="name" id="project" required autocomplete="off" />
                        </div>
    
                        <div class="field-wrap">
                            <input type="text" placeholder="Domain Name*" name="domain" id="domain" required autocomplete="off" />
                        </div>
    
						<div class="field-wrap">
                            <textarea placeholder="Group Members*" name="members" required autocomplete="off" /></textarea>
                        </div>
	
                        <div class="field-wrap">
                            <input type="email" placeholder="Email Address*" name="email" id="email" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                            <input type="phone" placeholder="Phone number*" name="phone" id="phone" required autocomplete="off" />
                        </div>
    
                        <div class="field-wrap">
                            <input type="date" name="date" id="date" required autocomplete="off" />
                        </div>
						
                        <div class="field-wrap">
                            <input name="file" type="file">
                        </div>
						
                    </div>
    
                    <button type="submit" name="submit" class="button button-block" />upload project  &#x21EA;</button>
    
                </form>
    
            </div>
</body>
</html>