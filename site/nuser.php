<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        session_start();   
    ?>

    <div class="wrapper">
        
        <form class="loginForm" action="nuser.php" method="post">
            <h1>NEW USER</h1>
            <input type="text" name="username" placeholder="Username"> <br>
            
            <input type="text" name="password" placeholder="Password"><br>
            <br>
            <button type="submit">JOIN</button>
            <?php
                if(isset($_POST["username"]) && isset($_POST["password"])){
                    $conn = new mysqli("localhost", "root", "", "NSA");

                    $sql = "INSERT INTO users VALUES (NULL, '$_POST[password]','$_POST[username]')";
                    $result = $conn->query($sql);
                    
                    header("Location: index.php");
                }
            ?>
        </form>
    </div>



</body>
</html>





