<?php
session_start();
require("connection.php");
require("func.php");

if (isset($_POST['sub'])) {
    // Sanitize user inputs to prevent SQL injection
    $id = $_GET['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $map = $_POST['map'];
    $pov = $_POST['pov'];
    $time =  $_POST['time'];
    $date = $_POST['date'];
    $prize = $_POST['prize'];
    $prkill= $_POST['prkill'];
    $fees= $_POST['fees'];

  $new_image = $_FILES['img']['name'];
  $old_img = $_POST['old_img'];

  if($new_image !=""){
    $update_filename = $new_image;
  }
  else{
    $update_filename = $old_img;

  }
  $upload_dir = "img/";
  $updateQuery = "UPDATE `tournaments` SET  `name` = '$name',`type`='$type',`map`='$map',`pov`='$pov',`time`='$time',
                `date`='$date',`prize`='$prize',`prkill`='$prkill',`fees`='$fees',`imge`='$update_filename' WHERE `id`='$id'";
                $updateResult = mysqli_query($con,$updateQuery);
                if($updateResult)
                {
                    if(($_FILES['img']["name"]!=""))
                    {
                        move_uploaded_file($_FILES['img']["name"], $upload_dir ."/" .$new_image); 
                        if(file_exists("img/". $old_img))
                        {
                            unlink("img/".$old_img);
                        }
                    }
                    header("Location:disptournament.php");
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
            <li><a href="tournaments.php">Add Tournament</a></li>
            <li><a href="dispgame.php">Games</a></li>
            <li><a href="disptournaments.php">Tournament</a></li>
            <li><a href="user.php">Participants</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
            </div>
    <div class="container1">
        <?php 
        if(isset($_GET["id"]))
        {
            
            $display = "SELECT * FROM `tournaments` WHERE `id`='$_GET[id]'";
            $displayResult = mysqli_query($con,$display);
            if(mysqli_num_rows($displayResult)>0)
            {
                $item = mysqli_fetch_array($displayResult);
            }
        ?>
    <div class="fr">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="text" value="<?=$item['name'];?>" name="name" id="name" placeholder="Tournament_Name" class="text"><br>
        <input type="text" value="<?=$item['type'];?>" name="type" id="type"placeholder="Tournament_Type" class="text"><br>
        <input type="text" value="<?=$item['map'];?>" name="map" id="map"placeholder="Tournament_Map" class="text"><br>
        <input type="text" value="<?=$item['pov'];?>" name="pov" id="pov"placeholder="Tournament_POV" class="text"><br>
        <input type="time" value="<?=$item['time'];?>" name="time" id="time"placeholder="Tournament_Time" class="text"><br>
         <input type="date" value="<?=$item['date'];?>" name="date" id="date"placeholder="Tournament_Date" class="text"><br>
        <input type="number" value="<?=$item['prize'];?>" name="prize" id="prize"placeholder="Tournament_Prize" class="text"><br>
        <input type="number" value="<?=$item['prkill'];?>" name="prkill" id="prkill"placeholder="Tournament_PerKill" class="text"><br>
        <input type="number" value="<?=$item['fees'];?>" name="fees" id="fees"placeholder="Tournament_Fees" class="text"><br>
        <input type="file" name="img" id="">
        <input type="hidden" name="old_img" id="">
        <?php echo '<img src="img/' . $item['imge'] . '" alt="" width="50px" height="50px">'?><br>
        <input type="submit" value="Submit" name="sub" class="bt">
        <?php 
    } ?>
        </div>
                
        </form>
    </div>

    <style>
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
    backdrop-filter:blur(5px);
    width:400px;
    height:750px;
    
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
    background-image: url('webpics/back1.jpg');
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
    font-weight: 600;
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