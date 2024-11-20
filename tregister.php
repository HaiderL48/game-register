<?php
require("connection.php");
    session_start();
    if(!isset($_SESSION['userid']))
    {
        echo  "<script>alert(You have not Loged in yet!!)</script>";
        header('Location:loginpage.php');
       
    }
	?>
<html>
	<head>
	
	</head>
	<?php
		require("connection.php");
		
			if(isset($_POST['submit']))
			{
				
				$igi = $_POST['igi'];
				$ign= $_POST['ign'];
				$id1 = $_GET['id'];
				
				$tableCheck = "SHOW TABLES LIKE 'tournaments_$id1'";
				$checkTable = mysqli_query($con,$tableCheck);
				if(mysqli_num_rows($checkTable)===0){
					
					$createTable = "CREATE TABLE IF NOT EXISTS `tournaments_$id1`
									(id INT PRIMARY KEY AUTO_INCREMENT,
									username VARCHAR(255) NOT NULL,
									ingameid VARCHAR(255) NOT NULL,
									ingamename VARCHAR(255) NOT NULL,
									tournament_id INT
					)";
					$resultCreate = mysqli_query($con,$createTable);
					if($resultCreate)
					{
						
						$insertData = "INSERT INTO `tournaments_$id1`(username,ingameid,ingamename,tournament_id) VALUES 
										('{$_SESSION['userid']}','$igi','$ign','$id1')";
						$insertResult = mysqli_query($con,$insertData);
						if($insertResult)
						{
							?> <script>alert('Register Successful')</script><?php
						}
						else{
							?> <script>alert('Registration Error!!!')</script><?php
						}

					}
					
				}
				else{
						$checkAccur = "SELECT * FROM `tournaments_$id1`";
						$accurResult = mysqli_query($con,$checkAccur);
						if(mysqli_num_rows($accurResult)>=10){
							
							?> <script>alert('Room is Full')</script><?php

						}
						else{
						$checkData = "SELECT * FROM `tournaments_$id1` WHERE `ingamename`= '$ign' AND `ingameid`= '$igi'";
						$checkResult = mysqli_query($con,$checkData);
						if(mysqli_num_rows($checkResult)===1)
						{
							?> <script>alert('Already Registered!!!')</script><?php
						}
						else{
							$insertAfter = "INSERT INTO `tournaments_$id1`(username,ingameid,ingamename,tournament_id) VALUES 
										('{$_SESSION['userid']}','$igi','$ign','$id1')";
							$insertResult = mysqli_query($con,$insertAfter);
						if($insertAfter)
						{
							?> 
							<script>alert('Register Successful')</script><?php
							// header("Location:bill.php");
						}
						else{
							?> <script>alert('Registration Error!!!')</script><?php
						}
						
					}
				}
						
				}
			}
		
	?>
	<body>
	<div class="container">
	<div class="box"><form method="POST"><div class="login"> <h1>Game Register</h1></div><br><br>
	<input placeholder=" InGame_Id" name ="igi" class="text"></input><br><br>
	<input placeholder=" InGame_Name" name ="ign" class="text"></input><br><br>
	<?php 
		$query = "SELECT fees FROM `tournaments`";
		$result = mysqli_query($con,$query);
		if($result)
		{
			$row = mysqli_fetch_assoc($result);
		
			
	?>
	<?php 
		$query1 = "SELECT * FROM `tournaments` WHERE `id`=$_GET[id]";
		$result1 = mysqli_query($con,$query1);
		if($result1)
		{
			$row1 = mysqli_fetch_assoc($result);
		
			
	?>
	<button class="bt" name="submit">Pay <?=$row['fees'];?></button><br><br>
	<?php }?>
	</div>
	<?php
//bill.php?id=<?php echo $row['id'];
}?>
	</form></div>
	<style>
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
		width:140px;
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
		width:100%;
	}
	.bt:active{
		color:black;
		background-color:white;

	}
	
	
	.box{
		position:relative;
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-content:center;
		border:2px solid white;
		text-align:center;
		width:450px;
		height:350px;
		backdrop-filter:blur(2px);
		background-color:rgba(0,0,0,0.2);
		margin: 100px;
		border-radius:20px;
	
	}
	.box form{
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-items:center;
	}
	input{
		display:flex;
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
		
		border: 1px solid white;
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
</body>

</html>