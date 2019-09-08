<?php
    session_start();
    
    require_once 'header.php';
    require_once 'konekcija.php';

    if(!isset($_SESSION['id']))
    {
        header('Location: login.php');
    }
    $id = $_SESSION['id'];
    
    $sql = "SELECT `name` FROM `accounts` WHERE `id` = '$id'";
    $result = $conn->query($sql);
    $red = $result->fetch_assoc();
    $name = $red['name'];
?>
        <div class="row">
            <div class="col-3"></div>
            <div class="title col-6">
                <h1>Welcome<br><?php echo $name?></h1>
            </div>
            <div class="col-3"></div>
        </div>
        
    </body>
</html>