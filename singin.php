<html>
	<head>
	
	</head>
	<?php
	require("connection.php");
  $err1="";
  $err2="";
  $err3="";
  $err4="";
  $err5="";

  if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=$_POST["password"];

    if(empty($name) || empty($email) || empty($phone) || empty($password)){
        $err1="Requried /Invalid";
    }

    else{
        if(!preg_match("/^[a-zA-Z]*$/",$name)){
            // $err2="First Letter Must be Capital";
        }
		else{
			$err2="First Letter Must be Capital";
		}
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        //   $err3="Email is not valid";
     }
    else{
		$err3="Email is not valid";
   }

     if (strlen($phone) < 10 || strlen($phone) > 12) {
		$err4 = "mobile number not valid ";
	 }
	//  else{
	// 	$err3 = "";
	//  }
   if (strlen($password) < 8) {
		$err5 = "Password lenght should be 8 character";
	 }
	 else{
		$query = "SELECT * FROM `singin` WHERE `username`= '$name' AND `password`='$password'";
				$result = mysqli_query($con,$query);
					if(mysqli_num_rows($result)==1)
						{
								echo "<script>alert('already exists')</script>";
						}else{

						
		$insert_qurey="INSERT INTO `singin`(`username`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
   		$result_qurey=mysqli_query($con,$insert_qurey);

    if($result_qurey)
    {
           echo "<script>alert('Registered')</script>";
		   header("Location:loginpage.php");
    }
}
	 }
	//  else{
	// 	$err4 = "";
	//  }
//   }
  
  
//    $insert_qurey="INSERT INTO `singin`(`username`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
//    $result_qurey=mysqli_query($con,$insert_qurey);

//     if($result_qurey)
//     {
//            echo "Inserted Succesfully";
//     }
  }
}
?>
	<body>
	<div class="container"><form method="POST">
	<div class="box"><div class="login"> <h1>Sigin</h1></div>
	
	<input placeholder=" UserName" name ="name" class="text"></input><br><br>
	<input placeholder=" Useremail" name ="email" class="text"></input><br><br>
	<input type="numeric" placeholder=" Mobile" name ="phone" class="text"></input><br><br>
	<input type="password" placeholder=" UserPassword" name ="password" class="text"></input><br><br>
	<button class="bt" name="submit">Login</button><br><br>
	<a href="loginpage.php">Already have an Account?</a>
	<div class="alert">
	<h4 style='color:red;'><?php echo $err1,$err2; ?></h4>
	<h4 style='color:red;'><?php echo $err1,$err3; ?></h4>
	<h4 style='color:red;'><?php echo $err1,$err4; ?></h4>
	<h4 style='color:red;'><?php echo $err1,$err5; ?></h4>
	</div>
	</div>
	</form></div>
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
	justify-content:center;
			align-items:center;
    min-height: 100vh; 
}
		h1{
			position: relative;
			top: 15px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
		h3{
			color:red;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
		.container{
			display:flex;
			flex-direction:column;
			justify-content:center;
			align-items:center;
			width:500px;
			height:auto;
			border:2px solid white;
			border-radius:20px;
			backdrop-filter:blur(10px);
			background-color:rgba(0,0,0,0.1);
		}
		.box{
			display:flex;
			flex-direction:column;
			justify-content:center;
			align-items:center;
			width:400px;
		}
		.box input{
			display:flex;
			flex-direction:column;
			width:100%;
			height:30px;
			border:1px solid white;
			border-radius:10px;
			background-color:rgba(0,0,0,0.1);
			outline:none;
			color:white;
		}
		.alert{
			margin-top:10px;
			display:flex;
			flex-direction:column;
			justify-content:center;
			
		}
		.alert h4{
				margin:2px;
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
	.bt:active{
		color:black;
		background-color:white;

	}
	a{
		color:white;
		text-decoration:none;
	}
	
	</style>
</body>




</html>