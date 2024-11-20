<?php
        require("connection.php");
        session_start();

        // User Deletion
            $id = $_GET['id'];

            $query = "DELETE FROM singin WHERE `id`=$id";
            if(mysqli_query($con,$query))
            {
                header("Location:user.php");
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }




            // Game Deletion
            $id = $_GET['id'];

            $query = "DELETE FROM games WHERE `id`=$id";
            if(mysqli_query($con,$query))
            {
                header("Location:addgame.php");
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }
        
            // Tournaments Deletion
            $id = $_GET['id'];

            $query = "DELETE FROM tournaments WHERE `id`=$id";
            if(mysqli_query($con,$query))
            {
                header("Location:tournament.php");
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }
        
    ?>