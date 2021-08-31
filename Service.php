<?php

include "ConnectionObject.php";

?>




<html>
    <head>
        <title>Services</title>
        <link rel="stylesheet" href="CSS/Nav.css">
        <link rel="stylesheet" href="CSS/service.css">
    </head>
    <body>
        
        <header>
            <nav>
                <img class="logo" src="Image/PngItem_420338.png">
                <ul>
                    
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="Booking.php">Booking</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="managerLogin.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>

            <div class="banner" id="banner_two">
                <h1 class="a1">A journey you will enjoy</h1>
            </br> &ensp;
                <h2 class="a1">A peek at what we can offer to make your drive, satisfaction guaranteed! </h2>
            </div>

            <div class="box" style = "opacity: 80%">
                <h1>Standard Drive</h1>
                <h2>The starting option that is nothing but regular. Book a standard option drive to make your trip affordable without compromising comfort. <br><br><br>

                    <br>
                    <br>
                    <br> All available models here: <br>
                </h2>

                <select style = "border:none; width:100%; font-size:20px; font-weight:bold; text-align:center;">
                    
                <?php
                      $sql = "SELECT * FROM cars WHERE CarType = 1 ORDER BY ChargePerKM ASC";
                      $result = mysqli_query($backupConnector,$sql) or die(mysqli_error());
                      while($row=mysqli_fetch_assoc($result)) {
                 ?>
                      <option value="<?php echo $row['V_ID'];?>">
                     <?php echo $row['Maker']." ".$row['Model'];?>
                     </option>
                 <?php
                } // while
                 ?>

                </select>
                

            </div>

            <div class="box1" style = "background:red; color:white; opacity: 80%">
                <h1>Premium Drive</h1>
                <h2>Step up from the standard drive for an exceptional journey. Book a premium option drive to enjoy every second you have between the start and your destination without much weight on your wallet. <br><br>

                    <br>
                    <br>All available models here: <br><br>

                    <select style = "border:none; width:100%; font-size:20px; font-weight:bold; text-align:center;">
                    
                <?php
                      $sql = "SELECT * FROM cars WHERE CarType = 2 ORDER BY ChargePerKM ASC";
                      $result = mysqli_query($backupConnector,$sql) or die(mysqli_error());
                      while($row=mysqli_fetch_assoc($result)) {
                 ?>
                      <option value="<?php echo $row['V_ID'];?>">
                     <?php echo $row['Maker']." ".$row['Model'];?>
                     </option>
                 <?php
                } // while
                 ?>

                </select>

                    </h2>
            </div>
                
                
        </main>

    </body>
</html>