<?php
require("connection.php");
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

<div class="container">
        <h1>Tournaments</h1>
        <div class="categories">
            <?php
            include 'connection.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM tournaments WHERE `id`=$id";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="category">';
                echo '<img src="img1/' . $row['imge'] . '" alt="">';
                echo '<div class="info"><h3>' . $row['type'] . '</h3>';
                ?><a style="color:black" href='loginpage.php?id=<?php echo $row['id'];?>'>Register</a><?php
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
    justify-content:center;
    align-items:center;
}
.category img{
    display:flex;
    flex-direction:row;
    height:200px;
    width:300px;
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
</style>
    </style>
</body>
<script>
	function toggleMenu() {
    const navList = document.querySelector('.nav-list');
    navList.classList.toggle('active');
}
    </style>
</body>
</html>