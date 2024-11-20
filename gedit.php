<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require("connection.php");
        session_start();

        if (isset($_POST['sub'])) {

            $id = $_GET['id'];
            $name = $_POST['name'];
            $de = $_POST['des'];
        
            if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $img = $_FILES['img']['name'];
                $temp_image = $_FILES['img']['tmp_name'];
                $upload_dir="img1/";
                // Move the uploaded file to a directory
               
                $new_image = $_FILES['img']['name'];
                $old_img = $_POST['old_img'];

                if($new_image !=""){
                    $update_filename = $new_image;
                }
                else{
                    $update_filename = $old_img;

                }
                $upload_dir = "img/";
                $updateQuery = "UPDATE `games` SET `game_name`='$name' AND `discription`='$de' AND `img`='$update_filename' WHERE `id`='$id'";  
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
                    header("Location:dispgame.php");
                }
}
        }

    ?>
<div class="container1">
        
        <div class="fr">
            <form action="" method="post" enctype="multipart/form-data">
                

<?php 
        if(isset($_GET["id"]))
        {
            
            $display = "SELECT * FROM `games` WHERE `id`='$_GET[id]'";
            $displayResult = mysqli_query($con,$display);
            if(mysqli_num_rows($displayResult)>0)
            {
                $item = mysqli_fetch_array($displayResult);
            }
        ?>
    <form action="" method="post" enctype="multipart/form-data" >
    <input type="text" name="name" value="<?=$item['game_name'];?>"placeholder="Game Name" class="text"><br>
    <textarea type="text" name="des" value="<?=$item['discription'];?>" placeholder="Description" class="text"></textarea><br>
    <input type="file" name="img" class="file">
    <input type="hidden" name="old_img" class="file">
    <?php echo '<img src="img/' . $item['img'] . '" alt="" width="50px" height="50px">';?><br>
    <input type="submit" name="sub" class="bt">
<?php } ?>
</form>
</div>
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
table{
    background-color:rgba(0,0,0,0.2);
    backdrop-filter:blur(5px);
}
.tb a{
            color:white;
        }
        .tb{
            vertical-align:center;
            text-align:center;
            width:1000px;
            margin: 20px 10px;
            border-collapse:collapse;
        }
        .tb td{
            padding: 30px;
        }
        .tb th{
            padding: 30px;
        }
    .container1{
        height:100%;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
      }
      .container1 .fr{
        height:400px;
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
    font-size: 18px;
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
</body>
</html>