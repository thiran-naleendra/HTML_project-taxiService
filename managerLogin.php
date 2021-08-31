
<html>
    <head>
        <title>Log IN</title>
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="stylesheet" href="CSS/Nav.css">
    </head>
    <body>
        <header>
            <nav>
                <img class="logo" src="Image/PngItem_420338.png">
                <ul>
                    
                    <li><a  href="index.php">Home</a></li>
                    <li><a href="Booking.php">Booking</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a class="active" href="managerLogin.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <div class="loginbox">
            <img src="Image/login.png" class="avatar">
            <h1> Managers Only </h1>

            <form action = "loginconnector.php" name = "login" method = "POST">

              <?php if(isset($_GET['error'])) { ?>
                  <br>
                  <p class = "error"> <?php echo $_GET['error']; ?> </p>
                  <br>
                  
              <?php } ?>

                <p>Username</p>
                <input type="text" name="txt_username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="txt_password" placeholder="Enter Password">
                <input type="submit" value="Login">

            </form>
        </div>
    </body>
</html>