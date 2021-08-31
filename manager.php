
<?php

include "ConnectionObject.php";

if($backupConnector->connect_error){
    echo "<script>alert('Database connection down')</script>";
}
else
    echo "<script>alert('Database connection active')</script>";



    if(isset($_POST['btn_insertCar']))
    {

    $insertVID = $_POST['txt_vid'];
    $insertMaker = $_POST['txt_maker'];
    $insertModel = $_POST['txt_model'];
    $insertColor = $_POST['txt_color'];
    $insertNumPlate = $_POST['txt_nplate'];
    $insertCarType = $_POST['select_carType'];
    $insertChargePerKM = $_POST['txt_ppkm'];

    
    
    $insertQuery = "INSERT INTO Cars VALUES('$insertVID', '$insertMaker', '$insertModel', '$insertColor', '$insertNumPlate', $insertCarType, $insertChargePerKM)";

            if($backupConnector->query($insertQuery))
            {
                echo "<script>alert('insert success')</script>";
            } 
            else 
                echo  "<script>alert('insert failed')</script>";

        
    }



    if(isset($_POST['btn_updateCar']))
    {

    $updateSelectedVID = $_POST['drop_selectVIDtoUpdate'];
    $updateMaker = $_POST['txt_newmaker'];
    $updateModel = $_POST['txt_newmodel'];
    $updateColor = $_POST['txt_newcolor'];
    $updateNumPlate = $_POST['txt_newnplate'];
    $updateCarType = $_POST['select_newcarType'];
    $updateChargePerKM = $_POST['txt_newppkm'];

    
    
    $updateQuery = " UPDATE cars SET Maker = '$updateMaker', Model = '$updateModel', Color = '$updateColor', NumberPlate = '$updateNumPlate', CarType = $updateCarType, ChargePerKM = $updateChargePerKM WHERE V_ID = '$updateSelectedVID' ";

            if($backupConnector->query($updateQuery))
            {
                echo "<script>alert('update success')</script>";
            } 
            else 
                echo  "<script>alert('update failed')</script>";

        
    }






    if(isset($_POST['btn_deleteCar']))
    {

    $deleteSelectedVID = $_POST['drop_selectVIDtoDelete'];


    
    
    $deleteQuery = "DELETE FROM Cars WHERE V_ID = '$deleteSelectedVID' ";

            if($backupConnector->query($deleteQuery))
            {
                echo "<script>alert('deletion success')</script>";
            } 
            else 
                echo  "<script>alert('deletion failed')</script>";

        
    }


    $selectQuery = "SELECT * FROM Cars";
    $viewResult = $backupConnector->query($selectQuery);

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

                <div class="box">
                    
                    <form name = "insertCar" action = "#" method = "POST">
                     <h2 style = "text-align:center"> Add car </h2>
                     <br>
                     <br>
                     <br>
                     <p>Vechile ID</p>
                     <br>
                     <input class = "textBoxes" type="text" id = "txt_vid" name="txt_vid" placeholder="Enter Vehicle ID" style = "" required>
                     <br>
                     <br>
                     <p>Maker</p>
                     <br>
                     <input type="text" id = "txt_maker" name="txt_maker" placeholder="Enter Maker" style = "color:white;" required>
                     <br>
                     <br>
                     <p>Model</p>
                     <br>
                     <input type="text" id = "txt_model" name="txt_model" placeholder="Enter Model" style = "color:white;" required>
                     <br>
                     <br>
                     <p>Color</p>
                     <br>
                     <input type="text" id = "txt_color" name="txt_color" placeholder="Enter color" style = "color:white;" required>
                     <br>
                     <br>
                     <p>Number plate</p>
                     <br>
                     <input type="text" id = "txt_nplate" name="txt_nplate" placeholder="Enter number plate" style = "color:white;" required>
                     <br>
                     <br>
                     <p>Car Type</p>
                     <br>
                     <select id = "select_carType" name = "select_carType" style = "width:100%; height:25px; color:white; background:black; border:none; font-size:16px;" required>
                        <option value = 1> Standard </option>
                        <option value = 2> Luxury </option>
                     </select>       
                     <br>
                     <br>
                     <p>Charge per KM</p>
                     <br>
                     <input type="number" id = "txt_ppkm" name="txt_ppkm" placeholder="Enter price per km" style = "color:white; font-size:16px; background:black;" required>
                     <br>
                     <br>
                     <br>
                     <br>
                     <input type = "submit" id = "btn_insertCar" name = "btn_insertCar" value = "add car" style = "width:100%; font-size:20px;" required>
                     

                     

                    </form>
               

                </div>

                 <!-- Update car -->

                <div class="box1">
                    
                     <form name = "updateCar" action = "#" method = "POST">
                     <h2 style = "text-align:center"> Update car info </h2>
                     <br>
                     <br>
                     <br>
                     <p>Vehicled ID to update info</p>
                     <br>
                     <select name = "drop_selectVIDtoUpdate" style = "width:100%; height:25px; color:white; background:black; border:none; font-size:16px;">
                            <?php
                            $sql = "SELECT * FROM cars";
                            $result = mysqli_query($backupConnector,$sql) or die(mysqli_error());
                            while($row=mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['V_ID'];?>">
                            <?php echo $row['V_ID'];?>
                            </option>
                            <?php
                            } 
                            ?>
                            </select>
                     <br>
                     <br>
                     <p>New maker</p>
                     <br>
                     <input type="text" id = "txt_newmaker" name="txt_newmaker" placeholder="Enter Maker" style = "color:white;" requried>
                     <br>
                     <br>
                     <p>New model</p>
                     <br>
                     <input type="text" id = "txt_newmodel" name="txt_newmodel" placeholder="Enter Model" style = "color:white;" required>
                     <br>
                     <br>
                     <p>New color</p>
                     <br>
                     <input type="text" id = "txt_newcolor" name="txt_newcolor" placeholder="Enter color" style = "color:white;" required>
                     <br>
                     <br>
                     <p>New number plate</p>
                     <br>
                     <input type="text" id = "txt_newnplate" name="txt_newnplate" placeholder="Enter number plate" style = "color:white;" required>
                     <br>
                     <br>
                     <p>New car type</p>
                     <br>
                     <select id = "select_newcarType" name = "select_newcarType" style = "width:100%; height:25px; color:white; background:black; border:none; font-size:16px;" required>
                        <option value = 1> Standard </option>
                        <option value = 2> Luxury </option>
                     </select>       
                     <br>
                     <br>
                     <p>New charge per KM</p>
                     <br>
                     <input type="number" id = "txt_newppkm" name="txt_newppkm" placeholder="Enter price per km" style = "color:white; font-size:16px; background:black;" required>
                     <br>
                     <br>
                     <br>
                     <br>
                     <input type = "submit" value = "update car" id = "btn_updateCar" name = "btn_updateCar" style = "width:100%; font-size:20px;"required>

                    </form>
                
                
                
                </div>
                
                <!-- Delete car -->
                <div class="box2">
                    
                <form name = "deleteCar" action = "#" method = "POST">
                     <h2 style = "text-align:center"> Remove Car </h2>
                     <br>
                     <br>
                     <br>
                     <p>Vehicled ID to delete info</p>
                     <br>
                     <select name = "drop_selectVIDtoDelete" style = "width:100%; height:25px; color:white; background:black; border:none; font-size:16px;">
                            <?php
                            $sql = "SELECT * FROM cars";
                            $result = mysqli_query($backupConnector,$sql) or die(mysqli_error());
                            while($row=mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['V_ID'];?>">
                            <?php echo $row['V_ID'];?>
                            </option>
                            <?php
                            } 
                            ?>
                            </select>
                     <br>
                     <br>
                     <br>
                     <br>
                     <input type = "submit" id = "btn_deleteCar" name = "btn_deleteCar" value = "delete car" style = "width:100%; font-size:20px;">

                     <br><br><br><br><br><br><br><br>
                     <br><br><br><br><br><br><br><br>
    
                     
                     <a href = "reservations.php">
                     <input type = "button" id = "btn_goToReservation" name = "btn_gotToReservations" value = "View Reservations" style = "width:100%; font-weight:bold; font-size:20px; height:100px; background:black; color:rgb(90, 188, 233)">
                     </a>

                    </form>
                
                
                </div>

                <div>

                    <form action = "#" name = "View" method = "POST">
           

                        <table style = "top: 150%;">

                        

                        <tr>

                        <th>V_ID</th>

                        <th>Maker</th>

                        <th>Model</th>

                        <th>Color</th>

                        <th>Licence plate</th>

                        <th>Car Type</th>

                        <th>Charge per KM</th>

                        </tr>
                     
                                <?php

                                // set php statment inside the table and close the tag at points to connect it into the table
                                // fet the results into a variable as an associative array and use those keys to display values

                                while($rows = mysqli_fetch_assoc($viewResult)){
                                ?>
                                        <tr>
                                            <td> <?php echo $rows['V_ID'] ?> </td>
                                            <td> <?php echo $rows['Maker'] ?> </td>
                                            <td> <?php echo $rows['Model'] ?> </td>
                                            <td> <?php echo $rows['Color'] ?> </td>
                                            <td> <?php echo $rows['NumberPlate'] ?> </td>
                                            <td> <?php echo $rows['CarType'] ?> </td>
                                            <td> <?php echo $rows['ChargePerKM'] ?> </td>
                                             

                                        </tr>
                                <?php
                                    }
                                ?> 

                        </table>

                        <br>
                        <br>


               

                </form>

                </div>

               
                
            </main>
        </header>


    </body>
</html>