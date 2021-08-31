
<?php

include "ConnectionObject.php";

//$backupConnector = new mysqli("localhost", "root", "" , "RabbitCabs" , 3308);

if($backupConnector->connect_error){
    echo "<script>alert('Database connection down')</script>";
}
else
    echo "<script>alert('Database connection active')</script>";



    $selectReservationQuery = "SELECT * FROM Reservations";
    $viewResultForReservations = $backupConnector->query($selectReservationQuery);


   
?>





<html>
    <head>
        <link rel="stylesheet" href="CSS/Nav.css">
        <link rel="stylesheet" href="CSS/manager.css">
        <link rel="stylesheet" href="CSS/customTable.css">

        <style type="text/css">

            .textBoxes
            {
                background: black:
            }

            th
            {
                background-color: #000000;
                color: rgb(90, 188, 233);
                font-weight: 200;
                text-transform: uppercase;

            }

        </style>

    </head>
    <body>
        <header>
            <nav>
                <img class="logo" src="Image/PngItem_420338.png">
                <ul>
                    
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="Booking.php">Booking</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
            <main>

                <!-- Insert car -->

               
                <div>

                <table>

                        


                        <tr>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Pickup Location</th>

                        <th>Destination</th>

                        <th>Distance</th>

                        <th>Telephone</th>

                        <th>Pickup time and date</th>

                        <th>Car</th>

                        </tr>
                     
                                <?php

                                // set php statment inside the table and close the tag at points to connect it into the table
                                // fet the results into a variable as an associative array and use those keys to display values

                                while($rows = mysqli_fetch_assoc($viewResultForReservations)){
                                ?>
                                        <tr>
                                            <td> <?php echo $rows['CustomerName'] ?> </td>
                                            <td> <?php echo $rows['CustomerEmail'] ?> </td>
                                            <td> <?php echo $rows['PickupLocation'] ?> </td>
                                            <td> <?php echo $rows['Destination'] ?> </td>
                                            <td> <?php echo $rows['Distance'] ?> </td>
                                            <td> <?php echo $rows['Telephone'] ?> </td>
                                            <td> <?php echo $rows['PickupDateTime'] ?> </td>
                                            <td> <?php echo $rows['SelectedCar'] ?> </td>
                                             

                                        </tr>
                                <?php
                                    }
                                ?> 

                        </table>

                        <br>
                        <br>
                
                 </div>
                
            </main>
        </header>
    </body>
</html>