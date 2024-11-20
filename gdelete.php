<?php
require("connection.php");
// Game Deletion
            $id = $_GET['id'];

            $query = "DELETE FROM games WHERE `id`=$id";
            if(mysqli_query($con,$query))
            {
                header("Location:dispgame.php");
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }
            ?>