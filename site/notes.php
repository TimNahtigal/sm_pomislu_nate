<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="wrapperN">
        <?php
            session_start();

            if(!isset($_SESSION["id"])){
                header("Location: notes.php");
            }

            if(isset($_POST["action"])){
                //redirect iz notes
                if($_POST["action"] == "A" && isset($_POST["notes"])){
                    $conn = new mysqli("localhost", "root", "", "NSA");
                    $sql = "INSERT INTO notes VALUES (NULL, '$_POST[notes]', '$_SESSION[id]')";
                    $result = $conn->query($sql);
                }elseif($_POST["action"] == "S"){
                    if(isset($_POST['nid']) && isset($_POST['notes'])){
                        $conn = new mysqli("localhost", "root", "", "NSA");
                        $sql = "UPDATE notes SET Note = '$_POST[notes]', idNotes = idNotes where idNotes = '$_POST[nid]'";
                        $result = $conn->query($sql);
                    }
                }elseif($_POST["action"] == "X"){
                    if(isset($_POST['nid'])){
                        $conn = new mysqli("localhost", "root", "", "NSA");
                        $sql = "DELETE FROM notes where idNotes = '$_POST[nid]'";
                        $result = $conn->query($sql);
                    }
                }elseif($_POST["action"] == "L"){
                    session_destroy();
                    header("Location: index.php");
                }
            }
        ?>

        <div class="head">
            <form action="notes.php" method="post">
                <textarea rows="2" name="notes"></textarea>
                    <button class="add" name="action" value="A" type="submit">ADD</button>
                    <button class="logoff" name="action" value="L" type="submit">LOGOUT</button>
            </form>
        </div>
            <div class="clear"></div>
        <div class="workbook">
            <?php

                $conn = new mysqli("localhost", "root", "", "NSA");
                $sql = "SELECT * FROM notes where userId='$_SESSION[id] order by idNotes desc'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<div class='note'>";
                        echo "<span>$row[idNotes]</span>";
                        echo "<form action='notes.php' method='post'>";
                        echo "<textarea name='notes' rows='5' id='$row[idNotes]'>$row[Note]</textarea>";
                        echo "<input type='hidden' name='nid' value='$row[idNotes]''>";
                        echo "<button class='save' name='action' value='S' type='submit'>SAVE</button>";
                        echo "<button class='delete' name='action' value='X' type='submit'>X</button>";
                        echo "</form>";
                    echo "</div>";
                  }

            ?>

        </div>

    </div>



</body>
</html>




