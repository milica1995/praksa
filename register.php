<?php
    require_once 'header.php';
    require_once "konekcija.php";
    $nameO=$passO="*";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $rePassword = $conn->real_escape_string($_POST['rePassword']);
        $name = $conn->real_escape_string($_POST['name']);
        $passHesh = MD5($password);
        $sql = "SELECT * from `accounts` WHERE `email` LIKE '$email'";
        $result = $conn->query($sql);
        $red = $result->fetch_assoc();
        if($result->num_rows != 0)
        {
            echo "<p>There is already a user with that e-mail.</p>";
        }
        elseif(strlen($password) < 6)
        {
            echo "Password must be longer than 6 characters.";
        }
        elseif($password != $rePassword)
        {
            echo "Passwords do not match.";
        }
        else
        {     
            $sql1= "INSERT INTO `accounts`(`name`,`email`,`password`) 
            VALUES('$name', '$email', '$passHesh')";
            $conn->query($sql1);
            header('Location:login.php');   
        }
        
    }
    
?>
        <div class="form row col-12">
            <form method="POST" action="register.php">
                <fieldset>
                <legend><h1>Registration</h1></legend>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-2 left">
                            <label for="email">E-mail:</label>
                        </div>
                        <div class="col-3">
                            <input type="email" name="email" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-2 left">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col-3">
                            <input type="text" name="name" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-2 left">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col-3">
                            <input type="password" name="password" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-2 left">
                            <label for="rePassword">Repeat password:</label>
                        </div>
                        <div class="col-3">
                            <input type="password" name="rePassword" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>