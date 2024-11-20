<?php
require("connection.php");
// Game Deletion
            $id = $_GET['id'];

            $query = "DELETE FROM tournaments WHERE `id`=$id";
            if(mysqli_query($con,$query))
            {
                header("Location:disptournament.php");
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }
            ?>