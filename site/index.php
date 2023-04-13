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
        
        <form class="loginForm" action="index.php" method="post">
            <h1>Welcome</h1>
            <input type="text" name="username" placeholder="Username"> <br>
            
            <input type="password" name="password" placeholder="Password"><br>
            <br>
            <button type="submit">Login</button>
            <?php
                if(isset($_POST["username"]) && isset($_POST["password"])){
                    $conn = new mysqli("localhost", "root", "", "NSA");
                    $sql = "SELECT idusers FROM users where name='$_POST[username]' and pass='$_POST[password]'";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $_SESSION["id"] = $row["idusers"];
                        echo $_SESSION["id"];
                        header("Location: notes.php");
                        }
                        }
                      else {
                        echo "<br><br><br>";
                        echo "<p class='error'>Narobna prijava</p>";
                      }
                }
            ?>
            <br>
        <a id="newULink" href="nuser.php">New user?</a>
        </form>
    </div>



</body>
</html>





