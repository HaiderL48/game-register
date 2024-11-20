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

    <div class="container">
    
        <table class="tb" border="2px" style="font-size:20px;">
        <tr><th colspan="6" style="font-size:28px;">Games Information</th></tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Discription</th>
                <th>Image</th>
                <th colspan="2">Operations</th>
            </tr>
        
        <?php 
        require("connection.php");
            $sql = "SELECT * FROM games";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                <td><?=$row['id'];?></td>
                                <td><?=$row['game_name'];?></td>
                                <td><?=$row['discription'];?></td>
                               <?php echo '<td><img src="img/' . $row['img'] . '" alt="" width="100px" height="100px"></td>'
                                ?><td><a href='gedit.php?id=<?php echo $row['id'];?>'>Edit</a> </td>
                                <td><a href='gdelete.php?id=<?php echo $row['id'];?>'>Delete</a> </td>
                                
                            </tr>
                          <?php
                           }
                        
        ?>
        </table>
	</div>
    </div>
</body>
<style>
    body{
			margin:0;
			font-family:monospace;
		}
		.logo {
			font-weight: 600;
			font-size: 5em;
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
    font-size: 30px;
    text-decoration: none;
    color: white;
    font-weight: 600;
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
   
    margin:80px;
    display:flex;
    justify-content:center;
    align-items:center;
    border: solid 2px white;
    border-radius:20px;
    background-color:rgba(0,0,0,0.2);
    backdrop-filter:blur(5px);
    width:400px;
    height:300px;
    
}
.fr form{
    position:relative;
    display: flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.text{
		border-radius:10px;
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
    .container {
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        margin:20px;
    }
table{
    background-color:rgba(0,0,0,0.2);
    backdrop-filter:blur(5px);
}
.tb a{
            color:lightblue;
        }
        .tb{
            
            vertical-align:center;
            text-align:center;
            width:800px;
            height:200px;
            margin:50px 250px;
            border-collapse:collapse;
        }
        .tb td{
            padding: 5px 20px;
        }
        .tb th{
            padding: 30px;
        }
    .container1{
        width:100%;
        height:100%;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
      }
      h1{
        margin:50px 250px;
      }
      .container1 .fr{
        display:flex;
        flex-wrap:wrap;
        justify-content:center;
        align-items:center;
      }
      .fr{
        display:flex;
        flex-wrap:wrap;
      }
      html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: monospace;
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
    font-size: 20px;
    transition: color .3s;
}
.nav-list li a:hover{
    color: lightblue; 
}

.logo {
    font-size: 30px;
}
.menu-icon {
    display: none;
}
li{
    list-style-type: none;
}
table{
    
    border-collapse:collapse;
    border:solid 1px white;
}
table a{
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
.fr .text{
    display:flex;
    justify-content:center;
    align-items:center;
    border:1px solid white;
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
</html>