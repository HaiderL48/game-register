<?php
require("connection.php");
require("func.php");

if (isset($_POST['sub'])) {
    // Sanitize user inputs to prevent SQL injection
    $name = $_POST['name'];
    $type = $_POST['type'];
    $map = $_POST['map'];
    $pov = $_POST['pov'];
    $time =  $_POST['time'];
    $date = $_POST['date'];
    $prize = $_POST['prize'];
    $prkill= $_POST['prkill'];
    $fees= $_POST['fees'];

    // Check if the file was uploaded without errors
    if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $img = $_FILES['img']['name'];
        $temp_image = $_FILES['img']['tmp_name'];
        $upload_dir="img/";
        // Move the uploaded file to a directory
       
        move_uploaded_file($temp_image, $upload_dir . $img);
   
    // Insert the category into the database
    $sql = "INSERT INTO tournaments (name,type,map,pov,time,date,prize,prkill,fees,imge) VALUES ('$name','$type','$map','$pov','$time','$date','$prize','$prkill','$fees','$img')";
    if (mysqli_query($con, $sql)) {
        // Redirect back to admin panel after successful insertion
        header("Location: tournament.php");
        exit();
    } else {
        // Handle database insertion errors
        echo "Error: " . mysqli_error($con);
        exit();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <div class="menu-icon" onclick="toggleMenu()">&#9776;
        </div>
        <div class="logo"><a href="adminpanel.php">GameZone</a></div>
        <ul class="nav-list" >
        <li><a href="addgame.php">Add Games</a></li>
        <li><a href="tournament.php">Add Tournament</a></li>
        <li><a href="dispgame.php">Games</a></li>
            <li><a href="disptournament.php">Tournament</a></li>
            <li><a href="user.php">Participants</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
            </div>
    <div class="container1">
        
    <div class="fr">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="name" placeholder="Tournament_Name" class="text"><br>
        <input type="text" name="type" id="type"placeholder="Tournament_Type" class="text"><br>
        <input type="text" name="map" id="map"placeholder="Tournament_Map" class="text"><br>
        <input type="text" name="pov" id="pov"placeholder="Tournament_POV" class="text"><br>
        <input type="time" name="time" id="time"placeholder="Tournament_Time" class="text"><br>
         <input type="date" name="date" id="date"placeholder="Tournament_Date" class="text"><br>
        <input type="number" name="prize" id="prize"placeholder="Tournament_Prize" class="text"><br>
        <input type="number" name="prkill" id="prkill"placeholder="Tournament_PerKill" class="text"><br>
        <input type="number" name="fees" id="fees"placeholder="Tournament_Fees" class="text"><br>
        <input type="file" name="img" id="image"placeholder="Tournament_Image" class="file"><br>
        <input type="submit" value="Submit" name="sub" class="bt">
        </div>
        
        </form>
    </div>
<!-- <div class="container">
        <h1>Tournaments</h1>
        <div class="categories">
            <?php
           
            // $sql = "SELECT * FROM tournaments";
            // $result = mysqli_query($con, $sql);
            // while ($row = mysqli_fetch_assoc($result)) {
            //     echo '<div class="category">';
            //     echo '<img src="img1/' . $row['imge'] . '" alt="">';
            //     echo '<h3>' . $row['name'] . '</h3>';
            //     echo '<p>' . $row['type'] . '</p>';
            //     echo '<p>' . $row['time'] . '</p>';
            //     echo '<p>' . $row['date'] . '</p>';
            //     echo '<p>' . $row['prize'] . '</p>';
            //     echo '<p>' . $row['prkill'] . '</p>';
            //     echo '<p>' . $row['fees'] . '</p>';
            //     echo '<button><a href="tournament.php">Add to Cart</a></button>';
            //     echo '</div>';
            // }
            ?>
        </div>
    </div> -->
   
    <style>
         
    body{
			margin:0;
			font-family:monospace;
		}
		.logo {
			font-weight: 600;
	
			font-size: 2em;
			color:white;
			font-family: monospace;
			
		}
        nav{
		
		background-color:#5a2525;
	}
	.navbar {
        z-index: 2;
		display:flex;
		justify-content: space-between;
		align-items:center;
		padding: 5px 10px;
	
	}
    .nav-links li a:hover{
		
		transition: .2s;
	}
	.nav-links{
	
		font-size: 18px;
		font-weight: 700;
		display:flex;
		justify-content:center;
		align-items:center;

	}
	.nav-links li{
		list-style-type:none;
		margin: 0px 10px;
		font-family: monospace;
	}
	a{
       
		color:white;
		text-decoration:none;
	}
    button{
		border:2px solid white;
		background-color:#5a2525;
		color:white;
		width:60px;
		height:30px;
	}
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
.fr{
    margin: 110px 0px;
    display:flex;
    justify-content:center;
    align-items:center;
    border: solid 2px white;
    border-radius:20px;
    background-color:rgba(0,0,0,0.2);
    backdrop-filter:blur(10px);
    width:400px;
    height:700px;
    
}
.fr form{
    margin: 0 10px;
    position:relative;
    display: flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.text{
		border-radius:15px;
		color:white;
		border:none;
		background-color:rgba(0,0,0,0.1);
		outline:none;
		width:80%;
		height:40px;
	}
    .file{
        width:80%;
		height:40px;
        border:none;
    }
.bt{
    height:40px;
		width:120px;
		border: none;
		transition: .3s;
		border-radius:5px;
		font-size:20px;
		font-weight:400;
		color:white;
		border:1px solid white;
		background-color:rgba(0,0,0,0.1);
		
}    
	input:focus{
		outline:solid 1px white;
		
	}
table{
    vertical-align:center;
    background-color:rgba(0,0,0,0.2);
    backdrop-filter:blur(5px);
}
.tb a{
            color:white;
        }
        .tb{
            
            text-align:center;
            
            margin: 20px 10px;
            border-collapse:collapse;
        }
        .tb td{

            padding: 20px 20px;
        }
        .tb th{
            padding: 30px;
        }
    .container1{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
      }
      html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('webpics/back2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat;
    color: white;
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
}
.navbar {

    margin:10px;
    position: fixed;
    width: 97%;
    border-radius: 20px;

    display: flex;
    justify-content: space-between;
    background-color:rgb(0, 0, 0,0.2);
    color: white;
    padding: 10px;
}
.nav-list {
    justify-content:stretch;
    list-style-type: none;
    display: flex;
    margin: 0;
    padding: 0;
}
.nav-list li {
    
    padding: 5px 15px;
}
.nav-list li a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    transition: color .3s;
    font-weight:600;
}
.nav-list li a:hover{
    color: lightblue; 
}
.logo {
    font-size: 24px;
}
.menu-icon {
    display: none;
}
li{
    list-style-type: none;
}
a{
    font-size: 20px;
    text-decoration: none;
    color: white;
    font-weight: 800;
}
.con{
    
    position: absolute;
    top: 48px;
    height: 100%;
    width: 100%;
    background-color:#5a2525;
    color: white;
}
.imge {
    display:flex;
    justify-content:center;
    align-items:center;
    margin:80px 0;
}
@media (max-width: 991px){
    .logo{
        position: relative;
        left: 600px;
    }
    .nav-list {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        position: relative;
        list-style-type: none;
        display: block;
        position: absolute;
        left: -100%;
        top: 49px;
        flex-direction: column; 
        width: 50%;
        height: 100vh;
        justify-content: stretch;
        align-items: center;
        transition: 0.3s ;
    }
    .nav-list.active {
        left: 0;
    }
    .menu-icon {
        width: 20px;
        display: block;
        position: absolute;
        right: 0px;
        left: 10px;
        top: 10px;
        cursor:crosshair;
    }
    .nav-list li {
        
        margin: 20px 0;
    }
    .user{
        position: absolute;
        top: 10px;
    }
    
}
.im{
    
    display: flex;
    justify-content: center;
    align-items: center;
}

.im img {
position: relative;
top: 80px;
display: block;
margin: 0 auto;

}
.ct{
	position:relative;
	margin:100px;
	display:flex;
}
.tp{
	border: 1px solid white;
	border-radius:20px;
	display:flex;
	justify-content:center;
	align-items:center;
	width:400px;
	height:100px;
	background-color:rgba(0,0,0,0.2);
	backdrop-filter:blur(5px);
}

.tt{
	border: 1px solid white;
	border-radius:20px;
	margin: 0 20px;
	display:flex;
	justify-content:center;
	align-items:center;
	width:400px;
	height:100px;
	background-color:rgba(0,0,0,0.2);
	backdrop-filter:blur(5px);
}
   </style>
    </style>
</body>
</html>