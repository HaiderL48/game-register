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
            $sql = "SELECT * FROM tournaments";
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
            background-color:lightcyan;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
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
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    grid-gap: 20px;
}

.category {
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    backdrop-filter:blur(20px);
    background-color: rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 20px;
    transition: transform 0.3s ease;
}

.category img {
    width: 100%;
    height: auto;
    border-radius:20px;
}

.category h3 {
    margin-top: 10px;
}

.category p {
    color: #666;
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
    background-color: #ff9900;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

    </style>
</body>
</html>