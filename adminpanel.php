<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<?php 
require("connection.php");
    session_start();
    if(!isset($_SESSION['adminid']))
    {
        
        header('Location:admin.php');
       
    }
    
   ?>
</head>
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
    background-image: url('webpics/back2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
}
.navbar {
    z-index: 2;
    backdrop-filter:blur(20px);
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
.imge img{
    height:550px;
    width:1200px;
    border-radius:10px;
}
.cont{
    display:flex;
    flex-direction:column;
    margin:400px 0;
}
footer {
width: 100%;
backdrop-filter: blur(10px);
background-color:rgb(0, 0, 0,0.2);
color: white;
text-align: center;
}
.aus {
    margin:0 10px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    position:relative;
    background-color:rgba(0,0,0,0.1);
    backdrop-filter:blur(5px);
    border-radius:20px;

}
.cus {
    margin:20px 10px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    position:relative;
    background-color:rgba(0,0,0,0.1);
    backdrop-filter:blur(5px);
    border-radius:20px;

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
	border: 3px solid white;
	border-radius:20px;
	display:flex;
    flex-direction:column;
	justify-content:center;
	align-items:center;
	width:400px;
	height:200px;
	background-color:rgba(0,0,0,0.2);
	backdrop-filter:blur(10px);
    margin:10px;
    font-size:25px;
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
<?php ?>
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
			<div class="ct">
				<div class="tp">
                    <?php
                    require("connection.php");
                    $resCount = "SELECT * FROM `singin`";
                    $counResult = mysqli_query($con,$resCount); 
                    $rowCount = $counResult->num_rows;
                    
                    ?>
                    <bold style="font-size:30px;"><?php echo $rowCount;?></bold>
					Registered
				</div>
				<div class="tp">
                <?php
                    require("connection.php");
                    $resCount = "SELECT * FROM `games`";
                    $counResult = mysqli_query($con,$resCount); 
                    $rowCount = $counResult->num_rows;
                    
                    ?>
                    <bold style="font-size:30px;"><?php echo $rowCount;?></bold>
					Games
				</div>
				<div class="tp">
                <?php
                    require("connection.php");
                    $resCount = "SELECT * FROM `tournaments`";
                    $counResult = mysqli_query($con,$resCount); 
                    $rowCount = $counResult->num_rows;
                    
                    ?>
                    <bold style="font-size:30px;"><?php echo $rowCount;?></bold>
					Tournaments
				</div>
			</div>
</body>

<script>
	function toggleMenu() {
    const navList = document.querySelector('.nav-list');
    navList.classList.toggle('active');
}
</script>

</html>
