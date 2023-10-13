<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #side_bar {
            background-image:url("https://i.gifer.com/7MKB.gif") ;
			color: white;
			
            padding: 20px;
            width: 300px;
            height: 100%;
        }

        #main_content {
            padding: 20px;
			background:#ffe5cc;
			
        }
		#navi{
			background-image:url("https://i.gifer.com/7MKB.gif") width=1500 length 13;
		}
		

        #navi .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 24px;
        }

        #navi .navbar-brand img {
            height: 90px;
            width: 90px;
            margin-right: 10px;
        }

        #navi .navbar-nav .nav-link {
            color: white;
        }
		
		 /* Additional styles for footer */
		 #footer {
            background:#ffe5cc;
            color: black;
            padding: 5px 0;
            text-align: center;
        }
        body {
        background-color: lightblue;
    }
    </style>
</head>
<body background:#d1e0e0>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navi">
        <div class="container">
            <a class="navbar-brand" href="index.php">
			<img src="https://www.vhv.rs/dpng/d/398-3987834_indian-railways-logo-hd-png-download.png"  height=150 width=150>

				Library Management System for indian railways (LMS)</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Register</a>
                </li>
            </ul>
        </div>
    </nav><br>
	<br>
	<br>
	<br>
    <div class="container mt-4">
        <div class="row">
        <div class="col-md-4" id="side_bar">
    <h5>Library Timing</h5>
    <ul>
        <li><strong>Opening Timing:</strong> 8:00 AM</li>
        <li><strong>Closing Timing:</strong> 8:00 PM</li>
        <li><strong>(Sunday off)</strong></li>
    </ul>
    <h5>What we provide ?</h5>
    <ul>
        <li><strong>Full furniture</strong></li>
        <li><strong>Free Wi-fi</strong></li>
        <li><strong>News Papers</strong></li>
        <li><strong>Discussion Room</strong></li>
        <li><strong>RO Water</strong></li>
        <li><strong>Peaceful Environment</strong></li>
    </ul>
</div>
           <!-- Existing code up to the opening div of "col-md-8" -->
<div class="col-md-8" id="main_content">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Already a member? LOGIN HERE</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                <button name="reg" class="btn btn-primary btn-block">click here for new registration</button>
            </form>
            <?php
            session_start();
            if(isset($_POST['reg'])){
                header("Location:signup.php");
            }
            if(isset($_POST['login'])){
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"lms");
                $query = "select * from users where email = '$_POST[email]'";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    if($row['email'] == $_POST['email']){
                        if($row['password'] == $_POST['password']){
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['id'] = $row['id'];
                            header("Location:user_dashboard.php");
                        }
                        else{
                            ?>
                            <div class="alert alert-danger mt-3">Wrong Password</div>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Remaining code after the closing div of "col-md-8" -->

        </div>
    </div>
	<br>
	<br>
	<br>
	
	
	
	<footer id="footer">
        <div class="container">
            <p>&copy; 2023 Library Management System</p>
        </div>
    </footer>
</body>
</html>

