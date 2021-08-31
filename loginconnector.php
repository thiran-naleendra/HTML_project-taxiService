<?php
    
    // php page to manage logins and sessions

    session_start();

    // connecting the page to the database

    include "loginConnectionObject.php";

    if(isset($_POST["txt_username"]) && isset($_POST["txt_password"])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    
        }

        $username = validate($_POST['txt_username']);
        $password = validate($_POST['txt_password']);

        // if the username is empty, show the error and don't access the page

        if (empty($username)){
            header("Location: managerLogin.php?error= username is required");
             exit();
        }
        else if(empty($password)){
            header("Location: managerLogin.php?error= password is required");
            exit();
        }
        else{
           
            // if both the above fields are supplied commence authenitication
            // checking records from database

            $query = "SELECT * FROM administrator WHERE Username = '$username' AND Password = '$password' ";

            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                
                if($row['Username'] === $username && $row['Password'] === $password){
                    
                    $_SESSION['Username'] = $row['Username'];
                    $_SESSION['Admin_ID'] = $row['Admin_ID'];

                    header("Location: manager.php");     
                    exit();

                }
            }
                else{
                    header("Location: managerLogin.php?error= Incorrect username or password");
                    exit();
         
                }
            
        }
    }
        
         

?>