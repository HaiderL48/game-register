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
            <li><a href="usertour.php">Tournament</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if(isset($_SESSION['userid'])){?><li><a href="wait.php">Logout</a></li>
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
    <?php
require("connection.php");

            $id = $_GET['id'];
            $sql = "SELECT * FROM `tournaments` WHERE `id`= '{$id}'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="category">';
                echo '<img src="img/' . $row['imge'] . '" alt=""><h1>' . $row['name'] . '</h1></div>';
                echo '<div class="data">';
                ?><?php
                require("connection.php");
                $resCount = "SELECT * FROM `tournaments`";
                $counResult = mysqli_query($con,$resCount); 
                $rowCount = $counResult->num_rows;
                ?><h3 style="font-size:25px; font-weight:400;"><?php echo "Total Registered: ".$rowCount."/100";?></h3><?php
                echo '<div class="info"><div class="i">';
                
                
               
                echo '<p>Type: ' . $row['type'] . '</p>';
                echo '<p>Time: ' . $row['time'] . '</p>';
                echo '<p>Date: ' .$row['date'] . '</p></div>';
                echo '<div class="i1"><p>Prize: ' . $row['prize'] . '</p>';
                echo '<p>Per_kill: ' . $row['prkill'] . '</p>';
                echo '<p>Fees: ' . $row['fees'] . '</p></div>';
                echo '</div>';
               ?> <button onclick="location.href='tregister.php?id=<?php echo $row['id'];?>'">Register</button><?php
            
            }
        
    
     ?> 
     </div>
     <table border="1px" align="center" width="1000px">
        <h1>WINNERS</h1>
        <tr height="40px" >
        <th>Rank</th>
        <th>Name</th>
        <th>Price</th>
        </tr>
        <tr height="40px" align="center">
        <td>1</td>
        <td>Haider</td>
        <td>400</td>
        </tr>
        <tr height="40px" align="center">
        <td>2</td>
        <td>Hiren</td>
        <td>100</td>
        </tr>
        <tr height="40px" align="center">
        <td>3</td>
        <td>Meet</td>
        <td>100</td>
        </tr>
        <tr height="40px" align="center">
        <td>4</td>
        <td>Arjun</td>
        <td>100</td>
        </tr>
        <tr height="40px" align="center">
        <td>5</td>
        <td>Arpit</td>
        <td>100</td>
        </tr>
            
         
     </table>
     <br>
</body>
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
    position:relative;
    margin:100px 0;
    display:flex;
    justify-content:center;
    align-items:center;
}
.category img{
    display:flex;
    flex-direction:row;
    height:500px;
    width:800px;
    border-radius:20px;
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
    margin:90px;
    transition: transform 0.3s ease;
}
.data{
    position:relative;
    margin-top:0;
    margin-right:90px;
    margin-left:90px;
    margin-bottom:0px;
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
    transition: transform 0.3s ease;
}
.info{
    position:relative;
    display:flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
}
.i{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    margin:20px;
    font-size:20px;
}
.i1{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    margin:20px;
    font-size:20px;
}
button{
        width:100%;
        height:40px;
        background-color:rgba(0,0,0,0.2);
        backdrop-filter:blur(5px);
        border:none;
        border-radius:20px;
        color:white;
        font-size:20px;
        border:2px solid white;
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
    background-repeat:repeat;
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
@media (max-width: 768px){
    .logo{
        position: relative;
        left: 600px;
    }
    
    .nav-list {
        background-color: rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
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
table{
    border-collapse:collapse;
    border:white;
    backdrop-filter:blur(10px);
    
}
</style>
</html>