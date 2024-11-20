<?php
    require("connection.php");

    session_start();
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
        <div class="logo"><a href="index.php">GameZone</a></div>
        <ul class="nav-list" >
            <li><a href="games.php">Games</a></li>
            <li><a href="#">Tournament</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if(isset($_SESSION['userid'])){?><li><a href="logout.php">Logout</a></li>
                <div class="user"><li><a href=""><?=$_SESSION['userid'];?></a></li></div>
            <?php }else{?>
            <li><a href="loginpage.php">Login In</a></li>
            <?php }?>
            <li>
                <div class="username"><a href=""><?php 
                // echo $_SESSION['userId'];   
            ?></a></div>
            
            </li>
        </ul>
            </div>
<div class="container">
        <h1>Tournaments</h1>
        <div class="categories">
            <?php
            include 'connection.php';
            $sql = "SELECT * FROM tournaments";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?><div class="category" onclick="location.href='tdetails.php?id=<?php echo $row['id'];?>'"><?php
                echo '<img src="img/' . $row['imge'] . '" alt="" >';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<h3>' . $row['type'] . '</h3>';
                
                echo '</div>';
            }
    
            ?>
        </div>
    </div>
    <style>
          body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
}

h1 {
    
    text-align: center;
}
a{
    text-decoration:none;
    color:white;
}
.categories {
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    align-items:center;
}
.category img{
    width: 100%;
    height: auto;
    border-radius:20px;
    height:200px;
}
.category {
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 20px;
    backdrop-filter:blur(5px);
    background-color:rgb(0, 0, 0,0.1);
    margin:10px;
    transition: transform 0.3s ease;
}

.category h3 {
    margin-top: 10px;
}
.category a{
    font-size:18px;
    transition: .3s;
}
.category a:hover{
    font-size:18px;
    transition: .3s;
    color:lightblue;
}

.category p {
    color: white;
}

.category span {
    font-weight: bold;
    color: #333;
}

.category button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color:rgb(0, 0, 0,0.2);
    border: none;
    font-size:12px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease;
}
button:hover{
        background-color:white;
        color:black;
        box-shadow: 2px 2px 0 black;
        transform: scaleX(-3px), scaleY(-3px);
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
    background-repeat: no-repeat;
    color: white;
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
}
.navbar {
    z-index: 2;
    margin:10px;
    position: fixed;
    width: 97%;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    background-color:rgb(0, 0, 0,0.2);
    backdrop-filter:blur(20px);
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
footer {
position: absolute;
bottom: 0;
width: 100%;
backdrop-filter: blur(10px);
background-color:rgb(0, 0, 0,0.2);
color: white;
text-align: center;
padding: 10px;
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
@media (max-width: 768px){
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
    
    .slider{
            overflow:hidden;
            margin:80px;
            display: flex;
            justify-content:center;
            align-items:center;

        }

        .slide{
            width:200px;
            display: flex;
            justify-content:center;
            align-items:center;
            box-sizing: border-box;
            
        }
        
        .slide img{
            border-radius:20px;
            margin:5px;
            width: 100%;
            height: 400px;
            
        }
        .categories {;
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    
}

.category {
    width:120px;
    height:300px;
    border:2px white solid;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    backdrop-filter:blur(20px);
    background-color: rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 20px;
    transition: 0.3s ease;
}

.category img {
    width: 100%;
    height: 130px;
    border-radius:20px;
}
@media(max-width:425px){
    .category {
    width:100px;
    height:290px;
    border:2px white solid;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    backdrop-filter:blur(20px);
    background-color: rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 20px;
    transition: 0.3s ease;
}

.category img {
    width: 100%;
    height: 100px;
    border-radius:20px;
}
}
}
</style>
    </style>
</body>
<script>
	function toggleMenu() {
    const navList = document.querySelector('.nav-list');
    navList.classList.toggle('active');
}
</script>
</html>