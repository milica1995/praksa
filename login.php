<?php
    session_start();
    require_once 'header.php';
    require_once 'konekcija.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $sql = "SELECT * FROM accounts WHERE email = '$email'";
        $result = $conn->query($sql);
        if(!$result)
        {
            echo "Upit nije dobar";
        }
        else
        {
            if($result->num_rows == 0)
            {
                echo "Error logging you in.";
            }
            else
            {
                $red = $result->fetch_assoc();
                if(md5($password) != $red['password'])
                {
                    echo "Error logging you in.";
                }
                else
                {
                    $_SESSION['id'] = $red['id'];
                    header('Location: home.php');
                }
            }
        }

    }
?>
        <div class="form row col-12">
            <form method="POST" action="login.php">
                <fieldset>
                <legend><h1>Log In</h1></legend>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-1">
                            <label for="email">E-mail:</label>
                        </div>
                        <div class="col-3">
                            <input type="email" name="email" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-1">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col-3">
                            <input type="password" name="password" value="">
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Log In">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>