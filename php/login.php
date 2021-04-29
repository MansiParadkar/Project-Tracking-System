<?php
	session_start();
	require_once "database.php";
	$pattern = "/@/i";
	$failure = false;
	
	if(isset($_POST['login']))
	{
		if(isset($_POST['uname']) && isset($_POST['pwd']))
		{
			if ( strlen($_POST['uname']) < 1 || strlen($_POST['pwd']) < 1 ) 
			{
				$_SESSION['error'] = "User name and password are required";
				header("Location: login.php");
				return;
			}
			else if (!preg_match($pattern, $_POST['uname'])) 
			{
				$_SESSION['error'] = "Email must have an at-sign (@)";
				header("Location: login.php");
				return;
			}
			else 
			{
				$uname = $_POST['uname'];
				$sql = "SELECT * FROM accounts WHERE email = '$uname'";
				$query = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($query))
				{
					$pwd = $row['password'];
				}
				
				if ( $_POST['pwd'] == $pwd ) 
				{
					$_SESSION['uname'] = $_POST['uname'];
					header("Location: main.php");
					return;
				} 
				else 
				{
					$_SESSION['error'] = "Incorrect password";
					header("Location: login.php");
					return;
				}
				
			}
		}
	}
	else if(isset($_POST['signup']))
	{
		if ( isset($_POST['fname']) && isset($_POST['lname'])&& isset($_POST['email'])&& isset($_POST['password'])) 
		{
			// Data validation
			if ( strlen($_POST['fname']) < 1 || strlen($_POST['lname']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1) 
			{
			  $_SESSION['error'] = 'All fields are required';
			  header("Location: login.php");
			  return;
			}
			if (is_numeric($_POST['fname'])) 
			{
				$_SESSION['error'] = 'Name cannot be numeric';
				header("Location: login.php");
				return;
			}
			if (is_numeric($_POST['lname'])) 
			{
				$_SESSION['error'] = 'Name cannot be numeric';
				header("Location: login.php");
				return;
			}

			if (!preg_match($pattern, $_POST['email'])) 
			{
				$_SESSION['error'] = "Email must have an at-sign (@)";
				header("Location: login.php");
				return;
			}
			if(strlen($_POST['password']) < 5)
			{
				$_SESSION['error'] = "Password must be at least 5 characters long";
				header("Location: login.php");
				return;
			}
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$sql1 = "INSERT INTO accounts (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
			$query1 = mysqli_query($conn, $sql1);
			$_SESSION['success'] = 'Account added, Please Login.';
			header( 'Location: login.php' ) ;
			return;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
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
                    <a href="login.php" class="nav-link">LOG IN</a>
                </li>
                <li class="nav-item px-2">
                    <a href="login.php" class="nav-link">SIGN-UP</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    </div>
    <div class="form">
		
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
		
        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a id="log" href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">

            <form method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <input type="text" name="fname" placeholder="First Name*" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <input type="text" name="lname" placeholder="Last Name*" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <input type="email" name="email" placeholder="Email Address*" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <input type="password" name="password" placeholder="Set a password*" required autocomplete="off" />
                    </div>
                </div>

                <button type="submit" name="signup" class="button button-block" />Get Started</button>

            </form>

        </div>

        <div id="login">
            <form method="post">

                <div class="field-wrap">
                    <input type="text" name="uname" placeholder="Email Address*" required autocomplete="off" />
                </div>

                <div class="field-wrap">
                    <input type="password" name="pwd" placeholder="Password*" required autocomplete="off" />
                </div>

               <!-- <p class="forgot"><a href="#">Forgot Password?</a></p>-->

                <button name="login" class="button button-block" />Log In</button>

            </form>
	
        </div>

    </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>

</html>