<?php
    require_once 'konekcija.php';
    require_once 'header.php';
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!isset($_SESSION['id'])) 
        {
            echo "<h2>Please login</h2>";
        }
        else
        {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            $search = $conn->real_escape_string($_POST['search']);

            $sql = "SELECT * FROM `accounts`
                    WHERE `name` LIKE '$search' OR `email` LIKE '$search'";
            $result = $conn->query($sql);
            if(!$result) 
            {
                echo "Error";
            }
            else 
            {
                if($result->num_rows == 0) 
                {
                    echo "<h2> User doesn't exsist.</h2>";
                }
                else 
                {
                    echo "<ul class='list'>";
                    while($red = $result->fetch_assoc()) 
                    {
                        echo "<li>";
                        echo "<div class='list-part'>";
                        echo "Name: ";
                        echo $red['name'];
                        echo "</div>";
                        echo "<div>";
                        echo "E-mail: ";
                        echo $red['email'];
                        echo "</div>";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
            }
        }
    }
?>