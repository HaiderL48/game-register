<?php 
require("connection.php");
    session_start();
    if(!isset($_SESSION['adminid']))
    {
        
        header('Location:admin.php');
       
    }
    
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require("connection.php");
        if(isset($_POST['submit'])){
            $id = $_GET['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "UPDATE singin SET `username`='{$name}',`email`='{$email}',`password`='{$password}' WHERE `id`='{$id}'";
            if(mysqli_query($con,$query))
            {
                header("Location:user.php");
                echo "<script>alert('Success')</script>";
            }
            else
            {
                echo "<script>alert('UnSuccess')</script>";
            }
        }
    ?>
    <style >
	html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('webpics/back1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
}
		h1{
			position: relative;
			top: 15px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
	.bt{
		height:40px;
		width:120px;
		border: none;
		transition: .3s;
		border-radius:5px;
		font-size:20px;
		font-weight:600;
		color:white;
		border:2px solid white;
		background-color:rgba(0,0,0,0.1);
		
	}
	.container{
		display:flex;
		justify-content:center;
		align-items:center;
	}
	.bt:active{
		color:black;
		background-color:white;

	}
	
	
	.box{
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-content:center;
		text-align:center;
		width:450px;
		height:370px;
		backdrop-filter:blur(2px);
		background-color:rgba(0,0,0,0.2);
		margin: 100px;
		border-radius:20px;
	
	}
	input{
		border-radius:15px;
		color:white;
		border:none;
		background-color:rgba(0,0,0,0.1);
		outline:none;
		width:80%;
		height:40px;
	}
	input:focus{
		outline:solid 1px white;
		
	}
	.text{
		font-size:14px;
		font-weight:600;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		transition: .2s;
		
	}
	a{
		color:white;
		text-decoration:none;
	}
	
	</style>
</head>
<body>
<div class="container">
		<form method="POST">
	<div class="box">
		<h1>Edit ID</h1><br><br>
		<?php
		require("connection.php");
	require("func.php");
	
	$user = getAll("singin");
            if(mysqli_num_rows($user) > 0)
                          {
                            foreach($user as $item)
                            {
								?><div class="login">
								<input placeholder=" <?= $item['username'];?>" name ="name" class="text"></input><br><br>
								<input placeholder=" <?= $item['email'];?>" name ="email" class="text"></input><br><br>
								<input placeholder=" <?= $item['password'];?>" name ="password" class="text"></input><br><br>
								<button class="bt" name="submit">Edit</button><br><br>
                          <?php }
                        }
                          else
                          {
                                echo "No Record Found";
                          }
        ?>
	
	</div>
	</div>
	</form></div>
	
	
</body>
</html>




